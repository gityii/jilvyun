<?php
namespace app\usercenter\controllers;

class init
{

    public static function loginsession()
    {
    //启动Session，判断Session中的用户信息
        session_start();
    //当用户没有登录时，重定向到登录页面
        if (!isset($_SESSION['user'])) {
            header('Location:/usercenter/login/login');
            exit; //停止脚本文件继续执行
        }
    }

}
