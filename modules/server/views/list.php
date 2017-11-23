<div class="page-title">
	<h2>政务服务</h2>
</div>
<div class="bread">
</div>
<div class="info-area">
    <a href="/server/server/add" class="btn btn-info"><i class="fa fa-plus"></i> 添加服务</a>
	<a href="/server/server/serverlist" class="btn btn-info"><i class="fa fa-list-ul"></i> 版块列表</a>
</div>
<div class="main-bd">
	<form action="" mathod="get">
	<div class="form-block">
    	<div class="form-group">
            <label for="" class="form-label f-w3">版块：</label>
            <span class="form-select-box size-small">
		        <select name="type" id="">
		        	<option value="">不选择</option>
		        	<?php foreach ($types as $v){
		        		echo '<option value="'.$v['projectid'].'"'.($v['projectid']==$type?' selected="selected"':'').'>'.$v['name'].'</option>';
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
					<!--<th class="f-w2 f-tac">服务编号</th>-->
					<th>服务详情</th>
					<th class="f-w10">服务时间</th>
                    <th class="f-w10">地址</th>
                    <th class="f-w5">电话</th>
                    <th class="f-w2">经度</th>
					<th class="f-w2">纬度</th>
					<th class="f-w6">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list as $v){?>
				<tr id="tr_<?php echo $v['titleid'];?>">
					<td><?php echo $v['title'];?></td>
					<td><?php echo $v['worktime'];?></td>
                    <td><?php echo $v['address'];?></td>
                    <td><?php echo $v['tel'];?></td>
					<td><?php echo $v['lng'];?></td>
					<td><?php echo $v['lat'];?></td>
					<td>
						<a href="/server/server/add?id=<?php echo $v['order'];?>">编辑</a>
						<span class="divider">/</span>
						<a href="javascript:;" onclick="del('<?php echo $v['order'];?>','<?php echo $v['title'];?>')">删除</a>
					</td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
	<?php echo \base\controllers\page::html('/server/server/backend?'.($type==''?'':'type='.$type.'&'));?>
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