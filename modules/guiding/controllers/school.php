<?php
/**
 * Created by PhpStorm.
 * User: v_ransu
 * Date: 2017/12/21
 * Time: 10:26
 */
namespace app\guiding\controllers;

use base\controllers\db;
use base\controllers\web;
use base\controllers\page;
use base\controllers\file;

class school
{


    public static function school()
    {
        $grade= web::get('grade');
        $where = '';
        if ($grade!='')
        {
            $where = ' where `grade`=\''.$grade.'\'';
        }

        $per = 20;
        $countdata = db::first('select count(*) from `t_school`');
        $articlecount = $countdata['count(*)'];
        page::init(0, $articlecount, $per);
        $list = db::query_get('select * from `t_school`'.$where);
        $type = db::query_get('select `grade` from `t_grade` where `grade`!=\'\'');
        web::layout('admin/views/layout/admin');
        web::render('guiding/views/school', array(
            'list' => $list,
            'type' => $type,
            'grade' => $grade
        ));
    }


    public static function deptadd()
    {
        $deptid = '';
        $name = '';
        $success ='';
        $error = '';
        $msg = array();
        $types = array();

        if (!empty($_POST))
        {
            $deptid = intval(web::post('deptid', 0));
            $name = web::post('name', '');

            $types_data = db::query_get('select `deptid`,`name` from `t_dept` where `name`!=\'\'');

            foreach ($types_data as $v) {
                $types[$v['deptid']] = $v['name'];

                if ($deptid == '')
                {
                    $msg['deptid'] = '请输如部门编号';
                } else if($v['deptid'] == $deptid)
                {
                    $msg['deptid'] = '此部门编码已存在！';
                }

                if($v['name'] == '')
                {
                    $msg['name'] = '请输入部门名称';
                } else if($v['name'] == $name)
                {
                    $msg['name'] = '此部门名称已存在！';
                }
            }

            if (empty($msg)) {
                $data = array(
                    'deptid' => $deptid,
                    'name' => $name,
                );

                if (db::insert('t_dept', $data)) {
                    $success = true;
                } else {
                    $error = '提交失败';
                }
            }

        }


        web::layout('/admin/views/layout/admin');
        web::render('/guiding/views/deptadd', array(
            'success' => $success,
            'error' => $error,
            'msg' => $msg,
            'data' => array(
                'deptid' => $deptid,
                'name' => $name,
            ),
            'types' => $types
        ));
    }


    public static function gradeedit()
    {
        $grade = '';
        $content = '';
        $unit = '';
        $success ='';
        $error = '';
        $msg = array();

        $id = web::request('id','');

        if ($id>0)
        {
            $info = db::first('select `grade`, `content`, `unit` from `t_grade` where `id`=\''.$id.'\'');

            if (!empty($info))
            {
                $grade = $info['grade'];
                $content = $info['content'];
                $unit = $info['unit'];
            }else {
                $msg['title'] = '查询有误，请核实数据';
            }
        }else{
            $msg['title'] = '请求数据有误';
        }


        if (!empty($_POST))
        {
            $grade = web::post('grade', '');
            $content= web::post('content', '');
            $unit = web::post('unit', '');


            if ($grade == '')
            {
                $msg['grade'] = '请输入年级号';
            }


            if (empty($msg))
            {
                $data = array(
                    'grade' => $grade,
                    'content' => $content,
                    'unit' => $unit
                );

                if ($id == 0) {
                    $error = '参数错误';
                } else if (db::update('t_grade', $data, '`id`=\'' . $id . '\'')) {
                    $success = true;
                    $error = '';
                } else {
                    $error = '保存失败，请重试';
                }
            }
        }

        web::layout('/admin/views/layout/admin');
        web::render('/guiding/views/gradeedit', array(
            'id' => $id,
            'success' => $success,
            'error' => $error,
            'msg' => $msg,
            'data' => array(
                'grade' => $grade,
                'content' => $content,
                'unit' => $unit
            )));
    }


