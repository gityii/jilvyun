<?php # Script 2.4 - index.php

/* 
 *  This is the main page.
 *  This page includes the configuration file, 
 *  the templates, and any content-specific modules.
 */
//设置时间时区
date_default_timezone_set("PRC");

//声明公共变量
$_G = array();

//记录时间
$_G['time'] = $_SERVER['REQUEST_TIME'];

//权限验证标记
//define('__R__',true);
define('MESS_OK', 0);
define('MESS_ERROR', 1);
//初始化根目录路径
define('__ROOT__',dirname(__FILE__));

require(__ROOT__.'/config/user.php');
//引入系统基础类文件
require __ROOT__.'/controllers/base.php';
require __ROOT__.'/controllers/web.php';
require __ROOT__.'/controllers/page.php';
require __ROOT__.'/vendor/autoload.php';

if(empty($_magic_quote)) {
    $_GET = base\controllers\base::filter($_GET);
    $_POST = base\controllers\base::filter($_POST);
    $_REQUEST = base\controllers\base::filter($_REQUEST);
}

//对请求数据进行过滤
// Validate what page to show，要显示的内容是基于发送给这个页面的值，如index.php?p=contact:
/*
if (isset($_GET['p'])) {
    $p = $_GET['p'];
} elseif (isset($_POST['p'])) { // Forms
    $p = $_POST['p'];
} else {
    $p = NULL;
}
*/

//创建类自动加载机制
if(function_exists('spl_autoload_register')) {
    spl_autoload_register('base\controllers\base::autoload'); // 注册自动加载;
} else {
    function __autoload($class) {
        base\controllers\base::autoload($class);
    }
}


//初始化路由
$_route = base\controllers\base::route();
//判断路由是否正确
if ($_route===false){
    exit('404');
}

//对管理路径下的ACT执行身份验证操作

if (strpos($_route['act'],'admin/')===0){
    list($_G['admin_uid'],$_G['admin_name'],$_G['admin_right']) =  base\controllers\web::user();
    if ($_G['admin_uid']<=0 && $_route['act']!='admin/admin/login'){
        header('location:/admin/admin/login');
    }
}


$controllerNamespace = (new base\controllers\base)->run($_route['act'], $act);

$actions =  new $controllerNamespace;

$actions->$act();
