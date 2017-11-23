<?php
namespace app\usercenter\controllers;
use base\controllers\web;

class login
{
    public static function login()
    {
        //保存已经存在的用户信息
        $user_data = array(
            //格式：用户ID => array(用户名, 密码)
            1 => array('username' => 'xiaoming', 'password' => '123456'),
            //2 => array() //……其他用户的代码这里省略
        );

            //判断是否有登录表单提交
        if (isset($_POST['username']) && isset($_POST['password'])) {

            //获取用户输入的验证码
            $captcha = isset($_POST['captcha']) ? trim($_POST['captcha']) : '';
            //获取Session中的验证码
            session_start();
            if (empty($_SESSION['captcha'])) {  //如果Session中不存在验证码，则退出
                exit('验证码已经过期，请刷新页面重试。');
            }

            //获取验证码并清除Session中的验证码
            $true_captcha = $_SESSION['captcha'];
            unset($_SESSION['captcha']); //限制验证码只能验证一次，防止重复利用
            //忽略字符串的大小写，进行比较
            if (strtolower($captcha) !== strtolower($true_captcha)) {
                exit('您输入的验证码不正确！请刷新页面重试。');
            }
            //验证码验证通过，继续判断用户名和密码

            //取出用户名和密码，用户名自动去除两端空白，自动转换为小写
            $username = strtolower(trim($_POST['username']));
            $password = $_POST['password'];
            //到用户数组中验证用户名和密码
            foreach ($user_data as $k => $v) {
                if ($v['username'] == $username && $v['password'] == $password) {
                    //exit('登录成功！'); //验证成功
                    //将用户ID和用户名保存到Session中
                    $_SESSION['user'] = array('id' => $k, 'username' => $v['username']);
                    //重定向到用户中心个人信息页面
                    header('Location:/usercenter/user/showinfo');
                    exit;  //重定向后停止脚本继续执行
                }
            }
            exit('登录失败！用户名或密码错误，请刷新页面重试。');  //验证失败
        }


        //没有提交表单时，载入登录页面
        web::render('usercenter/views/loginpage');

    }


    public static function logout()
    {
        //先启动Session
        session_start();
        //清除Session中的用户信息
        unset($_SESSION['user']);
        //退出成功，自动跳转到登录页
        header('Location:/usercenter/login/login');
        exit;
    }
}