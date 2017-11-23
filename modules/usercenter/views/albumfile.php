<div class="main-title">我的相册</div>
<div class="main-content">
	<div class="album-act">
		<div class="album-act-each">
			<form method="post">
				添加子相册：
				<input type="text" name="dir_name" />
				<input type="submit" value="创建" />
			</form>
		</div>
		<div class="album-act-each">
			<form method="post" enctype="multipart/form-data">
				上传文件：
				<input type="file" name="file_name" />
				<input type="submit" value="上传" />
			</form>
		</div>
	</div>
	<div class="album-position">
		当前位置：用户相册<?php if($path): ?>
		&gt; <?php echo str_replace('/', ' &gt; ',$path); ?>
		（<a href="?path=<?php echo dirname($path); ?>">返回上级</a>）
		<?php endif; ?>
	</div>
	<div class="album-folder">
		子相册：
		<?php foreach($folderlist as $v): ?>
			<a href="?path=<?php echo $v ?>"><?php echo basename($v); ?></a>
		<?php endforeach; ?>
	</div>
	<div class="album-file">
		<!-- 输出4列等宽图片 -->
		<?php
			$view_flow = function() use ($filelist,$path){
				$flow = array();
				for($i=0,$j=0,$len=count($filelist);$i<$len;++$i){
					$flow[$j][] = $filelist[$i];
					$j = ($j==3) ? 0 : ++$j;
				}
				foreach($flow as $v){
					echo '<div class="album-file-flow">';
					foreach($v as $vv){
						$filename = basename($vv);
						echo "<div><a href=\"\usercenter\albumshow\shows?path=$path/$filename\"><img src=\"$vv\"></a><span>$filename</span></div>";
					}
					echo '</div>';
				}
			};
			$view_flow();
		?>
	</div>
</div>
<script>
	//点亮当前菜单链接
	setMenu('album');
</script>
