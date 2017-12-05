<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/static/img/favicon.ico">
      <link href="/static/css/dashboard.css" rel="stylesheet">
    <title>TEST云</title>

    <!-- Bootstrap core CSS -->
    <link href="/static/bootstrap_3_3_7_dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/static/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
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

      #left-sidebar {

          margin: 0 auto;
          padding: 20px;
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
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">TEST</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/admin/views/index">首页</a></li>
            <li><a href="">个人设置</a></li>
            <li>
              <a href="javascript:;">
                  用户(<?php echo \base\controllers\web::session('user_name');?>)
              </a></li>
            <li><a href="/admin/admin/logout">退出</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a>导 航 栏 <span class="sr-only"></span></a></li>

              <li class="dropdown">
                  <a  class="dropdown-toggle" data-toggle="dropdown">
                      纪 律 规 定
                      <b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu  nav" style="width: 100%; text-align:center;" >
                      <li><a  href="/guiding/guiding/rule">规 则 设 置</a></li>
                      <li><a  href="/guiding/guiding/person">人 员 设 置</a></li>
                      <li><a  href="">纪 律 教 育</a></li>
                  </ul>

              </li>

              <li class="dropdown">
                  <a  class="dropdown-toggle" data-toggle="dropdown">
                      检 查 录 入
                      <b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu  nav" style="width: 100%; text-align:center;" >
                      <li><a  href="">移 动 录 入</a></li>
                      <li><a  href="">网 页 录 入</a></li>
                      <li><a  href="">批 量 导 入</a></li>
                      <li><a  href="">记 录 查 询</a></li>
                      <li><a  href="">处 分 管 理</a></li>
                  </ul>

              </li>

              <li class="dropdown">
                  <a  class="dropdown-toggle" data-toggle="dropdown">
                      评 比 分 析
                      <b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu  nav" style="width: 100%; text-align:center;" >
                      <li><a  href="">日 报 周 报</a></li>
                      <li><a  href="">文明班评比</a></li>
                  </ul>

              </li>
          </ul>
        </div>
        <div><?php echo $layout_content;?></div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/static/assets/js/vendor/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/static/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/static/bootstrap_3_3_7_dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="/static/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/static/assets/js/ie10-viewport-bug-workaround.js"></script>

  </body>
</html>
