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
    <script  src="/static/admin/js/layer/layer.js"></script>
    <![endif]-->
</head>
<body>
<div class="col-md-9 col-md-push-3" role="main">
    <div class="page-header">
        <ul class="nav nav-pills" role="tablist">
            <li role="presentation" class="active"><a href="#">test1</a></li>
            <li role="presentation"><a>test2</a></li>
        </ul>
    </div>

    <div>
        <form action="/guiding/guiding/rule" method="post" class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">项目1 :</label>
                <div class="col-xs-3">
                    <input type="text" name="project" class="form-control"  value="<?php echo $data['project'];?>">
                    <?php if (isset($msg['project'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['project'].'</span>';}?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">项目2 :</label>
                <div class="col-xs-3">
                    <input type="text" name="objects" class="form-control"  value="<?php echo $data['objects'];?>">
                    <?php if (isset($msg['objects'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['objects'].'</span>';}?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">项目3 :</label>
                <div class="col-xs-3">
                    <input type="text" name="val" class="form-control"  value="<?php echo $data['val'];?>">
                    <?php if (isset($msg['val'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['val'].'</span>';}?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">项目4 :</label>
                <div class="col-xs-3">
                    <input type="text" name="comments" class="form-control"  value="<?php echo $data['comments'];?>">
                    <?php if (isset($msg['comments'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['comments'].'</span>';}?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">所属类别：</label>
                <div class=" col-xs-3">
                    <select name="family" id="" class="form-control">
                        <?php foreach ($types as $k=>$v){?>
                            <option value="<?php echo $v;?>"<?php echo $data['ruleid']==$k?' selected="selected"':'';?>><?php echo $v;?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="col-md-3" style="margin-left:7%">
                <button type="submit" class="btn btn-info  btn-block">提交</button>
            </div>
        </form>

    </div>
</div>
<script type="text/javascript">
    <?php if ($success){?>
    layer.msg('修改成功',{icon:1,time: 1500},function(){
        window.location.href="/guiding/guiding/rule";
    });
    <?php }?>
    <?php if ($error!=''){?>
    layer.msg('<?php echo $error;?>',{icon:1,time: 3000},function(){
        //do something
    });
    <?php }?>
</script>

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

</body>>
</html>