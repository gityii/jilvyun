<div class="page-title">
	<h2>专题</h2>
</div>
<div class="bread">
	<a href="/zhuanti/zhuanti/backend">文章列表</a>
	<span>/</span><?php echo $id>0?'编辑':'添加';?>文章
</div>
<div class="main-bd">
	<form action="" method="post" enctype="multipart/form-data">
	<div class="form-block">
		<label for="" class="form-label f-w6">文章标题：</label>
		<span class="form-input-box size-large">
			<input type="text" name="title" value="<?php echo $data['title'];?>">
			<?php if (isset($msg['title'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['title'].'</span>';}?>
        </span>
	</div>
	<div class="form-block">
	    <label for="" class="form-label f-w6">缩略图：</label>
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
		<label for="" class="form-label f-w6">来源：</label>
		<span class="form-input-box size-small">
	        <input type="text" name="from" value="<?php echo $data['from'];?>" />
	        <?php if (isset($msg['from'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['from'].'</span>';}?>
	    </span>
	</div>
	<div class="form-block">
		<label for="" class="form-label f-w6">顺序：</label>
		<span class="form-input-box size-small">
	        <input type="text" name="order" value="<?php echo $data['order'];?>" />
	        <?php if (isset($msg['order'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['order'].'</span>';}?>
	    </span>
	</div>
	<div class="form-block">
    <label for="" class="form-label f-w6">所属专题：</label>
    <span class="form-select-box size-small">
        <select name="type" id="">
        	<?php foreach ($types as $k=>$v){?>
            <option value="<?php echo $k;?>"<?php echo $data['type']==$k?' selected="selected"':'';?>><?php echo $v;?></option>
            <?php }?>
        </select>
    </span>
	</div>
	<?php if ($ctype=='link'){?>
	<div class="form-block">
		<label for="" class="form-label f-w6">链接地址：</label>
		<span class="form-input-box size-large">
			<input type="text" name="url" value="<?php echo $data['url'];?>">
			<?php if (isset($msg['url'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['url'].'</span>';}?>
        </span>
	</div>
	<?php }else {?>
	<div class="form-block">
        <label for="" class="form-label f-w6">正文：</label>
        <span class="form-textarea-box size-small">
            <script id="editor" name="content" type="text/plain" style="width:600px;height:500px;"><?php echo htmlspecialchars_decode($data['content']);?></script>
        </span>
    </div>
    <?php }?>
    <div class="main-block">
        <button type="submit" class="btn btn-default">提交</button>
    </div>
    </form>
</div>
<script type="text/javascript">
<?php if ($success){?>
layer.msg('添加成功',{icon:1,time: 1500},function(){
	window.location.href="/zhuanti/zhuanti/backend";
});
<?php }?>
<?php if ($error!=''&& $success){?>
layer.msg('<?php echo $error;?>',{icon:1,time: 3000},function(){
    window.location.href="/zhuanti/zhuanti/backend";
});
<?php }?>
</script>
<!-- 配置文件 -->
<script type="text/javascript" src="/static/tools/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/static/tools/ueditor/ueditor.all.js"></script>
 <script type="text/javascript" charset="utf-8" src="/static/tools/ueditor/lang/zh-cn/zh-cn.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
<?php if ($ctype!='link'){?>
var ue = UE.getEditor('editor');
<?php }?>
</script>