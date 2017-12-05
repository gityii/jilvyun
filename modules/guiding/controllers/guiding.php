<?php
/**
 * Created by PhpStorm.
 * User: v_ransu
 * Date: 2017/11/28
 * Time: 10:34
 */
namespace app\guiding\controllers;

use base\controllers\db;
use base\controllers\web;
use base\controllers\page;


class guiding
{

    public static function rule()
    {

        $type ='';
        $where1 = '';
        $where2 = '';
        if ($type!='')
        {
            $where1 = ' where `type`=\''.$type.'\'';
            $where2 = ' where l.`type`=\''.$type.'\'';
        }
        $per = 20;
        $countdata = db::first('select count(*) from `t_articlec`'.$where1);
        $articlecount = $countdata['count(*)'];
        page::init(0,$articlecount,$per);
        $list = db::query_get('select l.`articleid`,l.`title`,l.`type`,l.`dateline`,l.`order`,l.`viewcount`,c.`name` from `t_articlec` l left join `t_articlec_type` c on l.`type`=c.`typeid`'.$where2.' order by l.`order` asc,l.`articleid` desc'.page::limitsql());
        $types = db::query_get('select `typeid`,`name` from `t_articlec_type` where `name`!=\'\' order by `order` asc');
        web::layout('admin/views/layout/admin');
        web::render('guiding/views/rule',array(
            'list'=>$list,
            'types'=>$types,
            'type'=>$type
        ));

    }


    public static function person()
    {
        $type ='';
        $where1 = '';
        $where2 = '';
        if ($type!='')
        {
            $where1 = ' where `type`=\''.$type.'\'';
            $where2 = ' where l.`type`=\''.$type.'\'';
        }
        $per = 20;
        $countdata = db::first('select count(*) from `t_articlec`'.$where1);
        $articlecount = $countdata['count(*)'];
        page::init(0,$articlecount,$per);
        $list = db::query_get('select * from `t_person`');
        $types = db::query_get('select `typeid`,`name` from `t_articlec_type` where `name`!=\'\' order by `order` asc');
        web::layout('admin/views/layout/admin');
        web::render('guiding/views/person',array(
            'list'=>$list,
            'types'=>$types,
            'type'=>$type
        ));

    }


    public static function edu()
    {


    }







}