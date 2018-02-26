<?php ob_start();?>
<!DOCTYPE html>
<html lang="zh-CN" style="height:100%;">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>纪律云首页面</title>
    <!--    <meta name="description" content="Ghost 是基于 Node.js 构建的开源博客平台。Ghost 具有易用的书写界面和体验，博客内容默认采用 Markdown 语法书写。Ghost 的目标是取代臃肿的 Wordpress。" />-->
    <!--    <meta name="keywords" content="Ghost,blog,Ghost中国,Ghost博客,Ghost中文,Ghost中文文档">-->
    <!---->
    <!--    <meta name="HandheldFriendly" content="True" />-->
    <!--    <meta name="viewport" content="width=device-width, initial-scale=1.0" />-->
    <!---->
    <!--    <link rel="shortcut icon" href="/favicon.ico">-->

    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/highlight.js/8.5/styles/monokai_sublime.min.css">
    <link href="https://cdn.bootcss.com/magnific-popup.js/1.0.0/magnific-popup.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/static/assets/css/screen.css" />
    <link rel="stylesheet" href="/static/css/login.css" />
    <!--    <link rel="canonical" href="http://www.ghostchina.com/" />-->
    <!--    <meta name="referrer" content="origin" />-->
    <!--    <link rel="next" href="http://www.ghostchina.com/page/2/" />-->
    <!--    <script type="text/javascript" src="/shared/ghost-url.min.js?v=77522159b3"></script>-->
    <!--    <script type="text/javascript">-->
    <!--        ghost.init({-->
    <!--            clientId: "ghost-frontend",-->
    <!--            clientSecret: "721352203d6a"-->
    <!--        });-->
    <!--    </script>-->
    <!--    <meta name="generator" content="Ghost 0.7" />-->
    <!--    <link rel="alternate" type="application/rss+xml" title="Ghost 开源博客平台" href="http://www.ghostchina.com/rss/" />-->

    <!--    <script>-->
    <!--        var _hmt = _hmt || [];-->
    <!--        (function() {-->
    <!--            var hm = document.createElement("script");-->
    <!--            hm.src = "https://hm.baidu.com/hm.js?6338835ad35c6d950a554fdedb598e48";-->
    <!--            var s = document.getElementsByTagName("script")[0];-->
    <!--            s.parentNode.insertBefore(hm, s);-->
    <!--        })();-->
    <!--    </script>-->
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
                <a class="branding" href="http://www.ghostchina.com" title="Ghost 开源博客平台"><img src="http://static.ghostchina.com/image/b/46/4f5566c1f7bc28b3f7ac1fada8abe.png" align="left" alt="Ghost 开源博客平台"></a>
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
                        <li  role="presentation"><a href="/admin/admin/login">登录</a></li>
                        <li role="presentation"><a href="/admin/admin/logout">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<section class="content-wrap">
    <div class="container">
        <div class="row">

            <main class="col-md-8 main-content">
                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                    <!-- 轮播（Carousel）指标 -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <!-- 轮播（Carousel）项目 -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <a href="/home/home/carousinfo?id=<?php echo $view0['id'];?>"><img src="<?php echo $view0['img'];?>" alt="First slide"></a>
                            <div class="carousel-caption"><?php echo $view0['title'];?></div>
                        </div>
                        <div class="item">
                            <a href="/home/home/carousinfo?id=<?php echo $view1['id'];?>"><img src="<?php echo $view1['img'];?>" alt="Second slide"></a>
                            <div class="carousel-caption"><?php echo $view1['title'];?></div>
                        </div>
                        <div class="item">
                            <a href="/home/home/carousinfo?id=<?php echo $view2['id'];?>"><img src="<?php echo $view2['img'];?>" alt="Third slide"></a>
                            <div class="carousel-caption"><?php echo $view2['title'];?></div>
                        </div>
                    </div>
                    <!-- 轮播（Carousel）导航 -->
                    <a class="carousel-control left" href="#myCarousel"
                       data-slide="prev">&lsaquo;
                    </a>
                    <a class="carousel-control right" href="#myCarousel"
                       data-slide="next">&rsaquo;
                    </a>
                </div>

                <div class="row marketing" style="padding-top: 20px;">
                    <div class="col-lg-6">
                        <a href="/home/home/topicinfo?id=<?php echo $topic0['id'];?>" style="font-size: 20px;"><?php echo $topic0['title'];?></a>
                        <p><?php echo $topic0['content'];?></p>
                    </div>

                    <div class="col-lg-6">
                        <a href="/home/home/topicinfo?id=<?php echo $topic1['id'];?>" style="font-size: 20px;"><?php echo $topic1['title'];?></a>
                        <p><?php echo $topic1['content'];?></p>
                    </div>
                </div>
            </main>

            <aside class="col-md-4 sidebar">
                <!-- start widget -->
                <!-- end widget -->

                <!-- start tag cloud widget -->
                <div class="widget">
                    <h4 class="title">- - 关于纪律云 - -</h4>
                    <div class="content community">
                        <p>纪律云系统是一个为方便学校管理和评估而开发的系统</p>
                        <p><a href="http://wenda.ghostchina.com/" title="Ghost中文网问答社区" target="_blank" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '问答社区'])"><i class="fa fa-comments"></i> 问答社区</a></p>
                        <p><a href="http://weibo.com/ghostchinacom" title="Ghost中文网官方微博" target="_blank" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '官方微博'])"><i class="fa fa-weibo"></i> 官方微博</a></p>
                    </div>
                </div>
                <!-- end tag cloud widget -->

                <!-- start widget -->
                <div class="widget">
                    <h4 class="title">重要通知</h4>
                    <ol class="list-unstyled">
                        <?php foreach ($list as $k=>$v){?>
                            <li>
                                <div><a target="_blank" href="/home/home/info?id=<?php echo $v['id'];?>"><?php echo $v['title'].' ['.date('Y-m-d',$v['date']).']';?></a></div>
                                <div><p></p></div>
                            </li>
                        <?php }?>
                    </ol>
<!--                    <div class="content download">-->
<!--                        <a href="/download/" class="btn btn-default btn-block" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '下载Ghost'])">Ghost 中文版（0.6.0）</a>-->
<!--                    </div>-->
                </div>

           </aside>

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