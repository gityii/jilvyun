<?php
/**
 * Created by PhpStorm.
 * User: v_ransu
 * Date: 2017/11/13
 * Time: 15:01
 */

namespace  base\controllers;

class page
{
    private static $page;
    private static $pages;
    private static $amount;
    private static $per;
    private static $start;
    private static $paras = array();

    public static function init($page, $amount, $per)
    {
        if ($page == 0) {
            $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        }
        if ($page < 1) {
            $page = 1;
        }
        $pages = ceil($amount / $per);
        if ($pages == 0) {
            $pages = 1;
        }
        if ($page > $pages) {
            $page = $pages;
        }
        self::$page = $page;
        self::$pages = $pages;
        self::$amount = $amount;
        self::$per = $per;
        $start = ($page - 1) * $per;
        self::$start = $start;
        return array(
            'page' => $page,
            'pages' => $pages,
            'start' => $start
        );
    }

    public static function html($url)
    {
        if (self::$pages < 2) {
            return '';
        }
        $url .= self::url() . 'page=';
        $return = '<div class="page-wrap f-tar"><div class="page-con"><span class="page-nav-area">';
        $return .= '<a href="' . (self::$page > 1 ? $url . (self::$page - 1) : 'javascript:;') . '" ><button class="glyphicon glyphicon-chevron-left"></button></a>';
        $return .= '<span class="page-num">' . self::$page . '/' . self::$pages . '</span>';
        $return .= '<a href="' . (self::$page < self::$pages ? $url . (self::$page + 1) : 'javascript:;') . '" ><button class="glyphicon glyphicon-chevron-right"></button></a>';
        $return .= '</span><span class="page-go-area"><input id="page_num" type="text"><button href="javascript:var page=document.getElementById(\'page_num\').value;window.location.href=\'' . $url . '\'+page;" class="btn-group btn-group-sm">跳转</button></span></div></div>';
        return $return;
    }

    public static function limitsql()
    {
        return ' LIMIT ' . self::$start . ',' . self::$per;
    }

    public static function para($data, $value = '')
    {
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                self::$paras[$k] = $v;
            }
        } elseif ($data != '') {
            self::$paras[$data] = $value;
        }
    }

    private static function url()
    {
        $return = '';
        foreach (self::$paras as $k => $v) {
            $return .= urlencode($k) . '=' . urlencode($v) . '&';
        }
        return $return;
    }

}