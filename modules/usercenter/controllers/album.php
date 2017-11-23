<?php
namespace app\usercenter\controllers;
use base\controllers\web;

class album
{

    public static function albumcreate()
    {
        //判断用户是否登录
        //require './init.php';

        //假设当前已登录的用户ID为1
        $user_id = 1;
        //定义当前用户相册的顶级目录
        $album_path = __ROOT__ . "/static/uploads/album-$user_id";
        //如果不存在则创建目录
        is_dir($album_path) || mkdir($album_path, 0777, true);

        //判断是否请求子相册的路径
        if (isset($_GET['path'])) {
            //获取用户请求的路径（过滤字符串两端的斜线、点等特殊字符）
            //  trim()函数第2个参数是要过滤掉的每个字符
            //  在单引号字符串中，注意书写“\”时应在前面加一个“\”进行转义
            $path = trim($_GET['path'], '/\\.');
            //通过正则表达式，限制输入路径只允许字母、数字、下划线、斜线
            //  preg_match()函数第1个参数表示正则表达式，第2个参数表示待匹配的字符串
            //  在正则表达式中，“/^  $/”表示按照指定规则匹配字符串的开始与结束
            //  “\w”表示匹配一个字母、数字、下划线字符
            //  “\/”表示匹配斜线“/”字符，因为“/”在正则表达式中有特殊含义，因此使用“\”进行转义
            //  “[\w\/]*”表示匹配符合“字母、数字、下划线、斜线”这个范围内的字符零次或多次
            //  preg_match()函数返回匹配次数，如果返回0，表示没有匹配。
            preg_match('/^[\w\/]*$/', $path) || exit('路径只允许字母、数字、下划线、斜线');
            //将相册目录与请求目录拼接
            $path = $path ? "$album_path/$path" : $album_path;
            //判断路径是否合法
            is_dir($path) || exit('您访问的相册不存在！');
        } else {
            //默认使用相册目录作为请求目录
            $path = $album_path;
        }

        //实现相册创建
        if (isset($_POST['dir_name'])) {
            $dir_name = $_POST['dir_name'];
            //对相册名进行正则表达式匹配
            // “\w+”表示匹配符合“字母、数字、下划线”范围内的字符一次或多次
            preg_match('/^\w+$/', $dir_name) || exit('相册名只允许字母、数字、下划线');
            $target_path = "$path/$dir_name"; //拼接目标路径
            if (!file_exists($target_path)) {
                mkdir($target_path, 0777); //如果文件不存在，创建目录
            }
        }

        //判断是否有文件上传
        if (isset($_FILES['file_name'])) {
            $pic = $_FILES['file_name'];
            //判断是否上传成功，如果失败则提示错误信息
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
            //判断是否为允许的图片格式
            $type = strrchr($pic['name'], '.');
            if (($type !== '.jpg') || ($pic['type'] !== 'image/jpeg')) {
                exit('图像类型不符合要求，只支持jpg类型的图片');
            }
            //为上传文件重新生成文件名
            $save_name = md5(uniqid(rand())) . '.jpg';
            //拼接文件保存路径
            $save_path = "$path/$save_name";
            if (!move_uploaded_file($pic['tmp_name'], $save_path)) {
                exit('上传图片保存失败。');
            }
        }

        //获取文件列表
        $folderlist = array();  //保存目录列表
        $filelist = array();    //保存文件列表
        $album_path_len = strlen($album_path) + 1; //获取顶级相册路径长度
        //解析目录
        foreach (glob($path . '/*') as $v) {
            if (is_dir($v)) {
                //取出目录列表，并去掉前面的相册路径
                $folderlist[] = substr($v, $album_path_len);
            } elseif (is_file($v)) {
                //取出文件列表
                $filelist[] = $v;
            }
        }
        //去除前面的相册路径
        $path = substr($path, $album_path_len);

        //载入HTML模板文件
        web::layout('usercenter/views/layout/header');
        web::render('usercenter/views/albumfile', array(
            'path' => $path,
            'folderlist' => $folderlist,
            'filelist' => $filelist
        ));

    }

}