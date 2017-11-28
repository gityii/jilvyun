<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <title>管理后台</title>
    <link href="images/favicon.ico" rel="Shortcut Icon">
    <link rel="stylesheet" href="/static/admin/css/style.css">
    <link rel="stylesheet" href="/static/admin/css/font-awesome.min.css">
    <script src="/static/admin/js/jquery-1.7.1.min.js"></script>
    <script src="/static/admin/js/layer/layer.js"></script>
</head>
<body>
    <div class="header">
        <div class="header-wrap f-ma">
            <div class="logo f-oh f-fl">
                <a href=""><!-- <img src="images/logo.png" alt="logo" /> --></a>
            </div>
            <div class="user-info f-fr">
                <div class="user-name f-fl f-dt">
                    <p><?php echo \base\controllers\web::session('user_name');?></p>
                </div>
                <div class="user-action f-fl">
                    <a href="/admin/admin/logout">退出</a>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="bd f-ma"> -->
        <div class="container f-cb">
        	<div class="sidebar">
				<div class="menu-box">
					<dl class="menu no-extra">
						<dt class="menu-title f-toe"><i class="fa fa-file-o fa-lg"></i>功能管理</dt>
						<dd class="menu-item"><a href="/qr/qr/display">渠道推广</a></dd>
						<dd class="menu-item"><a href="/zhuanti/zhuanti/backend">专题</a></dd>
                     <dd class="menu-item"><a href="/server/server/backend">服务</a></dd>
					</dl>
				</div>
			</div>
			<div class="main"><?php echo $layout_content;?></div>
        </div>
    <!--  </div>-->

     <div class="footer">
         <ul class="footer-link f-ma f-tac">
             <li><a href="#">浮世绘</a></li>
             <p>Copyright © 2017-2018 Tencent. All Rights Reserved.</p>
         </ul>
     </div>
 </body>
 <script src="/static/admin/js/common.js"></script>
 </html>