<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2020/1/8
 * Time: 15:38
 */
namespace app\components\utils;

use itbdw\Ip\IpLocation;
use Jenssegers\Agent\Agent;
use Yii;

final class Utils
{
    /**
     * 获取客户端IP
     * @return mixed|null|string
     * Author Minnyue
     * Created At 2020/1/8 15:39
     */
    static function getUserIp()
    {
        return Yii::$app->request->userIP;
    }

    /**
     * 获取ip地理位置
     * @param null $ip
     * @return string
     * Author Minnyue
     * Created At 2020/1/8 15:42
     */
    static function getLocation($ip = null)
    {
        $ip = $ip ? : self::getUserIp();

        $location  = IpLocation::getLocation($ip);

        $country = $location['country'];
        $province = $location['province'];
        $city = $location['city'] ? : $province;
        return $country . ' ' . $province . ' ' .$city;
    }

    /**
     * 获取访问者的操作系统
     * @return string
     */
    static function getOs()
    {
        $agent = new  Agent();
        $platform = $agent->platform();
        $version = $agent->version($platform);

        return $platform . '(' . $version . ')';
    }

    /**
     * 获取访问者浏览器
     * @return string
     */
    static function getBrowser()
    {
        $agent = new Agent();
        $browser = $agent->browser();
        $version = $agent->version($browser);

        return $browser . '(' . $version . ')';
    }

    /**
     * Encodes special characters into HTML entities.
     * The [[\yii\base\Application::charset|application charset]] will be used for encoding.
     * @param string $content the content to be encoded
     * @param bool $doubleEncode whether to encode HTML entities in `$content`. If false,
     * HTML entities in `$content` will not be further encoded.
     * @return string the encoded content
     */
    static function encode($content, $doubleEncode = true)
    {
        return htmlspecialchars($content, ENT_QUOTES | ENT_SUBSTITUTE, Yii::$app ? Yii::$app->charset : 'UTF-8', $doubleEncode);
    }
}