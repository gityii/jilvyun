<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>办事指南</title>
    <link rel="stylesheet" href="/static/css/style.css" />
    <script src="/static/js/zepto.js"></script>
</head>
<body>

	<div class="bd">
		<div class="banner">
			<img src="/static/img/banner.jpg" alt="" />
			<div class="banner-weather"></div>
		</div>
		<div class="catename">
			办事指南
		</div>
		<div class="list xie">
        <?php foreach ($list as $item){?>
            <a href="<?php echo '/server/server/guidedetail?id='.$item['titleid']?>">
				<div class="list-item df">
					<span class="list-icon">
						<img src="/static/img/icon17.png" alt="" />
					</span>
					<div class="list-title flex"><?php echo $item['title']?></div>
					<span class="list-arrow"></span>
				</div>
			</a>
        <?php }?>
		</div>
	</div>
</body>
<script src="/static/js/app.js"></script>
</html>