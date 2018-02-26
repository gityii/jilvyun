<?php
/**
 * Created by PhpStorm.
 * User: v_ransu
 * Date: 2017/11/3
 * Time: 15:26
 */

$_CONFIG = array(
    'db'=>array(
        'db_host'=>'localhost',
        'db_port'=>'3306',
        'db_user'=>'root',
        'db_pswd'=>'xamppaddme',
        'db_db'=>'myframe',
//    'db'=>array(
//        'db_host'=>'115.159.147.133',
//        'db_port'=>'3306',
//        'db_user'=>'root',
//        'db_pswd'=>'123987',
//        'db_db'=>'proxy',

//        'db'=>array(
//            'db_host'=>'115.159.147.133',   //连接oracle数据库
//            'db_port'=>'3306',
//            'db_user'=>'root',
//            'db_pswd'=>'123987',
//            'db_db'=>'proxy',
        /*
                'db_pswd'=>'root',
                'db_db'=>'qixiaxuanchuanbu',

                'db_pswd'=>'',
                'db_db'=>'qixiaxuanchuanbu',
        */
        'db_prex'=>'t_',
    ),
    'weixin'=>array(
        'appid'=>'wx7e91469ab217b581',
        'appsecret'=>'6873e0388c8be5b84939f0ee11898492',
        'token'=>''
    )
);