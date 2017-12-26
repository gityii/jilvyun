<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/24 0024
 * Time: 上午 9:04
 */
namespace app\home\controllers;
use base\controllers\web;
use base\controllers\db;
use base\controllers\page;
use base\controllers\file;
class home
{
    public static function homepage()
    {

        $per = 10;
        $countdata = db::first('select count(*) from `t_notice`');
        $recordcount = $countdata['count(*)'];
        page::init(0,$recordcount,$per);
        $list = db::query_get('select * from `t_notice` order by `date` desc'.page::limitsql());

        $view = db::query_get('select * from `t_carousel` order by `date` desc limit 3');

        web::render('home/views/home',array(
            'list'=> $list,
            'view0'=> $view[0],
            'view1'=> $view[1],
            'view2'=> $view[2]
        ));

    }

    public static function carouseladd()
    {
        $msg = array();
        $success = false;
        $error = '';
        $title = '';
        $content = '';
        $nimg = '';

        if (!empty($_POST))
        {
            $title = web::post('title','');
            $content = web::post('content','');

            if ($title=='')
            {
                $msg['title'] = '请输入标题';
            }else {
                if (web::strlen($title)>240){
                    $msg['title'] = '标题不能超过120个汉字';
                }
            }

            if ($content=='')
            {
                    $msg['content'] = '请输入内容';
                }else {
                    if (web::strlen($content)>10000){
                        $msg['content'] = '内容太长';
                    }
             }


            $img = file::upload('img','',2048);

            if (!is_string($img) && $img!=100)
            {
                $msg['img'] = '图片上传失败';
            }

            if (empty($msg)){
                $data = array(
                    'title'=>$title,
                    'content'=>$content,
                    'date'=>time(),
                );
                if (is_string($img)){
                    $data['img'] = '/'.$img;
                    $nimg = '/'.$img;
                }

                    if (db::insert('t_carousel',$data)){
                        $success = true;
                    }else {
                        $error = '提交失败，请重试';
                    }
                }
            }

        web::layout('/admin/views/layout/admin');
        web::render('home/views/carouseladd',array(
            'success'=>$success,
            'error'=>$error,
            'msg'=>$msg,
            'data'=>array(
                'title'=>$title,
                'content'=>stripslashes($content),
                'img'=>$nimg,
            ),
        ));
    }


    public static function carousedit()
    {
        $title = '';
        $content = '';
        $success ='';
        $error = '';
        $msg = array();
        $nimg = '';
        $id = web::request('id','');

        $info = db::first('select `title`,`content` from `t_carousel` where `id`=\''.$id.'\'');

        if (!empty($info))
        {
            $title = $info['title'];
            $content= $info['content'];
        }else {
            $msg['title'] = '查询有误，请核实数据';
        }

        if (!empty($_POST))
        {
            $title = web::post('title','');
            $content = web::post('content','');

            if ($title=='')
            {
                $msg['title'] = '请输入标题';
            }else {
                if (web::strlen($title)>240){
                    $msg['title'] = '标题不能超过120个汉字';
                }
            }

            if ($content=='')
            {
                $msg['content'] = '请输入内容';
            }else {
                if (web::strlen($content)>10000){
                    $msg['content'] = '内容太长';
                }
            }


            $img = file::upload('img','',2048);

            if (!is_string($img) && $img!=100)
            {
                $msg['img'] = '图片上传失败';
            }

            if (empty($msg)){
                $data = array(
                    'title'=>$title,
                    'content'=>$content,
                    'date'=>time(),
                );
                if (is_string($img)){
                    $data['img'] = '/'.$img;
                    $nimg = '/'.$img;
                }

                if (db::update('t_carousel',$data,'`id`=\''.$id.'\'')) {
                    $success = true;
                }else {
                    $error = '提交失败';
                }
            }
        }

        web::layout('/admin/views/layout/admin');
        web::render('home/views/carousedit',array(
            'id' => $id,
            'success'=>$success,
            'error'=>$error,
            'msg'=>$msg,
            'data'=>array(
                'title'=>$title,
                'content'=>stripslashes($content),
                'img'=>$nimg,
            ),
        ));
    }

    public static function carousel()
    {
        $per = 10;
        $countdata = db::first('select count(*) from `t_carousel`');
        $recordcount = $countdata['count(*)'];
        page::init(0,$recordcount,$per);
        $list = db::query_get('select * from `t_carousel` order by `date` desc'.page::limitsql());

        web::layout('admin/views/layout/admin');
        web::render('home/views/carousel',array(
            'list'=>$list,
        ));
    }

