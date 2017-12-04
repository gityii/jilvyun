<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/static/img/favicon.ico">
    <link href="/static/css/dashboard.css" rel="stylesheet">
    <title>信阳市第二实验小学--纪律云</title>

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

<body>
<div class="container theme-showcase" role="main">

    <div class="page-header">
        <h1>规则设置</h1>
    </div>
    <p>
        <a class="btn btn-lg btn-success" href="#" role="button">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 添加规则
        </a>
        <a class="btn btn-lg btn-success" href="#" role="button">
            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> 规则类别列表
        </a>
    </p>
</div>

<div class="main-bd">
    <form action="" mathod="get">
        <div class="form-block">
            <div class="form-group">
                <label for="" class="form-label f-w3">专题：</label>
                <span class="form-select-box size-small">
		        <select name="type" id="">
		        	<option value="">不选择</option>
                    <?php foreach ($types as $v){
                        echo '<option value="'.$v['typeid'].'"'.($v['typeid']==$type?' selected="selected"':'').'>'.$v['name'].'</option>';
                    }?>
		        </select>
		    </span>
            </div>
            <button type="submit" class="btn btn-default">搜索</button>
        </div>
    </form>
    <div class="table-wrap">
        <table class="table table-border" cellspacing="0">
            <thead>
            <tr>
                <th class="f-w2 f-tac">编号</th>
                <th>标题</th>
                <th class="f-w10">发布时间</th>
                <th class="f-w12">专题</th>
                <th class="f-w5">排序</th>
                <th class="f-w6">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $v){?>
                <tr id="tr_<?php echo $v['articleid'];?>">
                    <td class="f-tac"><?php echo $v['articleid'];?></td>
                    <td><?php echo $v['title'];?></td>
                    <td><?php echo date('Y-m-d H:i:s',$v['dateline']);?></td>
                    <td><?php echo $v['name'];?></td>
                    <td><?php echo $v['order'];?></td>
                    <td>
                        <a href="/zhuanti/zhuanti/add?id=<?php echo $v['articleid'];?>">编辑</a>
                        <span class="divider">/</span>
                        <a href="javascript:;" onclick="del('<?php echo $v['articleid'];?>','<?php echo $v['title'];?>')">删除</a>
                    </td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
    <?php echo \base\controllers\page::html('/zhuanti/zhuanti/backend?'.($type==''?'':'type='.$type.'&'));?>
</div>
<script type="text/javascript">
    function del(id,title){
        layer.confirm('确认要删除“'+title+'”？',{icon:3,title:'删除确认'},function(){
            $.ajax({
                type:"post",
                url:"del",
                data:{'id':id},
                dataType:'json',
                async:false,
                success:function(m){
                    if(m.status==0){
                        layer.msg('删除成功',{time:1500});
                        $("#tr_"+id).remove();
                    }else{
                        layer.msg(m.msg);
                    }
                }
            });
        },function(){});
    }
</script>
</body>>
</html>