    public static function classedit()
    {
        $grade = '';
        $content = '';
        $unit = '';
        $class = '';
        $success ='';
        $error = '';
        $msg = array();

        $id = web::request('id','');

        $types = db::query_get('select `grade` from `t_grade` where `grade`!=\'\'');

        if ($id>0)
        {
            $info = db::first('select `class`, `grade`, `content`, `unit` from `t_school` where `id`=\''.$id.'\'');

            if (!empty($info))
            {
                $class= $info['class'];
                $grade = $info['grade'];
                $content = $info['content'];
                $unit = $info['unit'];
            }else {
                $msg['title'] = '查询有误，请核实数据';
            }
        }else{
            $msg['title'] = '请求数据有误';
        }


        if (!empty($_POST))
        {
            $class = web::post('class', '');
            $grade = web::post('grade', '');
            $content= web::post('content', '');
            $unit = web::post('unit', '');

            if ($class == '') {
                $msg['uid'] = '请输入班级号';
            }


            if ($grade == '') {
                $msg['dept'] = '请输入年级号';
            }

            if (empty($msg)) {
                $data = array(
                    'class' => $class,
                    'grade' => $grade,
                    'content' => $content,
                    'unit' => $unit
                );

                if ($id == 0) {
                    $error = '参数错误';
                } else if (db::update('t_school', $data, '`id`=\'' . $id . '\'')) {
                    $success = true;
                    $error = '';
                } else {
                    $error = '保存失败，请重试';
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
                'class' => $class,
                'grade' => $grade,
                'content' => $content,
                'unit' => $unit
            ),
            'types' => $types));
    }

    public static function gradelist()
    {
        $list = db::query_get('select `grade`, `id` from `t_grade` order by `id` asc');
        web::layout('/admin/views/layout/admin');
        web::render('/guiding/views/gradelist',array(
            'list'=>$list,
        ));
    }

    public static function gradedel()
    {
        $id = intval(web::post('id', 0));
        $res = array(
            'status' => 1,
            'msg' => '',
            'id' => 0
        );

        if (db::delete('t_grade', '`id`=\'' . $id . '\'')) {
            $res['status'] = 0;
            $res['id'] = $id;
        } else {
            $res['msg'] = '删除失败';
        }
        echo json_encode($res);
    }

    public static function classdel()
    {
        $id = intval(web::post('id', 0));
        $res = array(
            'status' => 1,
            'msg' => '',
            'id' => 0
        );

        if (db::delete('t_school', '`id`=\'' . $id . '\'')) {
            $res['status'] = 0;
            $res['id'] = $id;
        } else {
            $res['msg'] = '删除失败';
        }
        echo json_encode($res);
    }


    public static function gradeadd()
    {
        $grade = '';
        $content = '';
        $unit = '';
        $success ='';
        $error = '';
        $msg = array();
        $types = array();

        if (!empty($_POST))
        {
            $grade = intval(web::post('grade', 0));
            $unit = web::post('unit', '');
            $content = web::post('content', '');

            $types_data = db::query_get('select `grade`, `id`from `t_grade` where `grade`!=\'\'');

            foreach ($types_data as $v) {
                $types[$v['id']] = $v['grade'];

                if ($grade == '')
                {
                    $msg['deptid'] = '请输入年级号';
                } else if($v['grade'] == $grade)
                {
                    $msg['grade'] = '此年级序号已存在！';
                }

            }

            if (empty($msg)) {
                $data = array(
                    'grade' => $grade,
                    'unit' => $unit,
                    'content' => $content
                );

                if (db::insert('t_grade', $data)) {
                    $success = true;
                } else {
                    $error = '提交失败';
                }
            }
        }


        web::layout('/admin/views/layout/admin');
        web::render('/guiding/views/gradeadd', array(
            'success' => $success,
            'error' => $error,
            'msg' => $msg,
            'data' => array(
                'grade' => $grade,
                'unit' => $unit,
                'content' => $content
            )));
    }


