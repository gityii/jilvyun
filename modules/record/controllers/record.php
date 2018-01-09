<?php
/**
 * Created by PhpStorm.
 * User: v_ransu
 * Date: 2017/12/28
 * Time: 10:02
 */
namespace app\record\controllers;

use base\controllers\db;
use base\controllers\web;
use base\controllers\page;
use base\controllers\file;


class record
{

    public static function pcrecord()
    {
        $ruleid = web::get('id');
        $where = '';
        if ($ruleid != '') {
            $where = ' where `ruleid`=\'' . $ruleid . '\'';
        }
        $per = 20;
        $countdata = db::first('select count(*) from `t_rule`' . $where);
        $recordcount = $countdata['count(*)'];
        page::init(0, $recordcount, $per);
//        $list = db::query_get('select * from `t_rule`'.$where);
//        $rules = db::query_get('select `ruleid`,`name` from `t_family` where `name`!=\'\' order by `id` asc');
        web::layout('admin/views/layout/admin');
        web::render('record/views/pcrecord', array(
//            'list'=>$list,
//            'rules'=>$rules,
//            'ruleid'=>$ruleid
        ));
    }


    public static function group()
    {
//        $ruleid = web::get('id');
//        $where = '';
//        if ($ruleid!='')
//        {
//            $where = ' where `ruleid`=\''.$ruleid.'\'';
//        }
//        $per = 20;
//        $countdata = db::first('select count(*) from `t_group`'.$where);
//        $recordcount = $countdata['count(*)'];
//        page::init(0,$recordcount,$per);
        $list = db::query_get('select * from `t_group` order by `date` asc');
        web::layout('admin/views/layout/admin');
        web::render('record/views/group',array(
            'list'=>$list
        ));
    }

    public static function single()
    {
//        $ruleid = web::get('id');
//        $where = '';
//        if ($ruleid!='')
//        {
//            $where = ' where `ruleid`=\''.$ruleid.'\'';
//        }
//        $per = 20;
//        $countdata = db::first('select count(*) from `t_group`'.$where);
//        $recordcount = $countdata['count(*)'];
//        page::init(0,$recordcount,$per);
        $list = db::query_get('select * from `t_single` order by `date` asc');
        web::layout('admin/views/layout/admin');
        web::render('record/views/single',array(
            'list'=>$list
        ));
    }


    public static function singleadd()
    {
        $msg = array();
        $success = false;
        $error = '';
        $uname = '';
        $val = 0;
        $uid = 0;
        $content = '';
        $types = array();

        if (!empty($_POST)) {
            $uname = web::post('uname', '');
            $uid = web::post('uid', '');
            $category = web::post('category', '');
            $project = web::post('project', '');
            $grade = web::post('nianji', '');
            $class = web::post('banji', '');

            $val = db::first('select `val` from `t_rule` where `project`=\'' . $project.'\' and `family`=\''.$category.'\'');

//            foreach ($class as $v) {
//                $types[$v['id']] = $v['class'];
//            }
//
//            $isin = in_array($postclass, $types);
//            if($isin){
//            } else{
//                $msg['class'] = "输入的班级号超出范围";
//            }
//
//
//            if ($project == '') {
//                $msg['project'] = '请输入项目名称';
//            } else if (web::strlen($project) > 240) {
//                $msg['project'] = '项目名称不能超过100个汉字';
//
//            }

            if (empty($msg)) {
                $data = array(
                    'class' => $class,
                    'grade' => $grade,
                    'project' => $project,
                    'family' => $category,
                    'uname' => $uname,
                    'uid' => $uid,
                    'name' => '小王',
                    'dept' => '教务处',
                    'val' => $val['val'],
                    'date'=>time(),
                    'content' => $content
                );

                if (db::insert('t_single', $data)) {
                    $success = true;
                } else {
                    $error = '提交失败';
                }
            }
        }

        web::layout('/admin/views/layout/admin');
        web::render('/record/views/singleadd', array(
            'success' => $success,
            'error' => $error,
            'msg' => $msg
        ));
    }


    public static function jiliansingle()
    {
        $postcateg = '';
        $chtml = '';
        $phtml = '';

        $category = db::query_get('select `category` from `t_family`');

        foreach ($category as $v) {
            $chtml .= '<option value="' . $v['category'] . '">' . $v['category'] . '</option>';
        }

        if(!empty($_POST['category']))
        {
            $postcateg = web::post('category', '');
            $postproj = db::query_get('select `project`,`val` from `t_rule` where `family`=\''.$postcateg.'\'  and `objects`=\'个人\'');

            foreach ($postproj as $v) {
                $phtml .= '<option value="' . $v['project'] . '">' . $v['project'] . '</option>';
            }
        }

        if(empty($postcateg))
        {
            $html = '<div class="category form-group">
                     <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">类别： </label> 
                     <div class="col-xs-3">
                     <select name="category" id="category" class="form-control"><option value="">请选择</option>' . $chtml . '</select>
                     </div></div>';
        }else{
            $html = '<div class="proj form-group">
                     <label class="col-sm-2 control-label" style="text-align:left;width: 8%" for="">项目： </label>
                     <div class="col-xs-3">
                     <select name="project" class="form-control"><option value="">请选择</option>' . $phtml . '</select>
                     </div></div>';
        }

        echo($html);
    }


