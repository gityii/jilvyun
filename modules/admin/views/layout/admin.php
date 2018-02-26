<?php ob_start();?>
<!DOCTYPE html>
<html lang="zh-CN" style="height:100%;">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>纪律云首页面</title>
<!--    <meta name="description" content="Ghost 是基于 Node.js 构建的开源博客平台。Ghost 具有易用的书写界面和体验，博客内容默认采用 Markdown 语法书写。Ghost 的目标是取代臃肿的 Wordpress。" />-->
<!--    <meta name="keywords" content="Ghost,blog,Ghost中国,Ghost博客,Ghost中文,Ghost中文文档">-->

    <meta name="HandheldFriendly" content="True" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="shortcut icon" href="/favicon.ico">

    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/highlight.js/8.5/styles/monokai_sublime.min.css">
    <link href="https://cdn.bootcss.com/magnific-popup.js/1.0.0/magnific-popup.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/static/assets/css/screen.css" />
    <link rel="stylesheet" href="/static/css/login.css" />
<!--    <link rel="canonical" href="http://www.ghostchina.com/" />-->
    <meta name="referrer" content="origin" />
    <link rel="next" href="http://www.ghostchina.com/page/2/" />
    <script type="text/javascript" src="/shared/ghost-url.min.js?v=77522159b3"></script>
    <script type="text/javascript">
        ghost.init({
            clientId: "ghost-frontend",
            clientSecret: "721352203d6a"
        });
    </script>
    <meta name="generator" content="Ghost 0.7" />
    <link rel="alternate" type="application/rss+xml" title="Ghost 开源博客平台" href="http://www.ghostchina.com/rss/" />

    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?6338835ad35c6d950a554fdedb598e48";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>

<style>

    .boxdiv{
        width:270px;
        height: 460px;
        margin: 10px;
        border:1px solid #ededed;

    }

    .box1{
        box-shadow: -10px 8px 6px #b4b4b4;
    }

    .box2{
        box-shadow: -10px 8px 6px #00C1B3;
    }

    .box3{
        box-shadow: -10px 8px 6px #00C;
    }

    .box4{
        box-shadow: -10px 8px 6px #059c;
    }

    p.fontsize{
        font-family:'幼圆';
        font-size:22px;
        text-align:center;
    }

    p.fontsize1{
        font-family:'幼圆';
        font-size:28px;
        text-align:center;
    }

    #left-sidebar {
        margin: 0 auto;
        padding: 20px;
    }

    .mark{
        background-color: inherit;
        color: white
    }


    #left-sidebar ul li{
        text-align:left;
        width:100%;
        height:40px;
        line-height:40px; 			/*设置行高*/
        font-size:20px;
        list-style:none;			 /*清除默认列表样式*/
        border-bottom:0px solid #ccc;			 /*边框为1px实线*/
    }

    #left-sidebar  h2{
        text-align:left;
        width:100%;
        height:40px;
        line-height:22px; 			/*设置行高*/
        font-size:21px;
        list-style:none;			 /*清除默认列表样式*/
        border-bottom:2px solid #ccc;			 /*边框为1px实线*/
    }

    #left-sidebar ul li a{
        color:#333;
        font-family:'微软雅黑';
        text-decoration:none;			/*清除超链接下划线*/
    }

</style>

<body class="home-template" style="min-height:100%;margin:0;padding:0;position:relative;">

<!-- start header -->
<header class="main-header"  style="background-image: url(http://static.ghostchina.com/image/6/d1/fcb3879e14429d75833a461572e64.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <!-- start logo -->
                <a class="branding" href="http://www.ghostchina.com" title="纪律云"><img src="http://static.ghostchina.com/image/b/46/4f5566c1f7bc28b3f7ac1fada8abe.png" align="left" alt="纪律云"></a>
                <!-- end logo -->
                <h2 class="text-hide">Ghost 是一个简洁、强大的写作平台。你只须专注于用文字表达你的想法就好，其余的事情就让 Ghost 来帮你处理吧。</h2>

                <img src="http://static.ghostchina.com/image/6/d1/fcb3879e14429d75833a461572e64.jpg" alt="Ghost 博客系统" class="hide">
            </div>
        </div>
    </div>
</header>
<!-- end header -->

<!-- start navigation -->
<nav class="main-navigation">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="navbar-header">
                        <span class="nav-toggle-button collapsed" data-toggle="collapse" data-target="#main-menu">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-bars"></i>
                        </span>
                </div>
                <div class="collapse navbar-collapse" id="main-menu">
                    <ul class="menu">
                        <li class="nav-current" role="presentation"><a href="/home/home/homepage">首页</a></li>
                        <li role="presentation"><a href="/admin/admin/control">控制台</a></li>
                        <li role="presentation"><a>用户(<?php echo \base\controllers\web::session('user_name');?>)</a></li>
                        <li role="presentation"><a href="/admin/admin/logout">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- end navigation -->
