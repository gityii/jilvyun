<div class="main-title">上传头像</div>
<div class="main-content">
<form method="post" enctype="multipart/form-data">
	<table class="photo">
		<tr>
			<th>头像：</th>
			<td>
				<img src="/static/uploads/thumb_<?php echo $user_id; ?>.jpg" alt="用户头像" onerror="this.src='/static/images/default.png'" />
			</td>
		</tr>
		<tr>
			<th>上传头像：</th>
			<td>
				<input type="file" name="pic" /><input type="submit" value="上传" />
			</td>
		</tr>
	</table>
</form>
</div>
<script>
	//点亮当前菜单链接
	setMenu('photo');
</script>
