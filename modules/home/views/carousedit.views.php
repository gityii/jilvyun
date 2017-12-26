<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
</head>
<style>
    .form-input-box,.form-input-box label.fileupload{display:inline-block;height:30px;position:relative;}
    .form-input-box{width:auto}
    .form-input-box label.fileupload{min-width:60px;background-color:#fff;border:1px solid #e6e6e6;border-radius:3px;padding:0 12px;color:#222;}
    .form-input-box label.fileupload input[type=file]{position:relative;width:100%;height:100%;left:0;display:none}
</style>
<body>
<script src="/static/assets/js/vendor/jquery.min.js"></script>
<script src="/static/admin/js/layer/layer.js"></script>

<div class="col-md-9 col-md-push-3" role="main">
    <div class="page-header">
        <ul class="nav nav-pills" role="tablist">
            <li role="presentation" class="active"><a href="/home/home/carousel">轮播图列表</a></li>
            <li role="presentation"><a>编辑</a></li>
        </ul>
    </div>

    <div>
        <form action="/home/home/carousedit?id=<?php echo $id;?>" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">标题 :</label>
                <div class="col-xs-3">
                    <input type="text" name="title" class="form-control" id="exampleInputName2" value="<?php echo $data['title'];?>">
                    <?php if (isset($msg['title'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['title'].'</span>';}?>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-sm-2 control-label" style="text-align:left; width: 8%">图片：</label>
                <span class="col-xs-3 form-input-box">
                    <span class="form-input-box">
                        <input type="text" accept="image/jpg,image/jpeg,image/png,image/gif" id="file-input" disabled="" />
                    </span>
                    <label for="fileupload" class="fileupload">
                        <input type="file" name="img" id="fileupload" onchange="document.getElementById('file-input').value=this.value" accept="image/jpg,image/jpeg,image/png,image/gif" value="" />选择文件
                    </label>
	            </span>
            </div>
            <?php if ($data['img']!=''){?>
                <div class="form-group">
                    <label for="" class=""></label>
                    <span class="">
	        <img src="<?php echo $data['img'];?>" style="width:100px;" />
	    </span>
                </div>
            <?php }?>

            <div class="form-group">
                <label for="" class="col-sm-2 control-label" style="text-align:left; width: 8%">正文：</label>
                <div class="col-xs-3">
                <span>
                <script id="editor" name="content" type="text/plain" style="width:600px;height:500px;"><?php echo htmlspecialchars_decode($data['content']);?></script>
                </span>
                </div>
            </div>


            <div class="col-md-3" style="margin-left:7%">
                <button type="submit" class="btn btn-info  btn-block">提交</button>
            </div>
        </form>

    </div>


</div>

<script type="text/javascript">
    <?php if ($success){?>
    layer.msg('修改成功',{icon:1,time:1500},function(){
        window.location.href="/home/home/carousel";
    });
    <?php }?>
    <?php if ($error!=''){?>
    layer.msg('<?php echo $error;?>',{icon:5,time: 3000},function(){
        //do something
    });
    <?php }?>
</script>

<script type="text/javascript" src="/static/tools/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/static/tools/ueditor/ueditor.all.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/tools/ueditor/lang/zh-cn/zh-cn.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('editor');
</script>
</body>
</html>


