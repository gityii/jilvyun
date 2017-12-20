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
            $where = ' where `ruleid`=\''.$ruleid.'\'';
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
        $countdata = db::first('select count(*) from `t_user`');
        $articlecount = $countdata['count(*)'];
        page::init(0,$articlecount,$per);
        $list = db::query_get('select * from `t_user`');
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
        $id = web::request('id','');

        $msg = array();
        $success = false;
        $error = '';
        $project = '';
        $family = '';
        $objects = '';
        $val = '';
        $ruleid = '';
        $comments = '';
        $types = array();
        $types_data = db::query_get('select `ruleid`,`name` from `t_family` where `name`!=\'\'');
        foreach ($types_data as $v){
            $types[$v['ruleid']] = $v['name'];
        }

        if ($id>0)
        {
            $info = db::first('select `project`,`family`,`ruleid`,`objects`,`val`,`comments` from `t_rule` where `id`=\''.$id.'\'');

            if (!empty($info))
            {
                $project = $info['project'];
                $family = $info['family'];
                $objects = $info['objects'];
                $ruleid = $info['ruleid'];
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
            $family = web::post('family', '');
            $objects = web::post('objects', '');
            $val = web::post('val', '');
            $comments = web::post('comments', '');

            if ($project == '')
            {
                $msg['project'] = '请输入项目名称';
            }else if (web::strlen($project) > 240)
            {
                $msg['project'] = '长度太长';

            }

            if ($objects != '集体' && $objects != '个人')
            {
                $msg['objects'] = '请输入集体或个人';
            }


            if (web::strlen($comments) > 1000)
            {
                $msg['content'] = '备注内容太长';
            }

            $getid = db::first('select `ruleid` from `t_family` where `name`=\''.$family.'\'');


            if (empty($msg))
            {
                $data = array(
                    'project' => $project,
                    'family' => $family,
                    'ruleid' => $getid['ruleid'],
                    'objects' => $objects,
                    'val' => $val,
                    'comments' => $comments,
                );


                if ($id == 0 )
                {
                    $error = '参数错误';
                }else if (db::update('t_rule',$data,'`id`=\''.$id.'\'')) {
                        $success = true;
                        $error = '';
                    }else {
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
                    'family' => $family,
                    'ruleid' => $ruleid,
                    'comments' => stripslashes($comments),
                    'objects' => $objects,
                    'val' => $val
                ),
                'ctype' => $ctype,
                'types' => $types
            ));

        }


    public static function ruleadd()
    {
        $msg = array();
        $success = false;
        $error = '';
        $project = '';
        $family = '';
        $objects = '';
        $val = '';
        $comments = '';
        $types = array();

        $types_data = db::query_get('select `ruleid`,`name` from `t_family` where `name`!=\'\'');
        foreach ($types_data as $v) {
            $types[$v['ruleid']] = $v['name'];
        }

        if (!empty($_POST)) {
            $project = web::post('project', '');
            $family = web::post('family', '');
            $objects = web::post('objects', '');
            $val = web::post('val', '');
            $comments = web::post('comments', '');

            if ($project == '') {
                $msg['project'] = '请输入项目名称';
            } else if (web::strlen($project) > 240) {
                $msg['project'] = '项目名称不能超过100个汉字';

            }

            if ($objects != '集体' && $objects != '个人') {
                $msg['objects'] = '请输入集体或个人';
            }

            if (web::strlen($comments) > 1000) {
                $msg['content'] = '备注内容太长';
            }

            $getid = db::first('select `ruleid` from `t_family` where `name`=\'' . $family . '\'');

            if (empty($msg)) {
                $data = array(
                    'project' => $project,
                    'family' => $family,
                    'ruleid' => $getid['ruleid'],
                    'objects' => $objects,
                    'val' => $val,
                    'comments' => $comments,
                );

                if (db::insert('t_rule', $data)) {
                    $success = true;
                } else {
                    $error = '提交失败';
                }
            }

        }

        web::layout('/admin/views/layout/admin');
        web::render('/guiding/views/ruleadd', array(
            'success' => $success,
            'error' => $error,
            'msg' => $msg,
            'data' => array(
                'project' => $project,
                'family' => $family,
                'comments' => stripslashes($comments),
                'objects' => $objects,
                'val' => $val
            ),
            'types' => $types
        ));
    }

    public static function ruledel()
    {
        $id = intval(web::post('id', 0));
        $res = array(
            'status' => 1,
            'msg' => '',
            'id' => 0
        );

        if (db::delete('t_rule', '`id`=\'' . $id . '\'')) {
            $res['status'] = 0;
            $res['id'] = $id;
        } else {
            $res['msg'] = '删除失败';
        }
        echo json_encode($res);
    }



    public static function classlist()
    {
        $per = 10;
        $countdata = db::first('select count(*) from `t_family`');
        $count = $countdata['count(*)'];
        page::init(0,$count,$per);
        $list = db::query_get('select `ruleid`,`name`, `id` from `t_family` where `name`!=\'\' order by `id` desc'.page::limitsql());
        web::layout('/admin/views/layout/admin');
        web::render('/guiding/views/classlist',array(
        'list'=>$list,
        ));
    }


    public static function classadd()
    {

        $ruleid = '';
        $name = '';
        $success ='';
        $error = '';
        $msg = array();
        $types = array();

        if (!empty($_POST))
        {
            $ruleid = intval(web::post('ruleid', 0));
            $name = web::post('name', '');


            $types_data = db::query_get('select `ruleid`,`name` from `t_family` where `name`!=\'\'');

            foreach ($types_data as $v) {
                $types[$v['ruleid']] = $v['name'];

                if ($ruleid == '')
                {
                    $msg['ruleid'] = '请输入类别编码';
                } else if($v['ruleid'] == $ruleid)
                {
                    $msg['ruleid'] = '此类别编码已存在！';
                }

                if($v['name'] == '')
                {
                    $msg['ruleid'] = '请输入类别名称';
                } else if($v['name'] == $name)
                {
                    $msg['ruleid'] = '此类别名称已存在！';
                }
            }

            if (empty($msg)) {
                $data = array(
                    'ruleid' => $ruleid,
                    'name' => $name,
                );

                if (db::insert('t_family', $data)) {
                    $success = true;
                } else {
                    $error = '提交失败';
                }
            }

        }


        web::layout('/admin/views/layout/admin');
        web::render('/guiding/views/classadd', array(
            'success' => $success,
            'error' => $error,
            'msg' => $msg,
            'data' => array(
                'ruleid' => $ruleid,
                'name' => $name,
            ),
            'types' => $types
        ));

    }



    public static function classedit()
    {
        $ruleid = '';
        $name = '';
        $success ='';
        $error = '';
        $msg = array();
        $types = array();
        $id = web::request('id','');


            $info = db::first('select `ruleid`,`name` from `t_family` where `id`=\''.$id.'\'');

            if (!empty($info))
            {
                $ruleid = $info['ruleid'];
                $name = $info['name'];
            }else {
                $msg['title'] = '查询有误，请核实数据';
            }

        if (!empty($_POST))
        {
            $name = web::post('name', '');
            $ruleid = intval(web::post('ruleid', 0));


            if ($ruleid == '') {
                $msg['ruleid'] = '请输入类别编号';
            }

            if ($name == '') {
                $msg['name'] = '请输入类别名称';
            }


            if (empty($msg))
            {
                $data = array(
                    'ruleid' => $ruleid,
                    'name' => $name,
                );

                if (db::update('t_family',$data,'`id`=\''.$id.'\'')) {
                    $success = true;
                }else {
                    $error = '提交失败';
                }
            }
        }

        web::layout('/admin/views/layout/admin');
        web::render('/guiding/views/classedit', array(
            'id' => $id,
            'success' => $success,
            'error' => $error,
            'msg' => $msg,
            'data' => array(
                'ruleid' => $ruleid,
                'name' => $name,
            ),
        ));
    }

    public static function classdel()
    {
        $id = intval(web::post('id', 0));
        $res = array(
            'status' => 1,
            'msg' => '',
            'id' => 0
        );

        if (db::delete('t_family', '`id`=\'' . $id . '\'')) {
            $res['status'] = 0;
            $res['id'] = $id;
        } else {
            $res['msg'] = '删除失败';
        }
        echo json_encode($res);
    }


}