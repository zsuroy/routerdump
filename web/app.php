<?php
/**
 * 路由器信息回收站API
 * @author @Suroy
 * @date 22.02.21
 */
error_reporting(0);
$mod = isset($_GET['mod']) ? $_GET['mod'] : null;
date_default_timezone_set("PRC");

switch ($mod) {
    case 'upload': //对设备进行信息设置
        $content = file_get_contents('php://input');
        $param = @$_GET['param']; //b64_encode
        $id = isset($_GET['id']) ? @$_GET['id'] : 1;
        $fname = './data/'.$id.'.txt';
        file_put_contents($fname, base64_decode($param));
        exit('{"code":"1","msg":"Update Success!"}');
        break;
    case 'remote': // 远程控制
        $id = isset($_GET['id']) ? @$_GET['id'] : 1;
        $fname = './data/'.$id.'.txt';
        if(is_file($fname))
        {
            $info = file_get_contents($fname);
            exit('{"code":0, "data": '.$info.'}');
        }
        exit('{"code":1, "msg": "Wait for Suroy\'s adding a settings."}');
        break;
    case 'show': // 显示信息
        break;
    default:
        exit('{"code":"-1","msg":"Access denied"}');
        break;
}



function real_ip()
{
    $ip = $_SERVER['REMOTE_ADDR'];
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) {
        foreach ($matches[0] as $xip) {
            if (!preg_match('#^(10|172\.16|192\.168)\.#', $xip)) {
                $ip = $xip;
                break;
            }
        }
    } elseif (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_CF_CONNECTING_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CF_CONNECTING_IP'])) {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    } elseif (isset($_SERVER['HTTP_X_REAL_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_X_REAL_IP'])) {
        $ip = $_SERVER['HTTP_X_REAL_IP'];
    }
    return $ip;
}


?>