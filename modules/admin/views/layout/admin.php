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

    .boxdiv{
        width:300px;
        height: 500px;
        margin: 0 auto;
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
        font-size:22px;
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

<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header layui-bg-cyan">
        <div class="layui-logo">后台管理</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
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
                    <a class="">纪律规定</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/guiding/guiding/rule">规则设置</a></dd>
                        <dd><a href="javascript:;">人员设置</a></dd>
                        <dd><a href="javascript:;">纪律教育</a></dd>
                    </dl>
                </li>

                <li class="layui-nav-item">
                    <a class="">检查登记</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/zhuanti/zhuanti/backend">移动录入</a></dd>
                        <dd><a href="javascript:;">网页录入</a></dd>
                        <dd><a href="">批量导入</a></dd>
                        <dd><a href="">记录查询</a></dd>
                        <dd><a href="">处分管理</a></dd>
                    </dl>
                </li>

                <li class="layui-nav-item layui-nav-itemed">
                    <a class="">屏蔽分析</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/qr/qr/display">日报周报</a></dd>
                        <dd><a href="javascript:;">文明班评比</a></dd>
                    </dl>
                </li>

                <li class="layui-nav-item"><a href="/server/server/backend">服务</a></li>
                <li class="layui-nav-item"><a href="">发布商品</a></li>
            </ul>
        </div>
    </div>
    <div><?php echo $layout_content;?></div>
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
