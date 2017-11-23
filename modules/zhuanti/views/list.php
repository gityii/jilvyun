<div class="page-title">
	<h2>专题</h2>
</div>
<div class="bread">
文章列表
</div>
<div class="info-area">
	<a href="/zhuanti/zhuanti/add" class="btn btn-info"><i class="fa fa-plus"></i> 添加文章</a>
	<a href="/zhuanti/zhuanti/add?ctype=link" class="btn btn-info"><i class="fa fa-plus"></i> 添加外链</a>
	<a href="/zhuanti/zhuanti/typelist" class="btn btn-info"><i class="fa fa-list-ul"></i> 专题列表</a>
</div>
<div class="main-bd">
	<form action="" mathod="get">
	<div class="form-block">
    	<div class="form-group">
            <label for="" class="form-label f-w3">专题：</label>
            <span class="form-select-box size-small">
		        <select name="type" id="">
		        	<option value="">不选择</option>
		        	<?php foreach ($types as $v){
		        		echo '<option value="'.$v['typeid'].'"'.($v['typeid']==$type?' selected="selected"':'').'>'.$v['name'].'</option>';
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
					<th class="f-w2 f-tac">编号</th>
					<th>标题</th>
					<th class="f-w10">发布时间</th>
					<th class="f-w12">专题</th>
					<th class="f-w5">排序</th>
					<th class="f-w6">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list as $v){?>
				<tr id="tr_<?php echo $v['articleid'];?>">
					<td class="f-tac"><?php echo $v['articleid'];?></td>
					<td><?php echo $v['title'];?></td>
					<td><?php echo date('Y-m-d H:i:s',$v['dateline']);?></td>
					<td><?php echo $v['name'];?></td>
					<td><?php echo $v['order'];?></td>
					<td>
						<a href="/zhuanti/zhuanti/add?id=<?php echo $v['articleid'];?>">编辑</a>
						<span class="divider">/</span>
						<a href="javascript:;" onclick="del('<?php echo $v['articleid'];?>','<?php echo $v['title'];?>')">删除</a>
					</td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
	<?php echo \base\controllers\page::html('/zhuanti/zhuanti/backend?'.($type==''?'':'type='.$type.'&'));?>
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