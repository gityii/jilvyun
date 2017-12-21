<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
</head>
<body>
<script src="/static/assets/js/vendor/jquery.min.js"></script>
<script src="/static/admin/js/layer/layer.js"></script>

<div class="col-md-9 col-md-push-3" role="main">
    <div class="page-header">
        <ul class="nav nav-pills" role="tablist">
            <li role="presentation" class="active"><a href="/guiding/person/person">人员列表</a></li>
            <li role="presentation"><a>人员添加</a></li>
        </ul>
    </div>

    <div>
        <form action="/guiding/person/personadd" method="post" class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">姓名 :</label>
                <div class="col-xs-3">
                    <input type="text" name="name" class="form-control" id="exampleInputName2" value="<?php echo $data['name'];?>">
                    <?php if (isset($msg['name'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['name'].'</span>';}?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">学号 :</label>
                <div class="col-xs-3">
                    <input type="text" name="uid" class="form-control" id="exampleInputName2" value="<?php echo $data['uid'];?>">
                    <?php if (isset($msg['uid'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['uid'].'</span>';}?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">权限 :</label>
                <div class="col-xs-3">
                    <input type="text" name="right" class="form-control" id="exampleInputName2" value="<?php echo $data['right'];?>">
                    <?php if (isset($msg['right'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['right'].'</span>';}?>
                </div>
            </div>

            <div class="form-group" action="" >
                <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">所属类别 :</label>
                <div class=" col-xs-3">
                    <select name="family" id="" class="form-control">
                        <?php foreach ($ftypes as $k=>$v){?>
                            <option value="<?php echo $v;?>"<?php echo $data['family']==$v?' selected="selected"':'';?>><?php echo $v;?></option>
                        <?php }?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">所属部门：</label>
                <div class=" col-xs-3">
                    <select name="dept" id="" class="form-control">
                        <?php foreach ($types as $k=>$v){?>
                            <option value="<?php echo $v;?>"<?php echo $data['dept']==$v?' selected="selected"':'';?>><?php echo $v;?></option>
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
    layer.msg('添加成功',{icon:1,time:1500},function(){
        window.location.href="/guiding/person/person";
    });
    <?php }?>
    <?php if ($error!=''){?>
    layer.msg('<?php echo $error;?>',{icon:5,time: 3000},function(){
        //do something
    });
    <?php }?>
</script>

</body>
</html>


