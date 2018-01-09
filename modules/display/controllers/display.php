<?php
/**
 * Created by PhpStorm.
 * User: v_ransu
 * Date: 2018/1/8
 * Time: 16:08
 */
namespace app\display\controllers;

use base\controllers\db;
use base\controllers\web;
use base\controllers\page;
use base\controllers\file;

class display
{
    public static function jiti()
    {

        $msg = array();
        $success = false;
        $error = '';

        web::layout('/admin/views/layout/admin');
        web::render('/display/views/jiti', array(
            'success' => $success,
            'error' => $error,
            'msg' => $msg
        ));
    }

    public static function category()
    {

        $msg = array();
        $success = false;
        $error = '';

        $result = db::query_get('select `family`, count(`family`) as family_count from `t_group` group by `family`');


        echo json_encode($result);
    }

}