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

<!--<style>-->
<!--    .class{-->
<!--        display: block;-->
<!--    }-->
<!---->
<!--    .grade{-->
<!--        display: block;-->
<!--    }-->
<!--</style>-->

<body>
<script src="/static/assets/js/vendor/jquery.min.js"></script>
<script src="/static/admin/js/layer/layer.js"></script>

<div class="col-md-9 col-md-push-3" role="main">

    <div class="page-header">
        <ul class="nav nav-pills" role="tablist">
            <li role="presentation" class="active"><a href="/record/record/single">记录列表</a></li>
            <li role="presentation"><a>添加记录</a></li>
        </ul>

    </div>

    <div>
        <form action="/record/record/singleadd" method="post" class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">姓名 :</label>
                <div class="col-xs-3">
                    <input type="text" name="uname" class="form-control" id="exampleInputName2">
                    <?php if (isset($msg['uname'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['uname'].'</span>';}?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">学号 :</label>
                <div class="col-xs-3">
                    <input type="text" name="uid" class="form-control" id="exampleInputName2">
                    <?php if (isset($msg['uid'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['uid'].'</span>';}?>
                </div>
            </div>

            <div id="jiliangrade"></div>
            <div id="jiliansingle"></div>

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
                url:'/record/record/jiliangrade',
                type:'POST',
                data:{"grade":obj.val()},
                //dataType:'json',
                //async:false,
                success:function(data){
                    console.log($(obj).index())
                    if($("#grade").length){
                        $(".class").remove();    //移除后面所有子级下拉菜单
                        $(".grade:last").after(data);                    //添加子级下拉菜单
                    }else {
                        $("#jiliangrade").append(data);                    //初始加载情况
                    }
                    //所有下拉响应
                    $("#grade").unbind().change(function(){
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
    $(document).ready(function(){
        var getData = function(obj){

            $.ajax({
                url:'/record/record/jiliansingle',
                type:'POST',
                data:{"category":obj.val()},
                //dataType:'json',
                //async:false,
                success:function(data){
                    console.log($(obj).index())
                    if($("#category").length){
                        $(".proj").remove();    //移除后面所有子级下拉菜单
                        $(".category:last").after(data);                    //添加子级下拉菜单
                    }else {
                        $("#jiliansingle").append(data);                    //初始加载情况
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
        window.location.href="/record/record/single";
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





