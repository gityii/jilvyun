<?php
namespace app\usercenter\controllers;
use base\controllers\web;
class user
{
    public static function userinfo()
    {
        header('content-type:text/html;charset=utf-8');
        //判断用户是否登录
       // init::loginsession();

        //假设当前已登录的用户ID为1
        $user_id = 1;
        $success = false;
        //定义储存用户数据的文件路径
        $file_path = "$user_id.txt";

        //定义 血型 的可选值
        $blood = array('未知', 'A', 'B', 'O', 'AB', '其它');
        //定义 爱好 的可选值
        $hobby = array('跑步', '游泳', '唱歌', '登山', '旅游', '看电影', '读书');

        //先判断是否有表单提交
        if (!empty($_POST)) {
            //有表单提交时，接收表单数据并输出
            //echo '姓名：'.$_POST['name'],
            //	 '<br>性别：'.$_POST['gender'],
            //	 '<br>血型：'.$_POST['blood'],
            //	 '<br>爱好：'.implode('、',$_POST['hobby']),
            //	 '<br>个人简介：'.$_POST['description'],
            //exit;
            //定义需要接收的字段
            $fields = array('name', 'description', 'gender', 'blood', 'hobby', 'gender');
            //通过循环自动接收数据并进行处理
            $user_data = array();  //用于保存处理结果
            foreach ($fields as $v) {
                $user_data[$v] = isset($_POST[$v]) ? $_POST[$v] : '';
            }

            //转义可能存在的HTML特殊字符
            $user_data['name'] = htmlspecialchars($user_data['name']);
            $user_data['description'] = htmlspecialchars($user_data['description']);
            //验证性别是否为合法值
            if ($user_data['gender'] != '男' && $user_data['gender'] != '女') {
                exit('保存失败，未选择性别。');
            }
            //验证血型是否为合法值
            if (!in_array($user_data['blood'], $blood)) {
                exit('保存失败，您选择的血型不在允许的范围内。');
            }
            //判断表单提交的“爱好”值是否为数组
            if (is_array($user_data['hobby'])) {
                //过滤掉不在预定义范围内的数据
                $user_data['hobby'] = array_intersect($hobby, $user_data['hobby']);
            } elseif (is_string($user_data['hobby'])) {
                $user_data['hobby'] = array($user_data['hobby']);
            }
            //验证完成，保存文件
            //将数组序列化为字符串
            $data = serialize($user_data);
            //将字符串保存到文件中
            file_put_contents($file_path, $data);
            //保存成功
            $success = true;
        }

//没有表单提交时继续执行原有程序

//判断文件是否存在
        if (is_file($file_path))
        {
            //文件存在，从文件中读取用户数据
            $user_data = file_get_contents($file_path);
            //反序列化字符串为数组
            $user_data = unserialize($user_data);
            //载入修改用户信息的页面文件
            //require "./userinfo_edit.html";
            web::layout('usercenter/views/layout/header');
            web::render('usercenter/views/useredit', array(
                'blood' => $blood,
                'hobby' => $hobby,
                'success' => $success,
                'user_data' => $user_data
            ));
        } else {
            //文件不存在，显示空白表单
            // require './userinfo.html';
            web::layout('usercenter/views/layout/header');
            web::render('usercenter/views/userinfo', array(
                'blood' => $blood,
                'hobby' => $hobby
            ));
        }

    }

    public static function showinfo()
    {

        //判断用户是否登录
        //init::loginsession();

        //假设当前已登录的用户ID为1
        $user_id = 1;
        //定义储存用户数据的文件路径
        $file_path = "$user_id.txt";
        $user_data = array();
        //判断文件是否存在
        if (is_file($file_path))
        {
            //从文件中取出用户数据
            $user_data = file_get_contents($file_path);
            //反序列化字符串为数组
            $user_data = unserialize($user_data);
            //将数组转换为顿号分隔的字符串
            $user_data['hobby'] = implode('、', $user_data['hobby']);
        }
        //载入修改用户信息的页面文件
        web::layout('usercenter/views/layout/header');
        web::render('usercenter/views/showinfo', array(
            'user_data' => $user_data,
        ));

    }

}