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
use base\controllers\file;

class guiding
{

    public static function rule()
    {

        $ruleid = web::get('id');
        $where = '';
        if ($ruleid!='')
        {
            $where = ' where `ruleid`=\''.$ruleid.'\'';;
        }
        $per = 20;
        $countdata = db::first('select count(*) from `t_rule`'.$where);
        $recordcount = $countdata['count(*)'];
        page::init(0,$recordcount,$per);
        $list = db::query_get('select * from `t_rule`'.$where);
        $rules = db::query_get('select `ruleid`,`name` from `t_family` where `name`!=\'\' order by `id` asc');
        web::layout('admin/views/layout/admin');
        web::render('guiding/views/rule',array(
            'list'=>$list,
            'rules'=>$rules,
            'ruleid'=>$ruleid
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

    public static function add()
    {



    }

    public static function edit()
    {
        $ctype = web::request('ctype','');
        $id = web::request('id',0);

        $msg = array();
        $success = false;
        $error = '';
        $project = '';
        $family = '';
        $ruleid = '';
        $objects = '';
        $val = 0;
        $comments = '';
        //$types = array();

        if ($id>0)
        {
            $info = db::first('select `project`,`family`,`ruleid`,`objects`,`val`,`comments` from `t_rule` where `id`=\''.$id.'\'');

            if (!empty($info))
            {
                $project = $info['project'];
                $family = $info['family'];
                $ruleid = $info['ruleid'];
                $objects = $info['objects'];
                $val = $info['val'];
                $comments= $info['comments'];
            }else {
                $msg['title'] = '查询有误，请核实数据';
            }
        }else{
            $msg['title'] = '请求数据有误';
        }

        if (!empty($_POST))
        {
            $project = web::post('project', '');
            $family = intval(web::post('family', 0));
            $ruleid = web::post('ruleid', '');
            $objects = web::post('objects', '');
            $val = web::post('val', '');
            $comments = web::post('comments', '');

            if ($project == '')
            {
                $msg['project'] = '请输入项目名称';
            }else if (web::strlen($project) > 240)
            {
                $msg['title'] = '项目名称不能超过100个汉字';

            }

            if ($family != '集体' || $family != '个人')
            {
                $msg['family'] = '请输入集体 或 个人';
            }


            if (web::strlen($comments) > 1000)
            {
                $msg['content'] = '备注内容太长了';
            }


            if (empty($msg))
            {
                $data = array(
                    'project' => $project,
                    'family' => $family,
                    'ruleid' => $ruleid,
                    'objects' => $objects,
                    'val' => $val,
                    'comments' => $comments,
                );


                if ($id == 0)
                {
                    $error = '参数错误';
                } else if (db::update('t_rule', $data, '`id`=\'' . $id . '\'')) {
                        $success = true;
                        $error = '保存成功';
                    } else {
                        $error = '保存失败，请重试';
                    }
                }
            }

            web::layout('/admin/views/layout/admin');
            web::render('/guiding/views/edit', array(
                'id' => $id,
                'success' => $success,
                'error' => $error,
                'msg' => $msg,
                'data' => array(
                    'project' => $project,
                    'comments' => stripslashes($comments),
                    'ruleid' => $ruleid,
                    'objects' => $objects,
                    'val' => $val
                ),
                'ctype' => $ctype,
              //  'types' => $types
            ));

        }


}