<?php //defined('__R__') or exit('');?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>精彩专题</title>
    <link rel="stylesheet" href="/static/css/style.css" />
    <script src="/static/js/zepto.js"></script>
</head>
<body>
	<div class="bd dfv">
		<div class="banner">
			<img src="/static/img/banner.jpg" alt="" />
			<div class="banner-weather"></div>
		</div>
		<div class="catename">
			精彩专题
		</div>
        <div class="subject-wrap xie">
        	<?php foreach ($topics as $v){?>
            <dl class="subject">
                <a href="articles?typeid=<?php echo $v['typeid'];?>">
                    <dt class="df">
                        <div class="subject-title flex">
                            <?php echo $v['name'];?>
                        </div>
                        <div class="subject-arrow"></div>
                    </dt>
                    <dd>
                        <div class="subject-img">
                            <img src="<?php echo $v['img'];?>" alt="" />
                        </div>
                        <div class="subject-desc">
                            <?php echo $v['desc'];?>
                        </div>
                    </dd>
                </a>
            </dl>
            <?php }?>
        </div>
        <?php if ($more){?>
        <div class="get-more">
            <span>加载更多</span>
        </div>
        <?php }?>
	</div>
</body>
<script src="/static/js/app.js"></script>
<script>
var page = 2;
var loading = false;
$(function(){
    $(".get-more").on("click", function(){
    	if(loading){
            return false;
        }
        loading = true;
        $(".get-more span").html("数据加载中...");
    	$.ajax({
			type:"post",
			url:"dataget",
			data:{'page':page},
			dataType:'json',
			async:false,
			success:function(m){
				if(m.nextpage==0){
					$(".get-more").remove();
				}else{
					page = m.nextpage;
				}
				var html = '';
				var data = m.data;
		        for(i in data){
		            var obj = data[i];
		            html += '<dl class="subject">' +
		            '    <a href="articles?typeid='+ obj.typeid +'">' +
		            '        <dt class="df">' +
		            '            <div class="subject-title flex">' + obj.name +
		            '            </div>' +
		            '            <div class="subject-arrow"></div>' +
		            '        </dt>' +
		            '        <dd>' +
		            '            <div class="subject-img">' +
		            '                <img src="'+ obj.img +'" alt="" />' +
		            '            </div>' +
		            '            <div class="subject-desc">' + obj.desc +
		            '            </div>' +
		            '        </dd>' +
		            '    </a>' +
		            '</dl>';
		        }
		        $(".subject-wrap").append(html);
		        $(".get-more span").html("加载更多");
		        loading = false;
			}
	    });
    })
})
</script>
</html>