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


    public static function edu()
    {


    }

    public static function add()
    {



    }

    public static function edit()
    {
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
        $ftypes = array();

        $ftypes[0] = '个人';
        $ftypes[1] = '集体';

        $types_data = db::query_get('select `ruleid`,`category` from `t_family` where `category`!=\'\'');
        foreach ($types_data as $v) {
            $types[$v['ruleid']] = $v['category'];
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

            if (web::strlen($comments) > 1000) {
                $msg['content'] = '备注内容太长';
            }

            $getid = db::first('select `ruleid` from `t_family` where `category`=\'' . $family . '\'');

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
            'types' => $types,
            'ftypes' => $ftypes
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



    public static function typelist()
    {
        $per = 10;
        $countdata = db::first('select count(*) from `t_family`');
        $count = $countdata['count(*)'];
        page::init(0,$count,$per);
        $list = db::query_get('select `ruleid`,`category`,`id`,`dept` from `t_family` where `category`!=\'\' order by `id` desc'.page::limitsql());
        web::layout('/admin/views/layout/admin');
        web::render('/guiding/views/typelist',array(
        'list'=>$list,
        ));
    }


    public static function typeadd()
    {
        $ruleid = '';
        $dept = '';
        $deptid = '';
        $category = '';
        $success ='';
        $error = '';
        $msg = array();
        $ftypes = array();

        $ftypes_data = db::query_get('select `id`,`deptid`,`name` from `t_dept` where `name`!=\'\'');
        foreach ($ftypes_data as $v) {
            $ftypes[$v['id']] = $v['name'];
        }

        if (!empty($_POST))
        {
            $ruleid = intval(web::post('ruleid', 0));
            $category = web::post('category', '');
            $dept = web::post('dept', '');

            $types_data = db::query_get('select `ruleid`,`category` from `t_family` where `category`!=\'\'');

            foreach ($types_data as $v) {
                $types[$v['ruleid']] = $v['category'];

                if ($ruleid == '')
                {
                    $msg['ruleid'] = '请输入类别编码';
                } else if($v['ruleid'] == $ruleid)
                {
                    $msg['ruleid'] = '此类别编码已存在！';
                }

                if($v['category'] == '')
                {
                    $msg['category'] = '请输入类别名称';
                } else if($v['category'] == $category)
                {
                    $msg['category'] = '此类别名称已存在！';
                }
            }

            $deptid = db::first('select `deptid` from `t_dept` where `name`=\'' . $dept . '\'');


            if (empty($msg)) {
                $data = array(
                    'ruleid' => $ruleid,
                    'category' => $category,
                    'dept' => $dept,
                    'deptid' => $deptid['deptid']
                );


                if (db::insert('t_family', $data)) {
                    $success = true;
                } else {
                    $error = '提交失败';
                }
            }

        }

        web::layout('/admin/views/layout/admin');
        web::render('/guiding/views/typeadd', array(
            'success' => $success,
            'error' => $error,
            'msg' => $msg,
            'data' => array(
                'ruleid' => $ruleid,
                'category' => $category,
                'dept' => $dept
            ),
            'ftypes' => $ftypes,
        ));
    }



    public static function typeedit()
    {
        $ruleid = '';
        $category = '';
        $success ='';
        $error = '';
        $msg = array();
        $id = web::request('id','');

            $info = db::first('select `ruleid`,`category` from `t_family` where `id`=\''.$id.'\'');

            if (!empty($info))
            {
                $ruleid = $info['ruleid'];
                $category = $info['category'];
            }else {
                $msg['title'] = '查询有误，请核实数据';
            }

        if (!empty($_POST))
        {
            $category = web::post('category', '');
            $ruleid = intval(web::post('ruleid', 0));


            if ($ruleid == '') {
                $msg['ruleid'] = '请输入类别编号';
            }

            if ($category == '') {
                $msg['category'] = '请输入类别名称';
            }


            if (empty($msg))
            {
                $data = array(
                    'ruleid' => $ruleid,
                    'category' => $category,
                );

                if (db::update('t_family',$data,'`id`=\''.$id.'\'')) {
                    $success = true;
                }else {
                    $error = '提交失败';
                }
            }
        }

        web::layout('/admin/views/layout/admin');
        web::render('/guiding/views/typeedit', array(
            'id' => $id,
            'success' => $success,
            'error' => $error,
            'msg' => $msg,
            'data' => array(
                'ruleid' => $ruleid,
                'category' => $category,
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