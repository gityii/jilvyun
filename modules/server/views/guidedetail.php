<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>政务公开</title>  <!--这个标题没有吧？？？？？？-->
    <link rel="stylesheet" href="/static/css/style.css" />
    <script src="/static/js/zepto.js"></script>
    <script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp"></script>
</head>
<body>
<div class="bd dfv">
    <div class="map-container flex" id="map-container"></div>
    <div class="site-wrap xie">
        <div class="list-item df">
				<span class="list-icon">
					<img src="/static/img/icon17.png" alt="" />
				</span>
            <div class="list-title flex tac fwb"><?php echo $info["title"];?></div>
            <span class="list-arrow"></span>
        </div>
        <div class="list-group pb10">
            <table>
                <tr>
                    <td>地&emsp;&emsp;址</td>
                    <td><?php echo $info["address"];?></td>
                </tr>
                <tr>
                    <td>办公时间</td>
                    <td><?php echo $info["worktime"];?></td>
                </tr>
                <tr>
                    <td>咨询电话</td>
                    <td><?php echo $info["tel"];?></td>
                </tr>
            </table>
        </div>
        <div class="site-btns df">
				<span class="flex">
					<a href="http://map.qq.com/m/index/nav/epointx=<?php echo $info["lng"];?>&epointy=<?php echo $info["lat"];?>&eword=<?php echo ($info["address"]);?>">
						<img src="/static/img/icon18.png" />路线
					</a>
				</span>
            <span class="flex">
					<a href="tel:12345678">
						<img src="/static/img/icon19.png" />电话
					</a>
				</span>
        </div>
    </div>
</div>
</body>
<script>
    function init(){
        var center=new qq.maps.LatLng(<?php echo $info["lat"];?>,<?php echo $info["lng"];?>);
        var container = document.getElementById("map-container")
        var map=new qq.maps.Map(container,{
            center:center,
            zoom:16
        });
        //添加定时器
        setTimeout(function(){
            var marker=new qq.maps.Marker({
                position:center,
                animation:qq.maps.MarkerAnimation.DROP,
                map:map
            });
        },1000);
    }
    window.onload=init;
</script>
</html>