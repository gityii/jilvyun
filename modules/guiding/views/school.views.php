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
<div class="col-md-9" role="main">

    <div class="page-header" style="margin-top: 0px">
        <h3 style="margin-top: 0px">班级设置</h3>
    </div>
    <p>
        <a class="btn btn-lg btn-success" href="/guiding/school/classadd" role="button">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 增加班级
        </a>
        <a class="btn btn-lg btn-success" href="/guiding/school/gradelist" role="button">
            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> 年级列表
        </a>
    </p>


<div>

    <form action="" mathod="get" class="form-horizontal">
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label" style="text-align:left; width: 9%" for="">年级 :</label>
            <div class=" col-xs-3">
                <select name="grade" id="" class="form-control">
                    <option value="">不选择</option>
                    <?php foreach ($type as $v){
                        echo '<option value="'.$v['grade'].'"'.($v['grade']==$grade?' selected="selected"':'').'>'.$v['grade'].'</option>';
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
                <th class="text-center">年级</th>
                <th class="text-center">班级</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $v){?>
                <tr id="tr_<?php echo $v['id'];?>">
                    <td class="text-center"><?php echo $v['grade'];?></td>
                    <td class="text-center"><?php echo $v['class'];?></td>
                    <td class="text-center">
                    <a class="btn btn-primary" href="/guiding/school/classedit?id=<?php echo $v['id'];?>">编辑</a>
                    <a class="btn btn-danger" href="javascript:;" onclick="del('<?php echo $v['id'];?>','<?php echo '班级'.$v['class'];?>')">删除</a>
                    </td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
</div>
</div>
<script type="text/javascript">
    function del(id,title){
        layer.confirm('确认要删除“'+title+'”？',{icon:3,title:'删除确认'},function(){
            $.ajax({
                type:"post",
                url:"classdel",
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

