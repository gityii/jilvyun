<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>纪律云</title>

    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/highlight.js/8.5/styles/monokai_sublime.min.css">
    <link href="https://cdn.bootcss.com/magnific-popup.js/1.0.0/magnific-popup.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/static/assets/css/screen.css" />
    <link rel="stylesheet" href="/static/css/login.css" />

<body class="home-template">

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
                        <li  role="presentation"><a href="/admin/admin/control">控制台</a></li>
                        <li  role="presentation"><a href="/admin/admin/login">登录</a></li>
                        <li  role="presentation"><a href="/admin/admin/logout">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- end navigation -->


<!-- start site's main content area -->
<section class="content-wrap" >
    <div class="container"  style="height: 500px">
        <div class="box"  style="margin-top:5%;align=center;">
            <div class="title">用户登录</div>
            <form method="post" action="/admin/admin/login">
                <table class="login">
                    <tr><th>用户名：</th><td><input type="text" name="name" /></td></tr>
                    <tr><th>密码：</th><td><input type="password" name="pswd" /></td></tr>
                    <tr><th>验证码：</th><td><input type="text" name="captcha" /></td></tr>
                    <tr><th></th><td class="captcha"><img src="/verify/verify/randomcode" id="captcha" /><a href="#" id="change">看不清<br>换一张</a></td></tr>
                    <tr><th></th><td><input type="submit" value="登录" /></td></tr>
                </table>
            </form>
        </div>
    </div>
</section>

<footer class="main-footer">
    <div class="container" style="height: auto">
        <div class="row">
            <div class="col-sm-4">
                <div class="widget">
                    <h4 class="title">友链</h4>
                    <div class="content tag-cloud friend-links">
                        <a href="http://www.bootcss.com" title="Bootstrap中文网" onclick="_hmt.push(['_trackEvent', 'link', 'click', 'Bootstrap中文网'])" target="_blank">Bootstrap中文网</a>
                        <a href="http://lodashjs.com/" title="Lodash中文文档" onclick="_hmt.push(['_trackEvent', 'link', 'click', 'Lodash中文文档'])" target="_blank">Lodash中文文档</a>
                        <a href="https://www.jquery123.com/" title="jQuery中文文档" onclick="_hmt.push(['_trackEvent', 'link', 'click', 'jQuery中文文档'])" target="_blank">jQuery中文文档</a>
                        <a href="https://www.webpackjs.com/" title="Webpack中文网" onclick="_hmt.push(['_trackEvent', 'link', 'click', 'Webpack中文网'])" target="_blank">Webpack中文网</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="widget">
                    <h4 class="title">标签云</h4>
                    <div class="content tag-cloud">
                        <a href="/tag/about-ghost/">Ghost</a>
                        <a href="/tag/release/">新版本发布</a>
                        <a href="/tag/javascript/">JavaScript</a>
                        <a href="/tag/promise/">Promise</a>
                        <a href="/tag-cloud/">...</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="widget">
                    <h4 class="title">合作伙伴</h4>
                    <div class="content tag-cloud friend-links">
                        <a href="https://www.upyun.com/" title="又拍云" onclick="_hmt.push(['_trackEvent', 'link', 'click', 'upyun'])" target="_blank">又拍云</a>
                        <a href="http://www.aliyun.com/" title="阿里云" onclick="_hmt.push(['_trackEvent', 'link', 'click', 'aliyun'])" target="_blank">阿里云</a>
                        <a href="http://www.qiniu.com/" title="七牛云存储" onclick="_hmt.push(['_trackEvent', 'link', 'click', 'qiniu'])" target="_blank">七牛云存储</a>
                    </div>
                </div></div>
        </div>
    </div>

</footer>

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