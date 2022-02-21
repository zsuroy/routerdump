<?php
/**
 * 
 * router
 * @author @Suroy
 * @date 22.01.10
 * @lastedit 22.2.21
 * 
 */
error_reporting(0);
$mod = isset($_GET['mod']) ? $_GET['mod'] : null;
switch ($mod) {
    case null: //首页
        $mark = '访问成功';
		break;
	case 'routermsg': // Routerdump
        $id = isset($_GET['id']) ? @$_GET['id'] : 1;
        $param = isset($_GET['param']) ? @$_GET['param'] : null;
        $url = 'http://127.0.0.1/app.php?mod=router&id='.$id.'&param='.$param;
        $info = getSSLPage($url);
        exit($info);
		break;
    default:
        exit('{"code":"-1","msg":"Access denied"}');
        break;
}

function getSSLPage($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    // curl_setopt($ch, CURLOPT_SSLVERSION,3); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// 这个是主要参数
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
	
}