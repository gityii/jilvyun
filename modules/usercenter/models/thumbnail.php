<?php
/**
 * Created by PhpStorm.
 * User: v_ransu
 * Date: 2017/11/17
 * Time: 9:55
 */
namespace app\usercenter\models;

class thumbnail
{

    public static function thumb($source_path, $save_path, $abbreviate_size)
    {
        //通过getimagesize()获取图像信息
        //该函数参数接收图片文件的路径，返回值为图像信息数组
        //在图像信息数组中，前两个数组元素保存了图片的宽度和高度
        list($width, $height) = getimagesize($source_path);
        //定义缩略图的最大宽度和最大高度（150*150）
        $maxwidth = $maxheight = $abbreviate_size;
        //等比例计算缩略图的宽和高
        if($width/$maxwidth > $height/$maxheight) {
            //宽度大于高度时，将宽度限制为最大宽度，然后计算高度值
            $newwidth = $maxwidth;
            $newheight = round($newwidth / $width * $height);
        }else{
            //高度大于宽度时，将高度限制为最大高度，然后计算宽度值
            $newheight = $maxheight;
            $newwidth = round($newheight / $height * $width);
        }
        //绘制缩略图的画布资源
        //下面的函数用于创建画布，参数为画布的宽度值和高度值
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        //从文件中读取出图像，创建为jpeg格式的图像资源
        $source = imagecreatefromjpeg($source_path);
        //将原图缩放填充到缩略图画布中
        // 参数 $thumb 表示目标图像
        // 参数 $source 表示原图像
        // 参数 0,0,0,0 分别表示目标点的x坐标和y坐标，源点的x坐标和y坐标
        // 参数 $newwidth 表示目标图像的宽
        // 参数 $newheight 表示目标图像的高
        // 参数 $width 表示原图像的宽
        // 参数 $height 表示原图像的高
        imagecopyresized($thumb,$source,0,0,0,0,$newwidth,$newheight,$width,$height);
        //将保存缩略图到指定目录（参数依次为图像资源、保存目录、输出质量0~100）
        imagejpeg($thumb, $save_path, 100);
    }

}