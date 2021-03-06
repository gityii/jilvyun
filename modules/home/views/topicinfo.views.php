<?php ob_start();?>
<!DOCTYPE html>
<html lang="zh-CN" style="height:100%;">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>纪律云首页面</title>

    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/highlight.js/8.5/styles/monokai_sublime.min.css">
    <link href="https://cdn.bootcss.com/magnific-popup.js/1.0.0/magnific-popup.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/static/assets/css/screen.css" />
    <link rel="stylesheet" href="/static/css/login.css" />
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
                        <li role="presentation"><?php
                            if(\base\controllers\web::session('user_name')==NULL)
                            {
                                echo <<<EOT
                                    <a href="/admin/admin/login">登录</a>
EOT;
                            }else{
                                echo '用户'."(".\base\controllers\web::session('user_name').")";
                            }
                            ?>
                        </li>
                        <li role="presentation"><a href="/admin/admin/logout">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<section class="content-wrap">
    <div class="container">
            <div>
                <h3 align="center"><?php echo $info['title'];?></h3>
            </div>
            <div>
                <h4 align="center"><?php echo date('Y-m-d',$info['date']);?></h4>
            </div>
            <div>
                <p align="center">
                <img src="<?php echo $info['img'];?>" >
                </p>
            </div>
            <div>
                <p><?php echo str_replace(array("\r\n","\r","\n"),'<br />',$info['content']);?></p>
            </div>
    </div>
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
