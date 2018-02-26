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
<style>
    .page-wrap{width:100%;padding:20px 0}

    .page-con .page-nav-area {
        height: 30px;
        width: 30px;
        text-align: center;
        line-height: 30px;
        border: 1px solid #e7e7eb;
        border-radius: 3px;
        font-size: 18px;
        color: #8d8d8d;
        vertical-align: middle;
    }


    .page-nav-area a{display:inline-block}

    .page-con .page-nav-area .page-num {
        display: inline-block;
        padding: 7px;
        vertical-align: middle;
        border:none;
    }

    .page-con .page-go-area {
        padding-left: 10px;
    }


   .form-input-box label.fileupload {
        line-height: 30px;
        box-sizing: content-box;
        background-image: none;
        text-align: center;
        white-space: nowrap;
        cursor: pointer;
    }

    .f-tar{text-align:right}

    i.fa {
        padding-right: 5px;
        color: inherit;
    }


</style>
<body>
<script src="/static/assets/js/vendor/jquery.min.js"></script>
<script src="/static/admin/js/layer/layer.js"></script>
<div class="col-md-9"  role="main">

    <div class="page-header" style="margin-top: 0px">
        <h3 style="margin-top: 0px">记录查询</h3>
    </div>

    <div>
        <form action="/display/display/query" method="get" class="form-inline" style="margin-bottom:10px ">
            <div class="form-group">
                <div id="jiliangrade"></div>
            </div>
                <button  type="submit" class="btn btn-info">搜索</button>
        </form>

        <div>

            <div class="table-wrap">
                <table class="table table-bordered table-responsive table-striped table-hover" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="text-center" width="70px">年级</th>
                        <th class="text-center" width="70px">班级</th>
                        <th class="text-center">类别</th>
                        <th class="text-center">项目</th>
                        <th class="text-center">分值</th>
                        <th class="text-center">记录人</th>
                        <th class="text-center">部门</th>
                        <th class="text-center">时间</th>
                        <th class="text-center">注释</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($list as $v){?>
                        <tr id="tr_<?php echo $v['id'];?>">
                            <td class="text-center"><?php echo $v['grade'];?></td>
                            <td class="text-center"><?php echo $v['class'];?></td>
                            <td class="text-center"><?php echo $v['family'];?></td>
                            <td class="text-center"><?php echo $v['project'];?></td>
                            <td class="text-center"><?php echo $v['val'];?></td>
                            <td class="text-center"><?php echo $v['name'];?></td>
                            <td class="text-center"><?php echo $v['dept'];?></td>
                            <td class="text-center"><?php echo date('Y-m-d  H:i:s',$v['date']);?></td>
                            <td class="text-center"><?php echo $v['content'];?></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
            <?php use base\controllers\page; echo page::html('/display/display/query?');?>
        </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var getData = function(obj){

            $.ajax({
                url:'/display/display/jiliangrade',
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
    function del(id,title){
        layer.confirm('确认要删除"'+title+'"?',{icon:3,title:'删除确认'},function(){
            $.ajax({
                type:"post",
                url:"ruledel",
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

</body>
</html>

