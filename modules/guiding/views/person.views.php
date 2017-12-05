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
    <title>云</title>

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
<div class="col-md-9 col-md-push-3" role="main">

    <div class="page-header">
        <h2>人员设置</h2>
    </div>
    <p>
        <a class="btn btn-lg btn-success" href="" role="button">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 添加人员
        </a>
        <a class="btn btn-lg btn-success" href="" role="button">
            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> 人员类型列表
        </a>
    </p>

<div>
    <form action="" mathod="get" class="form-horizontal">
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label" style="text-align:left; width: 9%" for="">人员类型：</label>
                <div class=" col-xs-3">
		        <select name="type" id="" class="form-control">
		        	<option value="">不选择</option>
                    <?php foreach ($types as $v){
                        echo '<option value="'.$v['typeid'].'"'.($v['typeid']==$type?' selected="selected"':'').'>'.$v['name'].'</option>';
                    }?>
		        </select>
                </div>
                <button type="submit" class="btn btn-default btn-lg btn-info">搜索</button>
            </div>
    </form>

    <div class="table-wrap">
        <table class="table table-bordered table-responsive table-striped table-hover" cellspacing="0">
            <thead>
            <tr>
                <th class="text-center">编号</th>
                <th class="text-center">项目</th>
                <th class="text-center">分值</th>
                <th class="text-center">类别</th>
                <th class="text-center">对象</th>
                <th class="text-center">备注</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $v){?>
                <tr id="tr_<?php echo $v['id'];?>">
                    <td class="text-center"><?php echo $v['id'];?></td>
                    <td class="text-center"><?php echo $v['project'];?></td>
                    <td class="text-center"><?php echo $v['val'];?></td>
                    <td class="text-center"><?php echo $v['family'];?></td>
                    <td class="text-center"><?php echo $v['objects'];?></td>
                    <td class="text-center"><?php echo $v['comments'];?></td>
                    <td class="text-center">
                        <a class="btn btn-primary" href="/guiding/guiding/edit?id=<?php echo $v['id'];?>">编辑</a>
                        <a class="btn btn-danger" href="javascript:;" onclick="del('<?php echo $v['id'];?>','<?php echo $v['objects'];?>')">删除</a>
                    </td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
    <?php echo \base\controllers\page::html('/zhuanti/zhuanti/backend?'.($type==''?'':'type='.$type.'&'));?>
</div>
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

