<?php
/**
 * Created by PhpStorm.
 * User: v_ransu
 * Date: 2018/1/8
 * Time: 16:08
 */
namespace app\display\controllers;

use base\controllers\db;
use base\controllers\web;
use base\controllers\page;
use base\controllers\file;

class display
{


    public static function jiliangrade()
    {

        $postgrade = '';
        $chtml = '';
        $ghtml = '';

        $grade = db::query_get('select `grade` from `t_grade`');

        foreach ($grade as $v) {
            $ghtml .= '<option value="' . $v['grade'] . '">' . $v['grade'] . '</option>';
        }

        if(!empty($_POST['grade']))
        {
            $postgrade = web::post('grade', '');
            $postclass = db::query_get('select `class` from `t_school` where `grade`='.$postgrade.'');

            foreach ($postclass as $v) {
                $chtml .= '<option value="' . $v['class'] . '">' . $v['class'] . '</option>';
            }
        }

        if($postgrade==0)
        {
            $html = '<div class="grade form-group">
                     <label for="">年级： </label> 
                     <div class="form-group">
                     <select name="nianji" id="grade" class="form-control"><option value="">请选择</option>' . $ghtml . '</select>
                     </div><div></div></div>';
        }else{
            $html = '<div class="class form-group">
                     <label style="margin-left:10px;" for=""> 班级： </label>
                     <div class="form-group">
                     <select name="banji" class="form-control"><option value="">请选择</option>' . $chtml . '</select>
                     </div></div>';
        }

        //输出下拉菜单
        echo($html);

    }


    public static function query()
    {
        $nianji = '';
        $banji = '';
        $per = 2;

        if((!empty($_POST['banji'])) && (!empty($_POST['nianji']))){
            $banji = web::post('banji', '');
            $nianji = web::post('nianji', '');
            $grade = ' where `grade`=\''.$nianji.'\' ';
            $countdata = db::first('select count(*) from `t_group`'. $grade . 'and `class`=\''.$banji.'\' order by `date` asc');
            $count = $countdata['count(*)'];
            page::init(0,$count,$per);
            $list = db::query_get('select * from `t_group`' . $grade . 'and `class`=\''.$banji.'\' order by `date` asc'.page::limitsql());
        }else if(!empty($_POST['nianji'])){
            $nianji = web::post('nianji', '');
            $grade = ' where `grade`=\''.$nianji.'\' ';
            $countdata = db::first('select count(*) from `t_group`'. $grade . ' order by `date` asc');
            $count = $countdata['count(*)'];
            page::init(0,$count,$per);
            $list = db::query_get('select * from `t_group`' . $grade . ' order by `date` asc'.page::limitsql());
        }else{
            $countdata = db::first('select count(*) from `t_group`');
            $count = $countdata['count(*)'];
            page::init(0,$count,$per);
            $list = db::query_get('select * from `t_group` order by `date` asc'.page::limitsql());
        }

        web::layout('admin/views/layout/admin');
        web::render('display/views/query', array(
            'list' => $list
        ));
    }


    public static function jiti()
    {

        $msg = array();
        $success = false;
        $error = '';

        web::layout('/admin/views/layout/admin');
        web::render('/display/views/jiti', array(
            'success' => $success,
            'error' => $error,
            'msg' => $msg
        ));
    }

    public static function category()
    {

        $msg = array();
        $success = false;
        $error = '';

        $result = db::query_get('select `family`, count(`family`) as family_count from `t_group` group by `family`');

        echo json_encode($result);
    }

    public static function project()
    {

        $msg = array();
        $success = false;
        $error = '';

        $result = db::query_get('select `project`, count(`project`) as project_count from `t_group` group by `project`');


        echo json_encode($result);
    }



    public static function banjifenxi()
    {

        $grades = db::query_get('select `grade` from `t_grade`');
        web::layout('admin/views/layout/admin');
        web::render('display/views/banjifenxi',array(
            'grades'=>$grades
        ));
    }


    public static function banjitest()
    {

        $grades = db::query_get('select `grade` from `t_grade`');
         web::layout('admin/views/layout/admin');
        web::render('display/views/banjitest',array(
            'grades'=>$grades
        ));
    }


    public static function banji()
    {
        $grade = web::get('grade');
        $where = '';
        $result = array();

        if (!empty($grade))
        {
            $where = ' where `grade`=\''.$grade.'\' ';
        }else{
            $where = ' where `grade`=2 ';
        }
        $classes = db::query_get('select `class` from `t_school`'.$where);


        foreach ($classes as $k=>$v)
        {
            $result[$k] = db::query_get('select `family`, count(1) as counts from `t_group`' . $where . 'and `class`=\''.$v['class'].'\' group by `family`');

            $result[$k][] = $v['class'];

        }

        $count = count($result,COUNT_NORMAL);

        $alls[] = db::query_get('select DISTINCT `family` ,count(1) as counts from `t_group` group by `family`');

        if(!empty($result)){
            foreach ($alls as $k => $v) {
                $result[$count] = $v;
            }
        }

//测试用数据
//        $test = array(
//        [['family'=>"安全与环保", 'counts'=> "1"], ['family'=>"教室及公区卫生", 'counts'=>"2"], ['family'=> "跑操", 'counts'=> "1"],"1"],
//        [['family'=>"教室及公区卫生", 'counts'=>"1"], ['family'=> "跑操", 'counts'=> "1"],"2"],
//        [['family'=>"安全与环保", 'counts'=> "1"], ['family'=>"教室及公区卫生", 'counts'=>"3"], ['family'=> "跑操", 'counts'=> "2"]]
//        );

        echo json_encode($result);
    }


    /*调试用代码*/
    public static function test()
    {
        $seriesdata = array(
        [['project'=>'包租费', 'count'=> 20], ['project'=>'装修费','count'=> 10], ['project'=>'保洁费', 'count'=> 1], ['project'=>'物业费','count'=> 7],'新虹桥'],
        [['project'=>'包租费', 'count'=> 25], ['project'=>'装修费', 'count'=> 7], ['project'=>'保洁费', 'count'=> 7], ['project'=>'物业费','count'=> 30],'中山公园'],
        [['project'=>'包租费', 'count'=> 41], ['project'=>'装修费', 'count'=> 9], ['project'=>'保洁费', 'count'=> 31], ['project'=>'物业费', 'count'=> 20],'虹桥'],
        [['project'=>'包租费', 'count'=> 15], ['project'=>'装修费', 'count'=> 45], ['project'=>'保洁费', 'count'=> 21], ['project'=>'物业费', 'count'=> 10],'镇宁路'],
        [['project'=>'包租费', 'count'=> 20], ['project'=>'装修费', 'count'=> 5], ['project'=>'保洁费', 'count'=> 15],['project'=>'物业费', 'count'=> 0], '天山古北'],
        [['project'=>'包租费', 'count'=> 100], ['project'=>'装修费', 'count'=> 100], ['project'=>'保洁费', 'count'=> 100], ['project'=>'物业费', 'count'=> 100]]
        );
        echo json_encode($seriesdata);
    }
}
