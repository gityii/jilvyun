<div class="page-title">
	<h2>渠道推广管理</h2>
</div>
<div class="bread">
	<a href="/qr/qr/display">推广列表</a>
	<span>/</span><?php echo $id>0?'编辑':'添加';?>推广
</div>
<div class="main-bd">
	<form action="" method="post" enctype="multipart/form-data">
	<div class="form-block">
		<label for="" class="form-label f-w6">推广名称：</label>
		<span class="form-input-box size-large">
			<input type="text" name="orgname" value="<?php echo $data['orgname'];?>">
			<?php if (isset($msg['orgname'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['orgname'].'</span>';}?>
        </span>
	</div>
    <div class="main-block">
        <button type="submit" class="btn btn-default">提交</button>
    </div>
    </form>
</div>
<script type="text/javascript">
<?php if ($success){?>
layer.msg('添加成功',{icon:1,time: 1000},function(){
	window.location.href="/qr/qr/display";
});
<?php }?>
<?php if ($error!=''){?>
layer.msg('<?php echo $error;?>',{icon:1,time: 1000},function(){
    window.location.href="/qr/qr/display";
});
<?php }?>
</script>