    public static function persondel()
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



    public static function personedit()
    {
        $id = web::request('id','');
        $msg = array();
        $success = false;
        $error = '';
        $type = '';
        $dept = '';
        $right = '';
        $name = '';
        $uid = '';
        $types = array();
        $ftypes = array();

        $types_data = db::query_get('select `deptid`,`name` from `t_dept` where `name`!=\'\'');
        foreach ($types_data as $v) {
            $types[$v['deptid']] = $v['name'];
        }

        $ftypes_data = db::query_get('select `ruleid`,`name` from `t_family` where `name`!=\'\'');
        foreach ($ftypes_data as $v) {
            $ftypes[$v['ruleid']] = $v['name'];
        }

        if ($id>0)
        {
            $info = db::first('select `type`,`name`,`uid`,`dept`,`right`  from `t_user` where `id`=\''.$id.'\'');

            if (!empty($info))
            {
                $type = $info['type'];
                $name= $info['name'];
                $dept = $info['dept'];
                $uid = $info['uid'];
                $right = $info['right'];
            }else {
                $msg['title'] = '查询有误，请核实数据';
            }
        }else{
            $msg['title'] = '请求数据有误';
        }


        if (!empty($_POST))
        {
            $type = web::post('family', '');
            $uid = web::post('uid', '');
            $dept = web::post('dept', '');
            $right = web::post('right', '');
            $name = web::post('name', '');


            if ($uid == '') {
                $msg['uid'] = '请输入学号';
            }

            if ($name == '') {
                $msg['name'] = '请输入姓名';
            }

            if ($dept == '') {
                $msg['dept'] = '请输入部门';
            }

            if ($right == '') {
                $msg['right'] = '请输入权限';
            }


            if (empty($msg))
            {
                $data = array(
                    'type' => $type,
                    'dept' => $dept,
                    'uid' => $uid,
                    'right' => $right,
                    'name' => $name,
                );
                if ($id == 0)
                {
                    $error = '参数错误';
                }else if (db::update('t_user',$data,'`id`=\''.$id.'\'')) {
                    $success = true;
                    $error = '';
                }else {
                    $error = '保存失败，请重试';
                }
            }
        }

        web::layout('/admin/views/layout/admin');
        web::render('/guiding/views/personedit', array(
            'id' => $id,
            'success' => $success,
            'error' => $error,
            'msg' => $msg,
            'data' => array(
                'dept' => $dept,
                'family' => $type,
                'uid' => $uid,
                'name' => $name,
                'right' => $right
            ),
            'types' => $types,
            'ftypes' => $ftypes
        ));
    }


    public static function classadd()
    {
        $grade = '';
        $content = '';
        $unit = '';
        $class = '';
        $msg = array();
        $success = false;
        $error = '';
        $types = array();
        $where = '';

        $data = db::query_get('select `grade`, `id` from `t_grade` where `grade`!=\'\'');
        foreach ($data as $v) {
            $types[$v['id']] = $v['grade'];
        }


        if (!empty($_POST)) {
            $grade = web::post('grade', '');
            $class = web::post('class', '');
            $content = web::post('content', '');
            $unit = web::post('unit', '');

            if ($grade != '') {
                $where = ' where `grade`=\'' . $grade . '\'';
            }

            $types_data = db::query_get('select `class` from `t_school`' . $where);


            foreach ($types_data as $v) {

                if ($class == '') {
                    $msg['class'] = '请输入班级';
                } else if ($v['class'] == $class) {
                    $msg['class'] = '此班级编号已存在！';
                }

            }

            if (empty($msg)) {
                $data = array(
                    'class' => $class,
                    'grade' => $grade,
                    'content' => $content,
                    'unit' => $unit,
                );

                if (db::insert('t_school', $data)) {
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
                'class' => $class,
                'grade' => $grade,
                'content' => $content,
                'unit' => $unit,
            ),
            'types' => $types
        ));
    }
}