    public static function carousdel()
    {
        $id = intval(web::post('id', 0));
        $res = array(
            'status' => 1,
            'msg' => '',
            'id' => 0
        );

        if (db::delete('t_carousel', '`id`=\'' . $id . '\'')) {
            $res['status'] = 0;
            $res['id'] = $id;
        } else {
            $res['msg'] = '删除失败';
        }
        echo json_encode($res);
    }


    public static function carousinfo()
    {
        $id = web::request('id','');

        $info = db::first('select * from `t_carousel` where `id`=\''.$id.'\'');

        web::render('home/views/carousinfo',array(
            'info'=>$info
        ));

    }



    public static function info()
    {
        $per = 10;
        $countdata = db::first('select count(*) from `t_notice`');
        $recordcount = $countdata['count(*)'];
        page::init(0,$recordcount,$per);

        $id = web::request('id','');

        $info = db::first('select `title`,`content` from `t_notice` where `id`=\''.$id.'\'');

        $list = db::query_get('select * from `t_notice` order by `date` desc'.page::limitsql());

        web::render('home/views/info',array(
            'list'=>$list,
            'info'=>$info
        ));

    }



    public static function noticeadd()
    {
        $title = '';
        $content = '';
        $success ='';
        $error = '';
        $msg = array();

        if (!empty($_POST))
        {
            $title = web::post('title', '');
            $content = web::post('content', '');

            if ($title == '')
            {
                $msg['title'] = '请输入标题';
            }

            if($content == '')
            {
                $msg['content'] = '请输入内容';
            }else {
                if (web::strlen($content)>10000)
                {
                    $msg['content'] = '内容太长';
                }
            }

            if (empty($msg)) {
                $data = array(
                    'title' => $title,
                    'content' => $content,
                    'date'=>time(),
                );

                if (db::insert('t_notice', $data)) {
                    $success = true;
                } else {
                    $error = '提交失败';
                }
            }
        }

        web::layout('/admin/views/layout/admin');
        web::render('/home/views/noticeadd', array(
            'success' => $success,
            'error' => $error,
            'msg' => $msg,
            'data' => array(
                'content' => stripslashes($content),
                'title' => $title,
            ),
        ));
    }


    public static function topic()
    {
        $ruleid = web::get('id');
        $where = '';
        if ($ruleid!='')
        {
            $where = ' where `ruleid`=\''.$ruleid.'\'';
        }
        $per = 10;
        $countdata = db::first('select count(*) from `t_topic`'.$where);
        $recordcount = $countdata['count(*)'];
        page::init(0,$recordcount,$per);
        $list = db::query_get('select * from `t_topic`'.$where.' order by `time` desc'.page::limitsql());

        web::layout('admin/views/layout/admin');
        web::render('home/views/topic',array(
            'list'=>$list
        ));
    }


    public static function notice()
    {
        $per = 10;
        $countdata = db::first('select count(*) from `t_notice`');
        $recordcount = $countdata['count(*)'];
        page::init(0,$recordcount,$per);
        $list = db::query_get('select * from `t_notice` order by `date` desc'.page::limitsql());

        web::layout('admin/views/layout/admin');
        web::render('home/views/notice',array(
            'list'=>$list,
        ));

    }



    public static function notedel()
    {
        $id = intval(web::post('id', 0));
        $res = array(
            'status' => 1,
            'msg' => '',
            'id' => 0
        );

        if (db::delete('t_notice', '`id`=\'' . $id . '\'')) {
            $res['status'] = 0;
            $res['id'] = $id;
        } else {
            $res['msg'] = '删除失败';
        }
        echo json_encode($res);
    }



    public static function noticeedit()
    {
        $title = '';
        $content = '';
        $success ='';
        $error = '';
        $msg = array();

        $id = web::request('id','');

        $info = db::first('select `title`,`content` from `t_notice` where `id`=\''.$id.'\'');

        if (!empty($info))
        {
            $title = $info['title'];
            $content= $info['content'];
        }else {
            $msg['title'] = '查询有误，请核实数据';
        }

        if (!empty($_POST))
        {
            $title = web::post('title', '');
            $content = web::post('content', '');

            if (web::strlen($content)>10000)
            {
                $msg['content'] = '内容太长';
            }

            if (empty($msg))
            {
                $data = array(
                    'title' => $title,
                    'content' => $content
                );

                if (db::update('t_notice',$data,'`id`=\''.$id.'\'')) {
                    $success = true;
                }else {
                    $error = '提交失败';
                }
            }
        }

        web::layout('/admin/views/layout/admin');
        web::render('/home/views/noticeedit', array(
            'id' => $id,
            'success' => $success,
            'error' => $error,
            'msg' => $msg,
            'data' => array(
                'title' => $title,
                'content' => $content
            ),
        ));
    }


    public static function link()
    {

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