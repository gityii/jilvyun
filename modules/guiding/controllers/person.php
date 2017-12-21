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

class person
{


    public static function person()
    {
        $type = '';
        $where1 = '';
        $where2 = '';
        if ($type != '') {
            $where1 = ' where `type`=\'' . $type . '\'';
            $where2 = ' where l.`type`=\'' . $type . '\'';
        }
        $per = 20;
        $countdata = db::first('select count(*) from `t_user`');
        $articlecount = $countdata['count(*)'];
        page::init(0, $articlecount, $per);
        $list = db::query_get('select * from `t_user`');
        $types = db::query_get('select `typeid`,`name` from `t_articlec_type` where `name`!=\'\' order by `order` asc');
        web::layout('admin/views/layout/admin');
        web::render('guiding/views/person', array(
            'list' => $list,
            'types' => $types,
            'type' => $type
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

                if (db::insert('t_family', $data)) {
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


    public static function deptlist()
    {
        $per = 10;
        $countdata = db::first('select count(*) from `t_dept`');
        $count = $countdata['count(*)'];
        page::init(0,$count,$per);
        $list = db::query_get('select `deptid`,`name`, `id` from `t_dept` where `name`!=\'\' order by `id` desc'.page::limitsql());
        web::layout('/admin/views/layout/admin');
        web::render('/guiding/views/deptlist',array(
            'list'=>$list,
        ));
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


    public static function personadd()
    {
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


        if (!empty($_POST)) {
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


                if (db::insert('t_user', $data)) {
                    $success = true;
                } else {
                    $error = '提交失败';
                }
            }
        }

        web::layout('/admin/views/layout/admin');
        web::render('/guiding/views/personadd', array(
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

}
