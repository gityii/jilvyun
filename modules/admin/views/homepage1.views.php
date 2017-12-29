<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>用户中心登录</title>
    <link rel="stylesheet" href="/static/css/login.css" />
</head>
<body>
<div class="box">
    <div class="title">用户登录</div>
    <form method="post">
        <table class="login">
            <tr><th>用户名：</th><td><input type="text" name="name" /></td></tr>
            <tr><th>密码：</th><td><input type="password" name="pswd" /></td></tr>
            <tr><th>验证码：</th><td><input type="text" name="captcha" /></td></tr>
            <tr><th></th><td class="captcha"><img src="/admin/admin/randomcode" id="captcha" /><a href="#" id="change">看不清<br>换一张</a></td></tr>
            <tr><th></th><td><input type="submit" value="登录" /></td></tr>
        </table>
    </form>
</div>
<!-- 通过JavaScript实现单击更换验证码 -->
<script>
    var captcha = document.getElementById("captcha");
    var change = document.getElementById("change");
    change.onclick = function(){
        captcha.src = "/admin/admin/randomcode?rand=" + Math.random(); //增加一个随机参数，防止图片缓存
        return false; //阻止超链接动作
    };
</script>
</body>
</html>