    public static function groupdel()
    {
        $id = intval(web::post('id', 0));
        $res = array(
            'status' => 1,
            'msg' => '',
            'id' => 0
        );

        if (db::delete('t_group', '`id`=\'' . $id . '\'')) {
            $res['status'] = 0;
            $res['id'] = $id;
        } else {
            $res['msg'] = '删除失败';
        }
        echo json_encode($res);
    }


//    public static function groupaddroute()
//    {
//        $msg = array();
//        $success = false;
//        $error = '';
//
//        $project = web::post('project', '');
//
//        if ($project == '') {
//            $msg['project'] = '请输入项目名称';
//        } else if (web::strlen($project) > 240) {
//            $msg['project'] = '项目名称不能超过100个汉字';
//
//        }
//        web::layout('/admin/views/layout/admin');
//        web::render('/record/views/groupadd', array(
//            'success' => $success,
//            'error' => $error,
//            'msg' => $msg,
//            'data' => array(
//                'project' => $project,
////                'grade' => $postgrade,
//
//            ),
////            'grades' => $grades,
////            'familys' => $familys,
////            'classes' => $postclass,
//        ));
//    }


    public static function jiliangrade()
    {

        $postgrade = '';
        $chtml = '';
        $ghtml = '';

            $grade = db::query_get('select `grade` from `t_grade`');

            foreach ($grade as $v) {
                $ghtml .= '<option value="' . $v['grade'] . '">' . $v['grade'] . '</option>';
            }

            if(!empty($_POST['grade']))
            {
                $postgrade = web::post('grade', '');
                $postclass = db::query_get('select `class` from `t_school` where `grade`='.$postgrade.'');

                foreach ($postclass as $v) {
                    $chtml .= '<option value="' . $v['class'] . '">' . $v['class'] . '</option>';
                }
            }

        if($postgrade==0)
        {
            $html = '<div class="grade form-group">
                     <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">年级： </label> 
                     <div class="col-xs-3">
                     <select name="nianji" id="grade" class="form-control"><option value="">请选择</option>' . $ghtml . '</select>
                     </div></div>';
        }else{
            $html = '<div class="class form-group">
                     <label class="col-sm-2 control-label" style="text-align:left;width: 8%" for="">班级： </label>
                     <div class="col-xs-3">
                     <select name="banji" class="form-control"><option value="">请选择</option>' . $chtml . '</select>
                     </div></div>';
        }

        //输出下拉菜单
        echo($html);

    }


    public static function jilianrule()
    {

        $postcateg = '';
        $chtml = '';
        $phtml = '';

        $category = db::query_get('select `category` from `t_family`');

        foreach ($category as $v) {
            $chtml .= '<option value="' . $v['category'] . '">' . $v['category'] . '</option>';
        }

        if(!empty($_POST['category']))
        {
            $postcateg = web::post('category', '');
            $postproj = db::query_get('select `project`,`val` from `t_rule` where `family`=\''.$postcateg.'\'  and `objects`=\'集体\'');
            foreach ($postproj as $v) {
                $phtml .= '<option value="' . $v['project'] . '">' . $v['project'] . '</option>';
            }
        }

        if(empty($postcateg))
        {
            $html = '<div class="category form-group">
                     <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">类别： </label> 
                     <div class="col-xs-3">
                     <select name="category" id="category" class="form-control"><option value="">请选择</option>' . $chtml . '</select>
                     </div></div>';
        }else{
            $html = '<div class="proj form-group">
                     <label class="col-sm-2 control-label" style="text-align:left;width: 8%" for="">项目： </label>
                     <div class="col-xs-3">
                     <select name="project" class="form-control"><option value="">请选择</option>' . $phtml . '</select>
                     </div></div>';
        }

        echo($html);
    }




    public static function groupadd()
    {
        $msg = array();
        $success = false;
        $error = '';
        $postclass = '';
        $val = 0;
        $content = '';
        $types = array();

        if (!empty($_POST)) {
            $category = web::post('category', '');
            $project = web::post('project', '');
            $grade = web::post('nianji', '');
            $class = web::post('banji', '');

            $val = db::first('select `val` from `t_rule` where `project`=\'' . $project.'\' and `family`=\''.$category.'\'');

//            foreach ($class as $v) {
//                $types[$v['id']] = $v['class'];
//            }
//
//            $isin = in_array($postclass, $types);
//            if($isin){
//            } else{
//                $msg['class'] = "输入的班级号超出范围";
//            }
//
//
//            if ($project == '') {
//                $msg['project'] = '请输入项目名称';
//            } else if (web::strlen($project) > 240) {
//                $msg['project'] = '项目名称不能超过100个汉字';
//
//            }

            if (empty($msg)) {
                $data = array(
                    'class' => $class,
                    'grade' => $grade,
                    'project' => $project,
                    'family' => $category,
                    'ruleid' => 0,
                    'name' => '小王',
                    'dept' => '教务处',
                    'val' => $val['val'],
                    'date'=>time(),
                    'content' => $content
                );

                if (db::insert('t_group', $data)) {
                    $success = true;
                } else {
                    $error = '提交失败';
                }
            }

        }

        web::layout('/admin/views/layout/admin');
        web::render('/record/views/groupadd', array(
            'success' => $success,
            'error' => $error
           // 'msg' => $msg
        ));

    }





    public static function pcadd()
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

            if ($objects != '集体' && $objects != '个人') {
                $msg['objects'] = '请输入集体或个人';
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
            'types' => $types
        ));

    }


    public static function pcdel()
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


    public static function pcedit()
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
        $types_data = db::query_get('select `ruleid`,`category` from `t_family` where `category`!=\'\'');
        foreach ($types_data as $v){
            $types[$v['ruleid']] = $v['category'];
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

            $getid = db::first('select `ruleid` from `t_family` where `category`=\''.$family.'\'');


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

    public static function mobrecord()
    {

    }

    public static function batchrecord()
    {

    }


    public static function queryrecord()
    {

    }


    public static function punish()
    {

    }



}