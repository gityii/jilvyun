<?PHP
namespace app\admin\controllers;
use app\admin\models\LoginForm;
use base\controllers\web;

class admin{

    public static $user = array(
        'user_uid' => 0,
        'user_name' => '',
        'user_right' => 0,
        );

    public static function login()
    {
        $errmsg = '请输入用户名和密码';

        if (!empty($_POST)) {
            $name = web::post('name', '');
            $pswd = web::post('pswd', '');

            $usercheck = new LoginForm();

            $errmsg = $usercheck->validatePassword($name, $pswd);

            list(self::$user['user_uid'], self::$user['user_name'], self::$user['user_right']) = web::user();


            if('' == $errmsg) {//没消息才是好消息
                web::layout('admin/views/layout/admin');

             return  web::render(
                    'admin/views/index'
                   // array('user'=> self::$user['user_name'])
                );
            }
        }

      return  web::render(
            'admin/views/login',
            array('msg' => $errmsg)
        );

    }

    public static function logout(){

        session_start();
        web::session('user_uid',0,false);
        web::session('user_name','',false);
        web::session('user_right','',false);
        session_write_close();
        header('location:/admin/admin/login');

    }

}

