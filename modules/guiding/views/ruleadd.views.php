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
            <li role="presentation" class="active"><a href="/guiding/guiding/rule">规则列表</a></li>
            <li role="presentation"><a>规则添加</a></li>
        </ul>
    </div>

    <div>
        <form action="/guiding/guiding/ruleadd" method="post" class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">项目 :</label>
                <div class="col-xs-3">
                    <input type="text" name="project" class="form-control" id="exampleInputName2" value="<?php echo $data['project'];?>">
                    <?php if (isset($msg['project'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['project'].'</span>';}?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">分值 :</label>
                <div class="col-xs-3">
                    <input type="text" name="val" class="form-control" id="exampleInputName2" value="<?php echo $data['val'];?>">
                    <?php if (isset($msg['val'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['val'].'</span>';}?>
                </div>
            </div>

            <div id="jilianobject"></div>

            <div class="form-group" action="" >
                <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">备注 :</label>
                <div class="col-xs-3">
                    <input type="text" name="comments" class="form-control" id="exampleInputName2" value="<?php echo $data['comments'];?>">
                    <?php if (isset($msg['comments'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['comments'].'</span>';}?>
                </div>
            </div>

            <div class="col-md-3" style="margin-left:7%">
                <button type="submit" class="btn btn-info  btn-block">提交</button>
            </div>


        </form>

    </div>


</div>

<script type="text/javascript">
    $(document).ready(function(){
        var getData = function(obj){

            $.ajax({
                url:'/guiding/guiding/jilianobject',
                type:'POST',
                data:{"family":obj.val()},
                //dataType:'json',
                //async:false,
                success:function(data){
                    console.log($(obj).index())
                    if($("#category").length){
                        $(".obj").remove();    //移除后面所有子级下拉菜单
                        $(".category:last").after(data);                    //添加子级下拉菜单
                    }else {
                        $("#jilianobject").append(data);                    //初始加载情况
                    }
                    //所有下拉响应
                    $("#category").unbind().change(function(){
                        getData($(this));
                    });
                },
                error:function(msg){
                    //console.log(msg);
                    alert('error');
                }
            });
        }
        //Init
        getData($(this));
    });
</script>

<script type="text/javascript">
    <?php if ($success){?>
    layer.msg('添加成功',{icon:1,time:1500},function(){
        window.location.href="/guiding/guiding/rule";
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


