<div class="page-title">
	<h2>精彩专题</h2>
</div>
<div class="bread">
	<a href="/zhuanti/zhuanti/typelist">专题列表</a>
	<span>/</span><?php echo $id>0?'编辑':'添加';?>专题
</div>
<div class="main-bd">
	<form action="" method="post" enctype="multipart/form-data">
	<div class="form-block">
		<label for="" class="form-label f-w6">专题名称：</label>
		<span class="form-input-box size-large">
			<input type="text" name="name" value="<?php echo $data['name'];?>">
			<?php if (isset($msg['name'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['name'].'</span>';}?>
        </span>
	</div>
	<div class="form-block">
	    <label for="" class="form-label f-w6">大图：</label>
	    <span class="form-input-box form-tips-down">
	        <span class="form-input-box size-small disabled">
	            <input type="text" accept="image/jpg,image/jpeg,image/png,image/gif" id="file-input" disabled="" />
	        </span>
	        <label for="fileupload" class="fileupload">
	            <input type="file" name="img" id="fileupload" onchange="document.getElementById('file-input').value=this.value"
	             accept="image/jpg,image/jpeg,image/png,image/gif" value="" />选择文件
	        </label>
	    </span>
	</div>
	<?php if ($data['img']!=''){?>
	<div class="form-block">
	    <label for="" class="form-label f-w6"></label>
	    <span class="form-input-box form-tips-down">
	        <img src="<?php echo $data['img'];?>" style="width:100px;" />
	    </span>
	</div>
	<?php }?>
	<div class="form-block">
		<label for="" class="form-label f-w6">描述：</label>
		<span class="form-textarea-box">
        	<textarea name="desc" id="" cols="20" rows="5"><?php echo $data['desc'];?></textarea>
        	<?php if (isset($msg['desc'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['desc'].'</span>';}?>
    	</span>
	</div>
	<div class="form-block">
		<label for="" class="form-label f-w6">顺序：</label>
		<span class="form-input-box size-small">
	        <input type="text" name="order" value="<?php echo $data['order'];?>" />
	        <?php if (isset($msg['order'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['order'].'</span>';}?>
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
	window.location.href="/zhuanti/zhuanti/typelist";
});
<?php }?>
<?php if ($error!=''){?>
layer.msg('<?php echo $error;?>',{icon:1,time: 3000},function(){
	  //do something
});
<?php }?>
</script>