<section class="content-wrap" style="padding-bottom:100px;" >
<!--<div class="container-fluid">-->
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav">
                <!--
                <li class="active"><a>导 航 栏 <span class="sr-only"  style="background-color: #FF9966">(current)</span></a></li>
                -->
                <p class ="fontsize1" style="background-color: #FF9966">导 航 栏</p>
                <p></p>
                <li class="dropdown">
                    <p  class="dropdown-toggle fontsize" data-toggle="dropdown">
                        首 页 显 示
                        <b class="caret"></b>
                    </p>
                    <ul class="dropdown-menu  nav" style="width: 100%; text-align:center;font-size:22px;font-family:'幼圆';" >
                        <li><a  href="/home/home/carousel">轮播图设置</a></li>
                        <li><a  href="/home/home/topic">头 条 设 置</a></li>
                        <li><a  href="/home/home/notice">通 知 设 置</a></li>
                    </ul>

                </li>
                <li class="dropdown">
                    <p  class="dropdown-toggle fontsize" data-toggle="dropdown">
                        纪 律 规 定
                        <b class="caret"></b>
                    </p>
                    <ul class="dropdown-menu  nav" style="width: 100%; text-align:center;font-size:22px;font-family:'幼圆';" >
                        <li><a  href="/guiding/guiding/rule">规 则 设 置</a></li>
                        <li><a  href="/guiding/person/person">人 员 设 置</a></li>
                    </ul>

                </li>
                <p></p>
                <li class="dropdown">
                    <p  class="dropdown-toggle fontsize" data-toggle="dropdown">
                        检 查 录 入
                        <b class="caret"></b>
                    </p>
                    <ul class="dropdown-menu  nav" style="width: 100%; text-align:center;font-size:22px;font-family:'幼圆';" >
                        <li><a  href="">移 动 录 入</a></li>
                        <li><a  href="/record/record/pcrecord">网 页 录 入</a></li>
                        <li><a  href="">批 量 导 入</a></li>
                        <li><a  href="/display/display/query">记 录 查 询</a></li>
                        <li><a  href="">处 分 管 理</a></li>
                    </ul>

                </li>
                <p></p>
                <li class="dropdown">
                    <p  class="dropdown-toggle fontsize" data-toggle="dropdown">
                        评 比 分 析
                        <b class="caret"></b>
                    </p>
                    <ul class="dropdown-menu  nav" style="width: 100%; text-align:center;font-size:22px;font-family:'幼圆';" >
                        <li><a  href="">日 报 周 报</a></li>
                        <li><a  href="">文明班评比</a></li>
                        <li><a  href="/display/display/jiti">集体项分析</a></li>
                        <li><a  href="/display/display/banjifenxi">班 级 分 析</a></li>
                        <li><a  href="/display/display/geren">个人项分析</a></li>
                    </ul>

                </li>
            </ul>
        </div>
        <div  class="col-sm-9"><?php echo $layout_content;?></div>
    </div>
<!--</div>-->
</section>

<footer style="position:absolute;bottom:0;width:100%;height:82px;">
<div class="copyright">
    <div class="container" style="height: auto">
        <div class="row">
            <div class="col-sm-12">
                <span>Copyright &copy; <a href="http://www.ghostchina.com/">Ghost中文网</a></span> |
                <span><a href="http://www.miibeian.gov.cn/" target="_blank">京ICP备11008151号</a></span> |
                <span>京公网安备11010802014853</span>
            </div>
        </div>
    </div>
</div>
</footer>
<!--<a href="#" id="back-to-top"><i class="fa fa-angle-up"></i></a>-->

<script src="https://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/fitvids/1.1.0/jquery.fitvids.min.js"></script>
<script src="https://cdn.bootcss.com/highlight.js/8.5/highlight.min.js"></script>
<script src="https://cdn.bootcss.com/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js"></script>
<script src="/assets/js/main.js?v=77522159b3"></script>
<script>
    $(function(){
        $('.post-content img').each(function(item){
            var src = $(this).attr('src');

            $(this).wrap('<a href="' + src + '" class="mfp-zoom" style="display:block;"></a>');
        });

        /*$('.post-content').magnificPopup({
         delegate: 'a',
         type: 'image'
         });*/
    });
</script>
<!-- 通过JavaScript实现单击更换验证码 -->
<script>
    var captcha = document.getElementById("captcha");
    var change = document.getElementById("change");
    change.onclick = function(){
        captcha.src = "/verify/verify/randomcode?rand=" + Math.random(); //增加一个随机参数，防止图片缓存
        return false; //阻止超链接动作
    };
</script>
<script>
    window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>

<script>
    $(function(){
        var version = '0.7.4';
        var $download =  $('.download > a').first();
        var html = $download.html().replace(/\d\.\d\.\d/, version);

        $download.html(html);
    });
</script>

</body>
</html>