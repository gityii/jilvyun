<?php
/**
 * Created by PhpStorm.
 * User: v_ransu
 * Date: 2017/11/14
 * Time: 14:28
 */
namespace app\server\controllers;
use base\controllers\db;
use base\controllers\web;
use base\controllers\page;

class server
{
    public static function front()
    {
        web::render('server/views/index',array());
    }


    public static function guide()
    {
        $id = db::first('select `projectid` from ' . db::table('t_zwfw_project') . ' where `name`=\'指南\'');

        $intid = intval($id['projectid']);

        $count_data = db::first('select count(*) from ' . db::table('t_zwfw_detail') . ' where `projectid`=\'' . $intid . '\'');

        $count = $count_data['count(*)'];

        $info = db::query_get('select `title`,`titleid` from ' . db::table('t_zwfw_detail') . ' where `projectid`=\'' . $intid . '\'');

        web::render('server/views/guide', array(
            'list' => $info,
            'count' => $count
        ));
    }

    public static function guidedetail()
    {
        $id = intval(web::get('id'));

        $info = db::first('select `name`,`title`,`address`,`worktime`,`tel`,`lng`, `lat` from ' . db::table('t_zwfw_detail') . ' where `titleid`=\'' . $id . '\'');

        $info['address'] = str_replace("/", "、", $info['address']);

        web::render('server/views/guidedetail', array(
            'info' => $info
        ));
    }

    public static function backend()
    {
        $type = web::get('type');

        $where = '';

        if ($type != '')
        {
            $where = ' where `projectid`=\'' . $type . '\'';
        }

        $per = 10;

        $countdata = db::first('select count(*) from `t_zwfw_detail`' . $where);
        $count = $countdata['count(*)'];
        page::init(0, $count, $per);
        $list = db::query_get('select `projectid`,`name`,`titleid`,`title`,`address`,`worktime`,`tel`,`order`,`lng`, `lat`  from `t_zwfw_detail` ' . $where . ' order by `projectid` asc,`titleid` desc' . page::limitsql());

        $types = db::query_get('select `projectid`,`name` from `t_zwfw_project` where `name`!=\'\' order by `projectid` asc');

        web::layout('admin/views/layout/admin');
        web::render('server/views/list', array(
            'list' => $list,
            'types' => $types,
            'type' => $type
        ));
    }

    public static function add()
    {
        $ctype = web::request('ctype', '');
        $id = web::request('id', 0);
        $msg = array();
        $success = false;
        $error = '';
        $title = '';
        $order = '';
        $titleid = '';
        $name = '';
        $address = '';
        $tel = '';
        $lng = '';
        $lat = '';
        $worktime = '';
        $projectid = '1';
        $types = array();
        $types_data = db::query_get('select `projectid`,`name` from `t_zwfw_project` where `name`!=\'\'');
        foreach ($types_data as $v) {
            $types[$v['projectid']] = $v['name'];
        }

        if ($id > 0)
        {
            $info = db::first('select `projectid`,`name`,`titleid`,`title`,`address`,`worktime`,`tel`,`order`,`lng`, `lat`  from `t_zwfw_detail` where `order`=\'' . $id . '\'');
            if (!empty($info)) {
                $title = $info['title'];
                $order = $info['order'];
                $projectid = $info['projectid'];
                $titleid = $info['titleid'];
                $worktime = $info['worktime'];
                $tel = $info['tel'];
                $address = $info['address'];
                $lng = $info['lng'];
                $lat = $info['lat'];
                $name = $info['name'];
            }
        }

        if (!empty($_POST))
        {
            $title = web::post('title', '');
            $titleid = intval(web::post('titleid', ''));
            $worktime = web::post('worktime', '');
            $tel = web::post('tel', '');
            $address = web::post('address', '');
            $lng = web::post('lng', '');
            $lat = web::post('lat', '');
            $projectid = web::post('projectid', '');

            if ($title == '')
            {
                $msg['title'] = '请输入标题';
            } else {
                if (web::strlen($title) > 40)
                {
                    $msg['title'] = '长度不能超过40个汉字';
                }
            }

            if ($worktime == '')
            {
                $msg['worktime'] = '请输入内容';
            } else {
                if (web::strlen($title) > 40)
                {
                    $msg['worktime'] = '长度不能超过40个汉字';
                }
            }

            if (empty($msg))
            {
                $data = array(
                    'projectid' => $projectid,
                    'name' => $title,
                    'titleid' => $titleid,
                    'title' => $title,
                    'address' => $address,
                    'lng' => $lng,
                    'lat' => $lat,
                    'worktime' => $worktime,
                    'tel' => $tel
                );

                if ($id == 0)
                {
                    if (db::insert('t_zwfw_detail', $data))
                    {
                        $success = true;
                    } else {
                        $error = '提交失败，请重试';
                    }
                } else {
                    if (db::update('t_zwfw_detail', $data, '`order`=\'' . $id . '\''))
                    {
                        $success = true;
                        $error = '保存成功';
                    } else {
                        $error = '保存失败，请重试';
                    }
                }
            }
        }

        web::layout('admin/views/layout/admin');
        web::render('server/views/add', array(
            'id' => $id,
            'success' => $success,
            'error' => $error,
            'msg' => $msg,
            'data' => array(
                'title' => $title,
                'titleid' => $titleid,
                'order' => $order,
                'name' => $name,
                'address' => $address,
                'lng' => $lng,
                'lat' => $lat,
                'projectid' => $projectid,
                'tel' => $tel,
                'worktime' => $worktime
            ),
            'ctype' => $ctype,
            'types' => $types
        ));

    }


