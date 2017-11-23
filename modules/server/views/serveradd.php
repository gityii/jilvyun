<div class="page-title">
	<h2>政务服务</h2>
</div>
<div class="bread">
	<a href="/server/server/serverlist">版块列表</a>
	<span>/</span><?php echo $id>0?'编辑':'添加';?>版块
</div>
<div class="main-bd">
	<form action="" method="post" enctype="multipart/form-data">
	<div class="form-block">
		<label for="" class="form-label f-w6">版块名称：</label>
		<span class="form-input-box size-large">
			<input type="text" name="name" value="<?php echo $data['name'];?>">
			<?php if (isset($msg['name'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['name'].'</span>';}?>
        </span>
	</div>

	<div class="form-block">
		<label for="" class="form-label f-w6">序号：</label>
		<span class="form-input-box size-small">
	        <input type="text" name="projectid" value="<?php echo $data['projectid'];?>" />
	        <?php if (isset($msg['projectid'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['projectid'].'</span>';}?>
	    </span>
	</div>
    <div class="main-block">
        <button type="submit" class="btn btn-default">提交</button>
    </div>
    </form>
</div>
<script type="text/javascript">
<?php if ($success){?>
layer.msg('添加成功',{icon:1,time: 1500},function(){
	window.location.href="/server/server/serverlist";
});
<?php }?>
<?php if ($error!=''){?>
layer.msg('<?php echo $error;?>',{icon:1,time: 3000},function(){
	  //do something
});
<?php }?>
</script>