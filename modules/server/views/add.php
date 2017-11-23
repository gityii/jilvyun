<div class="page-title">
	<h2>政务服务</h2>
</div>
<div class="bread">
	<a href="/server/server/backend">服务列表</a>
	<span>/</span><?php echo $id>0?'编辑':'添加';?>服务
</div>
<div class="main-bd">
	<form action="" method="post" enctype="multipart/form-data">
	<div class="form-block">
		<label for="" class="form-label f-w6">服务编号：</label>
		<span class="form-input-box size-large">
			<input type="text" name="titleid" value="<?php echo $data['titleid'];?>">
			<?php if (isset($msg['titleid'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['titleid'].'</span>';}?>
        </span>
	</div>
    <div class="form-block">
        <label for="" class="form-label f-w6">服务详情：</label>
        <span class="form-input-box size-large">
        <input type="text" name="title" value="<?php echo $data['title'];?>">
            <?php if (isset($msg['title'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['title'].'</span>';}?>
    </span>
    </div>
    <div class="form-block">
        <label for="" class="form-label f-w6">服务时间：</label>
        <span class="form-input-box size-large">
        <input type="text" name="worktime" value="<?php echo $data['worktime'];?>">
            <?php if (isset($msg['worktime'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['worktime'].'</span>';}?>
    </span>
    </div>
    <div class="form-block">
        <label for="" class="form-label f-w6">地址：</label>
        <span class="form-input-box size-large">
        <input type="text" name="address" value="<?php echo $data['address'];?>">
            <?php if (isset($msg['address'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['address'].'</span>';}?>
    </span>
    </div>
    <div class="form-block">
            <label for="" class="form-label f-w6">经度：</label>
            <span class="form-input-box size-large">
            <input type="text" name="lng" value="<?php echo $data['lng'];?>">
                <?php if (isset($msg['lng'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['lng'].'</span>';}?>
     </span>
     </div>
     <div class="form-block">
            <label for="" class="form-label f-w6">纬度：</label>
            <span class="form-input-box size-large">
            <input type="text" name="lat" value="<?php echo $data['lat'];?>">
                <?php if (isset($msg['lat'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['lat'].'</span>';}?>
    </span>
    </div>
    <div class="form-block">
        <label for="" class="form-label f-w6">电话：</label>
        <span class="form-input-box size-large">
        <input type="text" name="tel" value="<?php echo $data['tel'];?>">
            <?php if (isset($msg['tel'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['tel'].'</span>';}?>
    </span>
    </div>
	<div class="form-block">
    <label for="" class="form-label f-w6">所属版块：</label>
    <span class="form-select-box size-small">
        <select name="projectid" id="">
        	<?php foreach ($types as $k=>$v){?>
            <option value="<?php echo $k;?>"<?php echo $data['projectid']==$k?' selected="selected"':'';?>><?php echo $v;?></option>
            <?php }?>
        </select>
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
	window.location.href="/server/server/backend";
});
<?php }?>
<?php if ($error!=''){?>
layer.msg('<?php echo $error;?>',{icon:1,time: 3000},function(){
	  //do something
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