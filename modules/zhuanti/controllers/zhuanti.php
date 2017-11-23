<?php
/**
 * Created by PhpStorm.
 * User: v_ransu
 * Date: 2017/11/14
 * Time: 9:36
 */
namespace app\zhuanti\controllers;
use base\controllers\db;
use base\controllers\web;
use base\controllers\page;
use base\controllers\file;
class zhuanti{

    public static function del()
    {
        $id = intval(web::post('id', 0));
        $res = array(
            'status' => 1,
            'msg' => '',
            'id' => 0
        );

        if (db::delete('t_articlec', '`articleid`=\'' . $id . '\''))
        {
            $res['status'] = 0;
            $res['id'] = $id;
        }else{
            $res['msg'] = '删除失败';
        }
        echo json_encode($res);
    }


    public static function typedel()
    {
        $id = intval(web::post('id',0));
        $res = array(
            'status'=>1,
            'msg'=>'',
            'id'=>0
        );

        if (db::delete('t_articlec_type','`typeid`=\''.$id.'\''))
        {
            $res['status'] = 0;
            $res['id'] = $id;
        }else {
            $res['msg'] = '删除失败';
        }

        echo json_encode($res);
    }



    public static function typeadd(){

        $ctype = web::request('ctype','');
        $id = web::request('id',0);
        $msg = array();
        $success = false;
        $error = '';
        $name = '';
        $order = '';
        $desc = '';
        $nimg = '';

        if ($id>0)
        {
            $info = db::first('select `name`,`img`,`desc`,`order` from `t_articlec_type` where `typeid`=\''.$id.'\'');
            if (!empty($info)){
                $name = $info['name'];
                $nimg = $info['img'];
                $desc = $info['desc'];
                $order = $info['order'];
            }else {
                $id = 0;
            }
        }

        if (!empty($_POST))
        {
            $name = web::post('name','');
            $order = intval(web::post('order',0));
            $desc = web::post('desc','');
            if ($name=='')
            {
                $msg['name'] = '请输入专题名称';
            }else {
                if (web::strlen($name)>480)
                {
                    $msg['name'] = '专题名称不能超过240个汉字';
                }
            }


            if ($desc=='')
            {
                $msg['desc'] = '请输入专题描述';
            }else {
                if (web::strlen($desc)>800)
                {
                    $msg['desc'] = '专题描述不能超过400个汉字';
                }
            }

            $img = file::upload('img','',2048);

            if (!is_string($img) && $img!=100)
            {
                $msg['img'] = '图片上传失败';
            }

            if (empty($msg))
            {
                $data = array(
                    'name'=>$name,
                    'desc'=>$desc,
                    'order'=>$order
                );
                if (is_string($img))
                {
                    $data['img'] = '/'.$img;
                    $nimg = '/'.$img;
                }
                if ($id==0)
                {
                    if (db::insert('t_articlec_type',$data)){
                        $success = true;
                    }else {
                        $error = '提交失败，请重试';
                    }
                }else {
                    if (db::update('t_articlec_type',$data,'`typeid`=\''.$id.'\''))
                    {
                        $error = '保存成功';
                    }else {
                        $error = '保存失败，请重试';
                    }
                }
            }
        }

        web::layout('admin/views/layout/admin');
        web::render('zhuanti/views/typeadd',array(
            'id'=>$id,
            'success'=>$success,
            'error'=>$error,
            'msg'=>$msg,
            'data'=>array(
                'name'=>$name,
                'order'=>$order,
                'desc'=>$desc,
                'img'=>$nimg
            )
        ));
    }


    public static function typelist()
    {
        $per = 20;
        $countdata = db::first('select count(*) from `t_articlec_type`');
        $articlecount = $countdata['count(*)'];
        page::init(0, $articlecount, $per);
        $list = db::query_get('select `typeid`,`name`,`order` from `t_articlec_type` order by `order` asc,`typeid` desc' . page::limitsql());
        web::layout('admin/views/layout/admin');
        web::render('zhuanti/views/typelist', array(
            'list' => $list
        ));
    }

