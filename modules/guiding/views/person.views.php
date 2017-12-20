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

    <form class="form-search">
    <div class="input-group  col-xs-6 col-md-3" style="float:right; margin:10px;">
        <input type="text" class="form-control"placeholder="请输入字段名" / >
        <span class="input-group-btn">
               <button  type="button" class="btn btn-info btn-search">查找</button>
            </span>
    </div>
    </form>

    <div class="table-wrap">
        <table class="table table-bordered table-responsive table-striped table-hover" cellspacing="0">
            <thead>
            <tr>
                <th class="text-center">用户类型</th>
                <th class="text-center">用户姓名</th>
                <th class="text-center">用户学号</th>
                <th class="text-center">检查部门</th>
                <th class="text-center">录入权限</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $v){?>
                <tr id="tr_<?php echo $v['id'];?>">
                    <td class="text-center"><?php echo $v['type'];?></td>
                    <td class="text-center"><?php echo $v['name'];?></td>
                    <td class="text-center"><?php echo $v['uid'];?></td>
                    <td class="text-center"><?php echo $v['dept'];?></td>
                    <td class="text-center"><?php echo $v['right'];?></td>
                    <td class="text-center">
                        <a class="btn btn-primary" href="/guiding/guiding/edit?id=<?php echo $v['id'];?>">编辑</a>
                        <a class="btn btn-danger" href="javascript:;" onclick="del('<?php echo $v['id'];?>','<?php echo $v['name'];?>')">删除</a>
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


