<div class="page-title">
	<h2>渠道推广管理</h2>
</div>
<div class="bread">
推广列表
</div>
<div class="info-area">
	<a href="/qr/qr/add" class="btn btn-info"><i class="fa fa-plus"></i> 新建推广</a>
</div>
<div class="main-bd">
	<div class="table-wrap">
		<table class="table table-border" cellspacing="0">
			<thead>
				<tr>
					<th class="f-w2 f-tac">编号</th>
					<th>推广名称</th>
					<th class="f-w5">访问量</th>
					<th class="f-w10">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list as $v){?>
				<tr id="tr_<?php echo $v['orgid'];?>">
					<td class="f-tac"><?php echo $v['orgid'];?></td>
					<td><?php echo $v['orgname'];?></td>
					<td><?php echo $v['viewcount'];?></td>
					<td>
						<a href="/qr/qr/add?id=<?php echo $v['orgid'];?>">编辑</a>
						<span class="divider">/</span>
						<a href="javascript:;" onclick="del('<?php echo $v['orgid'];?>','<?php echo $v['orgname'];?>')">删除</a>
						<span class="divider">/</span>
						<a href="javascript:;" onclick="ewm('<?php echo $v['orgid'];?>')">二维码</a>
					</td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
	<?php echo \base\controllers\page::html('/qr/qr/display?');?>
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

function ewm(id){
	layer.open({
		type: 1,
		title: false,
		closeBtn: 0,
		shadeClose: true,
		area:['230px','230px'],
		maxWidth:'80%',
		content: '<img src="epic?id='+id+'" />'
	});
}
</script>