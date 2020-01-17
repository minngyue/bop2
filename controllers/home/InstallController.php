<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2020/1/8
 * Time: 18:28
 */

namespace app\controllers\home;

use app\components\controllers\UBaseController;
use app\components\utils\Utils;
use app\models\Account;
use app\models\Member;
use Yii;
use yii\web\Response;

class InstallController extends UBaseController
{
    public $layout = '/install/main';

//    public $layout = false;

    public function beforeAction($action)
    {
        if ($this->isInstalled()) {
            $app_version = Yii::$app->params['app_version'];
            exit('BOP2 V' . $app_version . ' 已安装过，请不要重复安装，如果需要重新安装，请先删除runtime/install/install.lock');
        }

        return true;
    }

    public function actionStep1()
    {
        $request = Yii::$app->request;
//
        if ($request->isPost) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            Yii::$app->cache->set('step', 1);
            return ['status' => 'success', 'callback' => url('home/install/step2')];
        }

        $step1 = [
            'runtime' => [
                'have_chmod' => $this->getChmodLabel(Yii::getAlias('@runtime')),
                'require_chmod' => '可读、可写',
                'check_chmod' => is_writable(Yii::getAlias('@runtime'))
            ],
            'runtime/cache' => [
                'have_chmod' => $this->getChmodLabel(Yii::getAlias('@runtime/cache')),
                'require_chmod' => '可读、可写',
                'check_chmod' => is_writable(Yii::getAlias('@runtime/cache')),
            ],
            'runtime/install' => [
                'have_chmod' => $this->getChmodLabel(Yii::getAlias('@runtime/install')),
                'require_chmod' => '可读、可写',
                'check_chmod' => is_writable(Yii::getAlias('@runtime/install')),
            ],
            'config/db' => [
                'have_chmod' => $this->getChmodLabel(Yii::getAlias('@app/config/db.php')),
                'require_chmod' => '可读、可写',
                'check_chmod' => is_writable(Yii::getAlias('@app/config/db.php')),
            ]
        ];

        return $this->display('/install/step1', compact('step1'));
    }

    public function actionStep2()
    {
        $request = Yii::$app->request;

        if (Yii::$app->cache->get('step') != 1) {
            return $this->redirect(['home/install/step1']);
        }
        if ($request->isPost) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $step2 = $request->post('Step2');

            $db = [
                'dsn' => "mysql:host={$step2['host']};port={$step2['port']}",
                'username' => $step2['username'],
                'password' => $step2['password'],
                'charset' => 'utf8',
            ];
            $connection = new \yii\db\Connection($db);
            try {
                $connection->open();
            } catch (\Exception $e) {
                return ['status' => 'errors', 'message' => '数据库连接失败，请检查数据库配置信息是否正确'];
            }

            if (!$connection->isActive) {
                return ['status' => 'error', 'message' => '当前数据库连接处于非激活状态，请检查PDO安装是否正确'];
            }

            $sql = "CREATE DATABASE IF NOT EXISTS {$step2['dbname']} CHARACTER SET 'utf8' COLLATE 'utf8_general_ci';";
            if (!$connection->createCommand($sql)->execute()) {
                return ['status' => 'error', 'message' => "数据库 {$step2['dbname']} 创建失败，没有创建数据库权限，请手动创建数据库"];
            }

            $db['dsn'] = "mysql:host={$step2['host']};port={$step2['port']};dbname={$step2['dbname']}";
            $db['tablePrefix'] = $step2['prefix'];
            $db = array_merge(['class' => 'yii\db\Connection'], $db);

            $config = "<?php\r\nreturn\n" . var_export($db, true) . "\r\n?>";
            if (file_put_contents(Yii::getAlias('@app') . '/config/db.php', $config) === false) {
                return ['status' => 'error', 'message' => '数据库配置文件写入错误，请检查configs/db.php文件是否有可写权限'];
            }

            Yii::$app->cache->set('step', 2);

            return ['status' => 'success', 'callback' => url('home/install/step3')];
        }
        return $this->display('/install/step2');
    }

    public function actionStep3()
    {
        $request = Yii::$app->request;

        if (Yii::$app->cache->get('step') != 2) {
            return $this->redirect(['home/install/step2']);
        }

        if ($request->isPost) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $step3 = $request->post('Step3');

            $transaction = Yii::$app->db->beginTransaction();
            try {
                $init_sql = $this->getInitSql();
                Yii::$app->db->createCommand($init_sql)->execute();

                $account = new Account();
                $account->setAttributes([
                    'status' => $account::ACTION_STATUS,
                    'type' => $account::ADMIN_TYPE,
                    'name' => $step3['name'],
                    'email' => $step3['email'],
                    'ip' => $account->getUserIp(),
                    'location' => Utils::getLocation(),
                    'created_at' => date('Y-m-d H:i:s'),
                    'password' => $account->setPassword($step3['password'], 10),
                    'auth_key' => $account->generateAuthKey(),
                ], false);

                if (!$account->save()) {
                    $transaction->rollBack();
                    return ['status' => 'error', 'message' => $account->getErrorMessage(), 'label' => $account->getErrorLabel()];
                }

                $member = new Member();
                $member->setAttributes([
                    'encode_id' => $member->createEncodeId(),
                    'project_id' => 1,
                    'user_id' => $account->id,
                    'join_type' => $member::PASSIVE_JOIN_TYPE,
                    'project_rule' => 'look,export,history',
                    'env_rule' => 'look,create,update,delete',
                    'module_rule' => 'look,create,update',
                    'api_rule' => 'look,create,update,export,debug,history',
                    'member_rule' => 'look,create,update',
                    'template_rule' => 'look,create,update',
                    'creater_id' => 1,
                    'created_at' => date("Y-m-d H:i:s")
                ]);

                if (!$member->save()){
                    $transaction->rollBack();
                    return ['status'=>'error','message'=>$member->getErrorMessage(),'label'=>$member->getErrorLabel()];
                }

                //保存日志


            } catch (\Exception $e) {

            }
        }
        return $this->display('/install/step3');
    }

    /**
     * 获取权限
     * @param $dirName
     * @return string
     * Author Minnyue
     * Created At 2020/1/9 12:00
     */
    private function getChmodLabel($dirName)
    {
        $chmod = '';

        is_readable($dirName) && $chmod = '可读、';
        is_writable($dirName) && $chmod .= '可写、';
        is_executable($dirName) && $chmod .= '可执行、';

        return trim($chmod, '、');
    }

    private function getInitSql()
    {
        $lines = file(Yii::getAlias('@runtime') . '/install/db.sql');
        file_put_contents("E:/workspace/tmp/3.txt", print_r($lines, 1), 8);
        $sql = "";
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line != '') {
                file_put_contents("E:/workspace/tmp/1.txt", print_r($line, 1), 8);
                if (!($line{0} == "#" || $line{0} . $line{1} == "--")) {
                    $line = str_replace("doc_", Yii::$app->db->tablePrefix, $line);
                    $sql .= $line;
                }
            }
        }
        return $sql;
    }
}