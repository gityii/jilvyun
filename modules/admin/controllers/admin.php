<?PHP
namespace app\admin\controllers;
use app\admin\models\LoginForm;
use base\controllers\web;
use base\controllers\db;
use base\controllers\page;
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

            //获取用户输入的验证码
            $captcha = isset($_POST['captcha']) ? trim($_POST['captcha']) : '';
            //获取Session中的验证码
            //session_start();
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

            $name = web::post('name', '');
            $pswd = web::post('pswd', '');

            //取出用户名和密码，用户名自动去除两端空白，自动转换为小写
            $username = strtolower(trim($name));
            $password = $pswd;

            $usercheck = new LoginForm();

            $errmsg = $usercheck->validatePassword($username, $password);

            if('' == $errmsg) {//没消息才是好消息
                web::layout('admin/views/layout/admin');
                web::render('admin/views/index');
            }else{
                web::render('admin/views/loginpage');
            }

        }else{
            web::render('admin/views/loginpage');
        }



    }

    public static function control(){

        if (!isset($_SESSION['user_name'])) {
            exit('请先登录'); //停止脚本文件继续执行
        }
        web::layout('admin/views/layout/admin');

        web::render('admin/views/index');
    }



    public static function logout(){

        session_start();
        web::session('user_uid',0,false);
        web::session('user_name','',false);
        web::session('user_right','',false);
        session_write_close();

        $per = 10;
        $countdata = db::first('select count(*) from `t_notice`');
        $recordcount = $countdata['count(*)'];
        page::init(0,$recordcount,$per);
        $list = db::query_get('select * from `t_notice` order by `date` desc'.page::limitsql());

        $view = db::query_get('select * from `t_carousel` order by `date` desc limit 3');

        $topic = db::query_get('select * from `t_topic` order by `date` desc limit 2');

        web::render('admin/views/loginout',array(
            'list'=> $list,
            'view0'=> $view[0],
            'view1'=> $view[1],
            'view2'=> $view[2],
            'topic0' => $topic[0],
            'topic1' => $topic[1]
        ));
    }




}

