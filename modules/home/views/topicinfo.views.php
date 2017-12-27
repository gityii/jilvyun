<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/static/bootstrap_3_3_7_dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/static/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template
    <link href="/static/css/jumbotron-narrow.css" rel="stylesheet"> -->
    <link href="/static/css/dashboard.css" rel="stylesheet">

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


</style>

<body>

<div class="container">
    <nav class=" navbar-default  navbar-fixed-top" style="background-color: #0066CC;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand"><mark class="mark">TEST</mark></a>
            </div>

            <div>
                <ul class="nav navbar-nav navbar-right">
                    <li style="color:white"><a href="/home/home/homepage"><mark class="mark">首页</mark></a></li>
                    <li>
                        <mark class="mark">用户
                                (<?php echo \base\controllers\web::session('user_name');?>)</mark>
                        </li>
                    <li><a href="/admin/admin/logout"><mark class="mark">退出</mark></a></li>
                </ul>
            </div>

        </div>
    </nav>

    <header class="toper">
        <p></p>
    </header>
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

<footer class="footer">
    <p>&copy; 2017 Company, Inc.</p>
</footer>

<!-- Placed at the end of the document so the pages load faster -->
<script src="/static/assets/js/vendor/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/static/assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="/static/bootstrap_3_3_7_dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/static/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
