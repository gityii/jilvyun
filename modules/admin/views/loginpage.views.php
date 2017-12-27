<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>用户中心登录</title>

    <!-- Bootstrap core CSS -->
    <link href="/static/bootstrap_3_3_7_dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/static/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template
    <link href="/static/css/jumbotron-narrow.css" rel="stylesheet"> -->
    <link href="/static/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="/static/css/login.css" />
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="/static/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/static/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<style>
    .mark{
        background-color: inherit;
        color: white
    }

    .footer {
        position:absolute;
        bottom:0;
        width:100%;
        height:100px;
        color: #777;
        border-top: 1px solid #e5e5e5;
    }

    .toper {
        padding-top: 19px;
        color: #777;
        border-top: 1px solid #e5e5e5;
    }

    p{ text-indent:2em;
        /*width:400px;!*要显示文字的宽度*!*/
        /*overflow:hidden; !*超出的部分隐藏起来。*!*/
        /*white-space:nowrap;!*不显示的地方用省略号...代替*!*/
        /*text-overflow:ellipsis;!* 支持 IE *!*/
    }

</style>

  <body>


        <nav class=" navbar-default  navbar-fixed-top" style="background-color: #0066CC;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand"><mark class="mark">TEST</mark></a>
                </div>

                <div>
                    <ul class="nav navbar-nav navbar-right">
                        <li style="color:white"><a href="/admin/admin/homepage"><mark class="mark">首页</mark></a></li>
                        <!--<li><a href=""><mark class="mark">个人设置</mark></a></li>-->
                        <li><a href="/admin/admin/control"><mark class="mark">控制台</mark></a></li>
                        <li>
                        <li><a href="/admin/admin/login"><mark class="mark">登录</mark></a></li>
                        <li><a href="/admin/admin/logout"><mark class="mark">退出</mark></a></li>
                    </ul>
                </div>

            </div>
        </nav>

        <header class="toper">
            <p></p>
        </header>


    <div class="box"  style="margin-top:9%; align=center;">
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


    <footer class="footer">
        <p>&copy; 2017 Company, Inc.</p>
    </footer>
    <!-- Placed at the end of the document so the pages load faster -->
<!--
    <script src="/static/assets/js/vendor/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/static/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/static/bootstrap_3_3_7_dist/js/bootstrap.min.js"></script>
    <script src="/static/assets/js/ie10-viewport-bug-workaround.js"></script>
    -->
    <!-- 通过JavaScript实现单击更换验证码 -->
    <script>
        var captcha = document.getElementById("captcha");
        var change = document.getElementById("change");
        change.onclick = function(){
            captcha.src = "/verify/verify/randomcode?rand=" + Math.random(); //增加一个随机参数，防止图片缓存
            return false; //阻止超链接动作
        };
    </script>
  </body>
</html>