    public static function del()
    {
        $id = intval(web::post('id', 0));
        $res = array(
            'status' => 1,
            'msg' => '',
            'id' => 0
        );

        if (db::delete('t_zwfw_detail', '`order`=\'' . $id . '\''))
        {
            $res['status'] = 0;
            $res['id'] = $id;
        } else {
            $res['msg'] = '删除失败';
        }

        echo json_encode($res);
    }

    public static function serverlist()
    {
        $per = 10;
        $countdata = db::first('select count(*) from `t_zwfw_project`');
        $count = $countdata['count(*)'];
        page::init(0, $count, $per);
        $list = db::query_get('select `projectid`,`name`,`order` from `t_zwfw_project` order by `projectid` asc,`projectid` desc' . page::limitsql());
        web::layout('admin/views/layout/admin');
        web::render('server/views/serverlist', array(
            'list' => $list
        ));
    }


    public static function serveradd()
    {
        $ctype = web::request('ctype', '');
        $id = web::request('id', 0);
        $msg = array();
        $success = false;
        $error = '';
        $name = '';
        $projectid = '';

        if ($id > 0)
        {
            $info = db::first('select `name`,`projectid`,`order` from `t_zwfw_project` where `order`=\'' . $id . '\'');
            if (!empty($info))
            {
                $name = $info['name'];
                $projectid = $info['projectid'];
            } else {
                $id = 0;
            }
        }


        if (!empty($_POST))
        {
            $name = web::post('name', '');
            $projectid = intval(web::post('projectid', 0));
            if ($name == '')
            {
                $msg['name'] = '请输入专题名称';
            } else {
                if (web::strlen($name) > 480)
                {
                    $msg['name'] = '专题名称不能超过240个汉字';
                }
            }

            if (empty($msg))
            {
                $data = array(
                    'name' => $name,
                    'projectid' => $projectid
                );

                if ($id == 0)
                {
                    if (db::insert('t_zwfw_project', $data))
                    {
                        $success = true;
                    } else {
                        $error = '提交失败，请重试';
                    }
                } else {
                    if (db::update('t_zwfw_project', $data, '`projectid`=\'' . $projectid . '\''))
                    {
                        $error = '保存成功';
                    } else {
                        $error = '保存失败，请重试';
                    }
                }
            }
        }

        web::layout('admin/views/layout/admin');
        web::render('server/views/serveradd', array(
            'id' => $id,
            'success' => $success,
            'error' => $error,
            'msg' => $msg,
            'data' => array(
                'name' => $name,
                'projectid' => $projectid
            )));
    }


    public static function serverdel()
    {
        $id = intval(web::post('id', 0));
        $res = array(
            'status' => 1,
            'msg' => '',
            'id' => 0
        );

        if (db::delete('t_zwfw_project', '`order`=\'' . $id . '\''))
        {
            $res['status'] = 0;
            $res['id'] = $id;
        } else {
            $res['msg'] = '删除失败';
        }
        echo json_encode($res);
    }


}