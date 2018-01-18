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
        $category = web::get('category');
        $where = '';
        if (!empty($category))
        {
            $where = ' where `family`=\''.$category.'\'';
        }
        $per = 20;
        $countdata = db::first('select count(*) from `t_rule`'.$where);
        $recordcount = $countdata['count(*)'];
        page::init(0,$recordcount,$per);
        $list = db::query_get('select * from `t_rule`'.$where);
        $class = db::query_get('select DISTINCT `category` from `t_family` where `category`!=\'\' order by `id` asc');
        web::layout('admin/views/layout/admin');
        web::render('guiding/views/rule',array(
            'list'=>$list,
            'class'=>$class
        ));
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


    public static function jilianobject()
    {

        $postcate = '';
        $chtml = '';
        $ghtml = '';

        /*去重*/
        $category = db::query_get('select DISTINCT `category` from `t_family`');

        foreach ($category as $v) {
            $ghtml .= '<option value="' . $v['category'] . '">' . $v['category'] . '</option>';
        }

        if(!empty($_POST['family']))
        {
            $postcate = web::post('family', '');

            $postobj = db::query_get('select `obj` from `t_family` where `category`=\''.$postcate.'\'');

            foreach ($postobj as $v) {
                $chtml .= '<option value="' . $v['obj'] . '">' . $v['obj'] . '</option>';
            }
        }

        if(empty($postcate))
        {
            $html = '<div class="category form-group">
                     <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">所属类别： </label> 
                     <div class="col-xs-3">
                     <select name="family" id="category" class="form-control"><option value="">请选择</option>' . $ghtml . '</select>
                     </div></div>';
        }else{
            $html = '<div class="obj form-group">
                     <label class="col-sm-2 control-label" style="text-align:left;width: 8%" for="">对象： </label>
                     <div class="col-xs-3">
                     <select name="objects" class="form-control"><option value="">请选择</option>' . $chtml . '</select>
                     </div></div>';
        }

        //输出下拉菜单
        echo($html);

    }

    public static function ruleadd()
    {
        $msg = array();
        $getid = array();
        $success = false;
        $error = '';
        $project = '';
        $family = '';
        $objects = '';
        $val = '';
        $comments = '';

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

            $getid = db::first('select `classid` from `t_family` where `category`=\'' . $family . '\' and `obj`=\''.$objects.'\'');

            if (empty($msg)) {
                $data = array(
                    'project' => $project,
                    'family' => $family,
                    'classid' => $getid['classid'],
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
                'comments' => stripslashes($comments),
                'val' => $val
            )));
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
        $list = db::query_get('select `classid`,`category`,`id`,`obj` from `t_family` where `category`!=\'\' order by `id` desc'.page::limitsql());
        web::layout('/admin/views/layout/admin');
        web::render('/guiding/views/typelist',array(
        'list'=>$list,
        ));
    }


    public static function typeadd()
    {
        $classid = '';
        $obj = '';
        $deptid = '';
        $category = '';
        $success ='';
        $error = '';
        $msg = array();
        $ftypes = array();

        $ftypes[0] = '个人';
        $ftypes[1] = '集体';


        if (!empty($_POST))
        {
            $classid = intval(web::post('classid', 0));
            $category = web::post('category', '');
            $obj = web::post('obj', '');

            $types_data = db::query_get('select `classid`,`category`, `obj` from `t_family` where `category`!=\'\'');

            foreach ($types_data as $v) {
                $types[$v['classid']] = $v['category'];

                if ($classid == '')
                {
                    $msg['classid'] = '请输入类别编码';
                } else if($v['classid'] == $classid)
                {
                    $msg['classid'] = '此类别编码已存在！';
                }

                if($v['category'] == '')
                {
                    $msg['category'] = '请输入类别名称';
                } else if(($v['category'] == $category)&&($v['obj'] == $obj))
                {
                    $msg['category'] = '此类别名称已存在！';
                }
            }


            if (empty($msg)) {
                $data = array(
                    'classid' => $classid,
                    'category' => $category,
                    'obj' => $obj
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
                'classid' => $classid,
                'category' => $category,
                'obj' => $obj
            ),
            'ftypes' => $ftypes,
        ));
    }



    public static function typeedit()
    {
        $classid = '';
        $category = '';
        $success ='';
        $error = '';
        $msg = array();
        $id = web::request('id','');

            $info = db::first('select `classid`,`category` from `t_family` where `id`=\''.$id.'\'');

            if (!empty($info))
            {
                $classid = $info['classid'];
                $category = $info['category'];
            }else {
                $msg['title'] = '查询有误，请核实数据';
            }

        if (!empty($_POST))
        {
            $category = web::post('category', '');
            $classid = intval(web::post('classid', 0));


            if ($classid == '') {
                $msg['classid'] = '请输入类别编号';
            }

            if ($category == '') {
                $msg['category'] = '请输入类别名称';
            }


            if (empty($msg))
            {
                $data = array(
                    'classid' => $classid,
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
                'classid' => $classid,
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