    public static function front()
    {
        //$page = intval(web::post('page',2));
        // $per = 20;
        $count = db::count('t_articlec_type');
        $topics = db::query_get('select `typeid`,`name`,`img`,`desc` from `t_articlec_type` order by `order` asc,`typeid` desc limit 0,20');
        web::render('zhuanti/views/index',array(
            'topics' => $topics,
            'more' => $count > 20 ? true : false
        ));
    }

    public static function backend()
    {
        $type = web::get('type');
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
        web::render('zhuanti/views/list',array(
            'list'=>$list,
            'types'=>$types,
            'type'=>$type
        ));
    }


    public static function add()
    {
        $ctype = web::request('ctype','');
        $id = web::request('id',0);
        $msg = array();
        $success = false;
        $error = '';
        $title = '';
        $order = '';
        $from = '';
        $type = '1';
        $content = '';
        $url = '';
        $nimg = '';
        $types = array();
        $types_data = db::query_get('select `typeid`,`name` from `t_articlec_type` where `name`!=\'\'');

        foreach ($types_data as $v){
            $types[$v['typeid']] = $v['name'];
        }

        if ($id>0)
        {
            $info = db::first('select `title`,`type`,`img`,`from`,`content`,`order`,`url` from `t_articlec` where `articleid`=\''.$id.'\'');
            if (!empty($info))
            {
                $title = $info['title'];
                $nimg = $info['img'];
                $from = $info['from'];
                $content = $info['content'];
                $order = $info['order'];
                $type = $info['type'];
                $url = $info['url'];
                if ($url!='')
                {
                    $ctype = 'link';
                }
            }else {
                $id = 0;
            }
        }

        if (!empty($_POST))
        {
            $title = web::post('title','');
            $order = intval(web::post('order',0));
            $from = web::post('from','');
            $content = web::post('content','');
            $type = web::post('type','');
            $url = web::post('url','');
            if ($title=='')
            {
                $msg['title'] = '请输入标题';
            }else {
                if (web::strlen($title)>240)
                {
                    $msg['title'] = '标题不能超过120个汉字';
                }
            }

            if (web::strlen($from)>80)
            {
                $msg['from'] = '来源不能超过40个汉字';
            }

            if ($ctype=='link')
            {
                if ($url=='')
                {
                    $msg['url'] = '请输入链接地址';
                }else {
                    if (web::strlen($url)>1200)
                    {
                        $msg['url'] = '链接地址太长了';
                    }
                }
            }else {
                if ($content=='')
                {
                    $msg['content'] = '请输入内容';
                }else {
                    if (web::strlen($content)>100000)
                    {
                        $msg['content'] = '内容太长了';
                    }
                }
            }

            $img = file::upload('img','',2048);

            if (!is_string($img) && $img!=100)
            {
                $msg['img'] = '图片上传失败';
            }

            if (empty($msg))
            {
                $data = array(
                    'title'=>$title,
                    'type'=>$type,
                    'from'=>$from,
                    'content'=>$content,
                    'order'=>$order,
                    'url'=>$url,
                    'dateline'=>time(),
                );
                if (is_string($img))
                {
                    $data['img'] = '/'.$img;
                    $nimg = '/'.$img;
                }

                if ($id==0)
                {
                    if (db::insert('t_articlec',$data))
                    {
                        $success = true;
                    }else {
                        $error = '提交失败，请重试';
                    }
                }else {
                    if (db::update('t_articlec',$data,'`articleid`=\''.$id.'\''))
                    {
                        $success = true;
                        $error = '保存成功';
                    }else {
                        $error = '保存失败，请重试';
                    }
                }
            }
        }

        web::layout('admin/views/layout/admin');
        web::render('zhuanti/views/add',array(
            'id'=>$id,
            'success'=>$success,
            'error'=>$error,
            'msg'=>$msg,
            'data'=>array(
                'title'=>$title,
                'content'=>stripslashes($content),
                'order'=>$order,
                'from'=>$from,
                'img'=>$nimg,
                'type'=>$type,
                'url'=>$url
            ),
            'ctype'=>$ctype,
            'types'=>$types
        ));
    }

}