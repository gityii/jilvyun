<div class="main-title">编辑信息</div>
<div class="main-content">
<form method="post">
	<table class="userinfo">
		<tr>
			<th>姓名：</th>
			<td>
				<input name="name" type="text" />
			</td>
		</tr>
		<tr>
			<th>性别：</th>
			<td>
				<label><input type="radio" name="gender" value="男" />男</label>
				<label><input type="radio" name="gender" value="女" />女</label>
			</td>
		</tr>
		<tr>
			<th>血型：</th>
			<td>
				<select name="blood">
					<?php foreach($blood as $v): ?>
						<option value="<?php echo $v; ?>"><?php echo $v; ?></option>
					<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<th>爱好：</th>
			<td>
				<?php foreach($hobby as $k=>$v): ?>
					<label><input type="checkbox" name="hobby[]" value="<?php echo $v; ?>" /><?php echo $v; ?></label>
				<?php endforeach;?>
			</td>
		</tr>
		<tr>
			<th>个人简介：</th>
			<td>
				<textarea name="description"></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="reset" value="重置" />　<input type="submit" value="保存" />
			</td>
		</tr>
	</table>
</form>
</div>
<script>
	//点亮当前菜单链接
	setMenu('userinfo');
</script>
<?php require 'footer.php'; ?>