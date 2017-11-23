<?php
namespace app\qr\controllers;
use base\controllers\db;
use base\controllers\page;
use base\controllers\web;

class qr{

    public static function display()
    {

        $per = 50;
        $countdata = db::first('select count(*) from `t_org`');
        $articlecount = $countdata['count(*)'];
        page::init(0, $articlecount, $per);
        $list = db::query_get('select `orgid`,`orgname`,`viewcount` from `t_org`' . page::limitsql());

       web::layout('admin/views/layout/admin');
        web::render('qr/views/index', array(
            'list' => $list,
        ));
    }

    /*数据验证应该放在models里面，以后要改*/
    public static function add()
    {
        $id = web::request('id',0);
        $msg = array();
        $success = false;
        $error = '';
        $orgname = '';
        if ($id>0)
        {
            $info = db::first('select `orgname` from `t_org` where `orgid`=\''.$id.'\'');
            if (!empty($info)){
                $orgname = $info['orgname'];
            }else {
                $id = 0;
            }
        }

        if (!empty($_POST))
        {
            $orgname = web::post('orgname','');
            if ($orgname=='')
            {
                $msg['orgname'] = '请输入推广名称';
            }else
            {
                if (web::strlen($orgname)>48)
                {
                    $msg['orgname'] = '推广名称不能超过24个汉字';
                }
            }

            if (empty($msg))
            {
                $data = array(
                    'orgname'=>$orgname
                );

                if ($id==0)
                {
                    if (db::insert('t_org',$data))
                    {
                        $success = true;
                    }else
                    {
                        $error = '提交失败，请重试';
                    }
                }else
                {
                    if (db::update('t_org',$data,'`orgid`=\''.$id.'\''))
                    {
                        $error = '保存成功';
                    }else
                    {
                        $error = '保存失败，请重试';
                    }
                }
            }
        }

        web::layout('admin/views/layout/admin');
        web::render('qr/views/add',array(
            'id'=>$id,
            'success'=>$success,
            'error'=>$error,
            'msg'=>$msg,
            'data'=>array(
                'orgname'=>$orgname
            )
        ));

    }

    public static function del()
    {
        $id = intval(web::post('id',0));
        $res = array(
            'status'=>1,
            'msg'=>'',
            'id'=>0
        );
        if (db::delete('t_org','`orgid`=\''.$id.'\'')){
            $res['status'] = 0;
            $res['id'] = $id;
        }else {
            $res['msg'] = '删除失败';
        }
        echo json_encode($res);
    }

}