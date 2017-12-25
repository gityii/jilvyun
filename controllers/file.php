<?php
namespace  base\controllers;

class file{
	/*
	 * return :
	 * 100 请选择要上传的文件
	 * 101上传失败
	 * 102上传失败 目录不存在
	 * 103文件类型不符
	 * 104尺寸过大
	 * 105文件上传操作失败
	 * string 上传成功，返回文件路径
	 * */
	public static function upload($name,$types='',$size=0,$position=''){
        $msg = 0;
        if ($position==''){
        	$position = 'static/upload/images/'.date('Ymd',time());
        }
        $filename = '';
        if (isset($_FILES[$name]["name"]) && $_FILES[$name]["name"]!=''){
            if ($_FILES[$name]["error"] > 0){
                $msg = 101;
            }else {
            	$dir = __ROOT__.'/'.$position;
                if (!is_dir($dir) && !mkdir($dir,0755,true)){
                    $msg = 102;
                }
                $type_arr = explode('.',$_FILES[$name]["name"]);
                $type = $type_arr[count($type_arr)-1];
                if ($types!='' && !in_array(strtolower($type),explode(',',strtolower($types)))){
                    $msg = 103;
                }
                if ($msg=='' && $size>0){
                    $filesize = ceil($_FILES[$name]["size"]/1024);
                    if ($filesize>$size){
                        $msg = 104;
                    }
                }
                $filename = date('YmdHis',time()).rand(0,999).'.'.$type;
                if ($msg=='') {
                    if (!move_uploaded_file($_FILES[$name]["tmp_name"],$dir.'/'.$filename)){
                        $msg = 105;
                    }else {
                        $msg = $position.'/'.$filename;
                    }
                }
            }
        }else {
            $msg = 100;
        }
        return $msg;
	}
}