<?php
namespace app\usercenter\controllers;
use app\usercenter\models\thumbnail;
use base\controllers\web;

class photo
{

    public static function photoupload()
    {
        //判断用户是否登录
        // init::loginsession();

        //假设当前已登录的用户ID为1
        $user_id = 1;

        //根据用户id拼接头像文件保存路径
        $save_path = __ROOT__."/static/uploads/thumb_$user_id.jpg";

        //利用<pre>标签使输出的内容含有空格和换行
//        echo '<pre>';
//        print_r($_FILES); //输出获取的上传文件信息
//        exit('</pre>');

        //判断是否上传头像，pic就是表单上传文件的input标签的name属性值
        if (isset($_FILES['pic'])) {
            //获取用户上传文件信息
            $pic = $_FILES['pic'];
            //判断文件上传到临时文件时是否出错
            if ($pic['error'] > 0) {
                $error = '上传失败：';
                switch ($pic['error']) {
                    case 1:
                        $error .= '文件大小超过了服务器设置的限制！';
                        break;
                    case 2:
                        $error .= '文件大小超过了表单设置的限制！';
                        break;
                    case 3:
                        $error .= '文件只有部分被上传！';
                        break;
                    case 4:
                        $error .= '没有文件被上传！';
                        break;
                    case 6:
                        $error .= '上传文件临时目录不存在！';
                        break;
                    case 7:
                        $error .= '文件写入失败！';
                        break;
                    default:
                        $error .= '未知错误！';
                        break;
                }

                exit($error);  //显示错误信息并停止脚本
            }
        //-----------------------
        //上传成功，继续操作……
        //-----------------------
        //方式一：字符串截取上传文件的扩展名
            $type = strrchr($pic['name'], '.');
            if ($type !== '.jpg') {
                exit('图像类型不符合要求，只支持jpg类型的图片');
            }
        //方式二：通过文件的MIME信息进行判断
            if ($pic['type'] !== 'image/jpeg') {
                exit('图像类型不符合要求，只支持jpg类型的图片');
            }
        //-----------------------
        //符合上传格式要求，保存图片……
        //-----------------------
        //准备上传文件的保存路径，通过用户的id为头像命名
            $source_path = __ROOT__."/static/uploads/$user_id.jpg";
        //将上传文件从临时目录移动到项目目录
            if (!move_uploaded_file($pic['tmp_name'], $source_path)) {
                exit('上传文件保存失败！');
            }

        //-----------------------
        //保存成功，为头像生成缩略图……
        //-----------------------
            thumbnail::thumb($source_path, $save_path, 150);
        }

        //载入HTML模板文件
        web::layout('usercenter/views/layout/header');
        web::render('usercenter/views/photo', array(
            'user_id' => $user_id
        ));

    }


}