<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2020/1/8
 * Time: 14:29
 */
namespace app\components\utils;
use Yii;

final class EncryptUtils
{
    private static $priKey = '';
    private static $pubKey = '';

    /**
     * @var bool
     */
    CONST ENCRYPT_WITH_BASE64 = true;

    /**
     * @var int
     */
    CONST CHECK_ALGORITHM_MD5 = 1;

    /**
     * @var int
     */
    CONST CHECK_ALGORITHM_PSA_PUBLIC_KEY = 2;

    /**
     * @var int
     */
    CONST CHECK_ALGORITHM_PSA_PRIVATE_KEY = 3;

    /**
     * 生成一个秘钥
     * @param int $len
     * @return string
     * Author Minnyue
     * Created At 2020/1/8 14:43
     */
    static function generateKey($len = 32)
    {
        try{
            return 'base64:'.base64_encode(random_bytes($len));
        }catch (\Exception $e){
            return false;
        }
    }

    /**
     *
     * @param $username
     * @param $password
     * Author Minnyue
     * Created At 2020/1/8 14:51
     */
    static function encryptPassword($username,$password)
    {
//        return password_hash($username)
    }

    /**
     * @param $data
     * @param $secretKey
     * @param string $type
     * @return string
     * Author Minnyue
     * Created At 2020/1/8 15:10
     */
    static function encrypt($data ,$secretKey,$type = 'key')
    {
        try{
            switch ($type){
                case 'key':
                    return Yii::$app->getSecurity()->encryptByKey($data,$secretKey);
                    break;
                case 'password':
                    return Yii::$app->getSecurity()->encryptByPassword($data,$secretKey);
                    break;
            }
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * 解密
     * @param $encryptedData
     * @param $secretKey
     * @param $type
     * @return string|array
     * Author Minnyue
     * Created At 2020/1/8 15:00
     */
    static function decrypt($encryptedData ,$secretKey,$type = 'key')
    {
        try{
            switch ($type){
                case 'key':
                    return Yii::$app->getSecurity()->decryptByKey($encryptedData,$secretKey);
                    break;
                case 'password':
                    return Yii::$app->getSecurity()->decryptByPassword($encryptedData,$secretKey);
                    break;
            }
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
}