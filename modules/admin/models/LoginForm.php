<?php
/**
 * 后台登录页，会话管理，因为当前不含有注册等功能，所以比较简单
 */
namespace app\admin\models;
use base\controllers\web;
use base\controllers\db;
class LoginForm{

    public function validatePassword($username, $password)
    {
        if(!empty($username) && !empty($password)){
            $userinfo = db::first('select `uid`,`pswd`,`right` from `admin_user` where `name`=\''.$username.'\'');
            if (!empty($userinfo) && $userinfo['pswd']==md5($password)) {
                session_start();
                web::session('user_uid', $userinfo['uid'], false);
                web::session('user_name', $username, false);
                web::session('user_right', $userinfo['right'], false);
                session_write_close();
                $errmsg ='';
                return $errmsg;
            }else{
                $errmsg = '用户名或密码错误';
                return $errmsg;
            }
        }else {
            $errmsg = '请输入用户名和密码';
            return $errmsg;
        }
    }

}
