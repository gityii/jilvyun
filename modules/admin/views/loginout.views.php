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

    p{ text-indent:2em;
        /*width:400px;!*要显示文字的宽度*!*/
        /*overflow:hidden; !*超出的部分隐藏起来。*!*/
        /*white-space:nowrap;!*不显示的地方用省略号...代替*!*/
        /*text-overflow:ellipsis;!* 支持 IE *!*/
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
                        <!--<li><a href=""><mark class="mark">个人设置</mark></a></li>-->
                        <li><a href="/admin/admin/control"><mark class="mark">控制台</mark></a></li>
                        <li>
                            <a href="/admin/admin/login"><mark class="mark">登录</mark>
                            </a></li>
                        <li><a href="/admin/admin/logout"><mark class="mark">退出</mark></a></li>
                    </ul>
                </div>

            </div>
        </nav>

        <header class="toper">
            <p></p>
        </header>
        <div class="row" style="width:1400px">
            <div class="col-sm-8 blog-main">
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
            </div>

            <div class=" col-sm-4 blog-sidebar">
                <div class="sidebar-module sidebar-module-inset">
                    <h5>- - 关于纪律云 - -</h5>
                    <p>纪律云系统是一个为方便学校管理和评估而开发的系统</p>
                </div>
                <div><p></p></div>
                <div class="sidebar-module">
                    <h4>重要通知</h4>
                    <ol class="list-unstyled">
                        <?php foreach ($list as $k=>$v){?>
                            <li>
                                <div><a target="_blank" href="/home/home/info?id=<?php echo $v['id'];?>"><?php echo $v['title'].' ['.date('Y-m-d',$v['date']).']';?></a></div>
                                <div><p></p></div>
                            </li>
                        <?php }?>
                    </ol>
                </div>
                <div class="sidebar-module">
                    <h4>友情连接</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </div><!-- /.blog-sidebar -->

        </div>

    </div> <!-- /container -->

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