<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台布局</title>
    <link rel="stylesheet" href="/static/layui-v2.2.3/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/css/font-awesome.min.css">
</head>

<style>
    .floatdemo {
        width:760px;
        height:360px;
        margin:0 auto; 		 /*与width结合，使元素居中*/
        margin-top:20px;
    }
    .floatdemo div {
        width:337px;
        height:166px;
        float:left;				/*向左浮动*/
    }
    .floatdemo div h2 {
        border-bottom:#aaa 1px dashed;		/*下边框为1px实线*/
        height:20px;
        font-size:13px;
        color:#82c6bd;
        float:left;			 /*向左浮动*/
        width:160px;
    }
    .floatdemo div p {
        color:#999;
        font-size:12px;
        line-height:20px;
    }
    .floatdemo div .img-left {
        float:left;
    }
    .floatdemo div .img-right {
        float:right;
    }
    .demo03,.demo04 {
        margin-top:15px;
    }
    .demo01 img,.demo02 img {
        margin-right:10px;
    }
    .demo03 img,.demo04 img {
        margin-left:10px;
    }
    .demo01,.demo03 {
        margin-right:25px;
    }
</style>

<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header layui-bg-cyan">
        <div class="layui-logo">后台管理</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <!--
            <li class="layui-nav-item"><a href="">控制台</a></li>
            <li class="layui-nav-item"><a href="">商品管理</a></li>
            <li class="layui-nav-item"><a href="">用户</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">其它系统</a>
                <dl class="layui-nav-child">
                    <dd><a href="">邮件管理</a></dd>
                    <dd><a href="">消息管理</a></dd>
                    <dd><a href="">授权管理</a></dd>
                </dl>
            </li>
            -->
        </ul>

        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    <?php echo \base\controllers\web::session('user_name');?>
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="/admin/admin/logout">退出</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="">推广</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/qr/qr/display">推广</a></dd>
                        <dd><a href="javascript:;">列表二</a></dd>
                        <dd><a href="javascript:;">列表三</a></dd>
                        <dd><a href="">超链接</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a class="">专题</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/zhuanti/zhuanti/backend">专题</a></dd>
                        <dd><a href="javascript:;">列表二</a></dd>
                        <dd><a href="">超链接</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="/server/server/backend">服务</a></li>
                <li class="layui-nav-item"><a href="">发布商品</a></li>
            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
       <!--
        <div style="padding: 15px;">内容主体区域</div>
        -->

        <div class="layui-fluid">

            <fieldset class="layui-elem-field layui-field-title">
             <!--   <legend>流体容器（宽度自适应，不固定）</legend>
            -->
            </fieldset>

            <div class="layui-row">

                <div class="layui-col-sm3">
                    <div class="grid-demo">
                        <h2>你等你</h2>
                        <dd><a href="javascript:;">列表二</a></dd>
                        <dd><a href="javascript:;">列表三</a></dd>
                    </div>
                </div>



                <div class="layui-col-sm3">
                    <div class="grid-demo">
                        <h2>你等你</h2>
                        <dd><a href="javascript:;">列表二</a></dd>
                        <dd><a href="javascript:;">列表三</a></dd>
                    </div>
                </div>

                <div class="layui-col-sm3">
                    <div class="grid-demo grid-demo-bg1">
                        <h2>你等我</h2>
                        <dd><a href="javascript:;">列表二</a></dd>
                        <dd><a href="javascript:;">列表三</a></dd>
                    </div>
                </div>

                <div class="layui-col-sm3">
                    <div class="grid-demo"></div>
                </div>

            </div>
        </div>

    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © 浮世绘
    </div>
</div>
<script src="/static/layui-v2.2.3/layui/layui.js"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
</body>
</html>
