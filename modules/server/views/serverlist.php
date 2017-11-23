<div class="page-title">
	<h2>服务</h2>
</div>
<div class="bread">
版块列表
</div>
<div class="info-area">
	<a href="/server/server/serveradd" class="btn btn-info"><i class="fa fa-plus"></i> 添加新版块</a>
	<a href="/server/server/backend" class="btn btn-info"><i class="fa fa-list-ul"></i> 文章列表</a>
</div>
<div class="main-bd">
	<div class="table-wrap">
		<table class="table table-border" cellspacing="0">
			<thead>
				<tr>
					<th class="f-w2 f-tac">编号</th>
					<th>版块名称</th>
					<th class="f-w5">排序</th>
					<th class="f-w6">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list as $v){?>
				<tr id="tr_<?php echo $v['projectid'];?>">
					<td class="f-tac"><?php echo $v['projectid'];?></td>
					<td><?php echo $v['name'];?></td>
					<td><?php echo $v['order'];?></td>
					<td>
						<a href="/server/server/serveradd?id=<?php echo $v['order'];?>">编辑</a>
						<span class="divider">/</span>
						<a href="javascript:;" onclick="del('<?php echo $v['order'];?>','<?php echo $v['name'];?>')">删除</a>
					</td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
	<?php echo \base\controllers\page::html('/server/server/backend?');?>
</div>
<script type="text/javascript">
function del(id,title){
	layer.confirm('确认要删除“'+title+'”？',{icon:3,title:'删除确认'},function(){
		$.ajax({
			type:"post",
			url:"serverdel",
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

function save(o){
	var order = $(o).val();
	var id = $(o).attr("data-id");
	$(o).css("border-color","#F00");
	if(/^[0-9]{1,5}$/.exec(order)){
		$.ajax({
			type:"post",
			url:"order",
			data:{'id':id,'order':order},
			dataType:'json',
			async:true,
			success:function(m){
				if(m.status==0){
					$(o).css("border-color","#369");
				}
			}
	    });
	}
}
</script>