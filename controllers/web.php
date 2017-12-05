<?php
/**
 * Created by PhpStorm.
 * User: v_ransu
 * Date: 2017/11/6
 * Time: 14:48
 */

/**
 * post
 * 获取POST请求数据
 * @access public
 * @param $name 参数名
 * @param $default 默认值
 */
namespace  base\controllers;


class web
{
    private static $_layout = false;
    private static $_layout_data = array();


    /**
     * session
     * 存储/读取 session
     * @param $name session名
     * @param $value session值
     * @param $start 是否需要开启session
     * @access public
     */
    public static function session($name,$value=null,$start=true){
        $return = false;
        $start && session_start();
        if ($value!==null){
            $_SESSION[$name] = $value;
            $return = true;
        }else {
            $return = isset($_SESSION[$name])?$_SESSION[$name]:'';
        }
        $start && session_write_close();
        return $return;
    }

    /**
     * user
     * 登录用户信息
     * @access public
     * 待开发
     */
    public static function user(){
        session_start();
        $uid = web::session('user_uid',null,false);
        $username = web::session('user_name',null,false);
        $right = web::session('user_right',null,false);
        session_write_close();
        if ($uid>0){
            return array($uid, $username, $right);
        }else {
            return array(0, '', 0);
        }
    }

    /**
     * render
     * 页面渲染
     * @access public
     * @param $temp 页面名称
     * @param $data 渲染数据
     */
    public static function  render($temp,$data=array()){
        foreach ($data as $k=>$v) {
            $$k = $v;
        }
        if (self::$_layout===false){//没有使用模板
            include __ROOT__.'/modules/'.$temp.'.views.php';
        }else {
            ob_start();
            include __ROOT__.'/modules/'.$temp.'.views.php';
            $layout_content = ob_get_contents();
            ob_end_clean();
            foreach (self::$_layout_data as $k=>$v) {
                $$k = $v;
            }
            include __ROOT__.'/modules/'.self::$_layout.'.php';
        }
    }

    /*
     * include
     * */
    public static function pinclude($temp,$data=array()){
        foreach ($data as $k=>$v) {
            $$k = $v;
        }
        include __ROOT__.'/view/'.$temp.'.php';
    }

    /**
     * layout
     * 页面渲染模板
     * @access public
     * @param $name 模板名称
     */
    public static function layout($name,$data=array()){
        self::$_layout = $name;
        self::$_layout_data = $data;
    }



    /**
     * post
     * 获取POST请求数据
     * @access public
     * @param $name 参数名
     * @param $default 默认值
     */
    public static function post($name,$default=''){
        return isset($_POST[$name])?$_POST[$name]:$default;
    }

    /**
     * get
     * 获取GET请求数据
     * @access public
     * @param $name 参数名
     * @param $default 默认值
     */
    public static function get($name,$default=''){
        return isset($_GET[$name])?$_GET[$name]:$default;
    }

    /**
     * request
     * 获取REQUEST请求数据
     * @access public
     * @param $name 参数名
     * @param $default 默认值
     */
    public static function request($name,$default=''){
        return isset($_REQUEST[$name])?$_REQUEST[$name]:$default;
    }

    /**
     * strlen
     * 计算字符串长度
     * @access public
     * @param $str 字符串
     */
    public static function strlen($str){
        return ceil((strlen($str) + mb_strlen($str,'UTF-8'))/2);
    }
}