<div class="col-md-9 col-md-push-3" role="main">

    <div class="page-header">
        <h2>规则设置</h2>
    </div>
    <p>
        <a class="btn btn-lg btn-success" href="" role="button">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 添加规则
        </a>
        <a class="btn btn-lg btn-success" href="" role="button">
            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> 规则类别列表
        </a>
    </p>

<div>
    <form action="" mathod="get" class="form-horizontal">
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label" style="text-align:left; width: 9%" for="">规则类别 :</label>
                <div class=" col-xs-3">
		        <select name="id" id="" class="form-control">
		        	<option value="">不选择</option>
                    <?php foreach ($rules as $v){
                        echo '<option value="'.$v['ruleid'].'"'.($v['ruleid']==$ruleid?' selected="selected"':'').'>'.$v['name'].'</option>';
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
    <?php echo \base\controllers\page::html('/guiding/guiding/rule?'.($ruleid==''?'':'id='.$ruleid.'&'));?>
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

