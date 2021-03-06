<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>查看图片</title>
<link rel="stylesheet" href="/static/css/album_show.css">
</head>
<body>
<div class="box">
	<div class="title">查看图片</div>	
	<div class="position">当前位置：我的相册
		<?php if($path){ echo ' &gt; '.str_replace('/', ' &gt; ',$path); } ?>
		（<a href="album.php?path=<?php echo $path; ?>">返回列表</a>）
	</div>
	<div class="album">
		<table><tr>
			<td>
				<?php if($prev): ?>
					<a href="?path=<?php echo $path.'/'.basename($prev); ?>"><img src="<?php echo $prev; ?>" alt="上一张" />查看上一张</a>
				<?php else: ?>
					没有上一张
				<?php endif; ?>
			</td>
			<th>
				<img src="<?php echo "$current"; ?>" alt="当前图片" />
			</th>
			<td>
				<?php if($next): ?>
					<a href="?path=<?php echo $path.'/'.basename($next); ?>"><img src="<?php echo $next; ?>" alt="下一张" />查看下一张</a>
				<?php else: ?>
					没有下一张
				<?php endif; ?>
			</td>
		</tr></table>
	</div>
	<div class="history">
		<div class="position">浏览历史记录：（<a href="?path=<?php echo $path.'/'.basename($current); ?>&action=clear">清除历史</a>）</div>
		<div class="history-list">
			<?php foreach($history as $v): ?>
				<a href="?path=<?php echo substr($v, $album_path_len); ?>"><img src="<?php echo $v; ?>"></a>
			<?php endforeach; ?>
		</div>
	</div>
</div>
</body>
</html>