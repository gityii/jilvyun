<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>用户中心</title>
<link rel="stylesheet" href="/static/css/user.style.css">
</head>
<body>
<div class="box">
	<div class="title">用户中心</div>
	<div class="main">
		<div class="menu">
			<ul>
				<li class="menu-title1">个人资料</li>
				<li id="showinfo"><a href="/usercenter/user/showinfo">个人信息</a></li>
				<li id="userinfo"><a href="/usercenter/user/userinfo">编辑信息</a></li>
				<li id="photo"><a href="/usercenter/photo/photoupload">上传头像</a></li>
				<li id="album"><a href="/usercenter/album/albumcreate">我的相册</a></li>
				<li class="menu-title2">系统功能</li>
				<li><a href="/usercenter/login/logout">退出登录</a></li>
			</ul>
		</div>
        <div><?php echo $layout_content;?></div>
		<script>
			function setMenu(target){
				document.getElementById(target).className += " current";
			}
		</script>