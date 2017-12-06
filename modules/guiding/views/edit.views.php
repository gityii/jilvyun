<div class="col-md-9 col-md-push-3" role="main">
    <div class="page-header">
        <ul class="nav nav-pills" role="tablist">
            <li role="presentation" class="active"><a href="#">服务列表</a></li>
            <li role="presentation"><a>规则编辑</a></li>
        </ul>
    </div>

    <div>
        <form action="" mathod="get" class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">项目 :</label>
                <div class="col-xs-3">
                    <input type="text" name="project" class="form-control" id="exampleInputName2" value="<?php echo $data['project'];?>">
                    <?php if (isset($msg['project'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['project'].'</span>';}?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">类别 :</label>
                <div class="col-xs-3">
                    <input type="text" name="project" class="form-control" id="exampleInputName2" value="<?php echo $data['project'];?>">
                    <?php if (isset($msg['project'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['project'].'</span>';}?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">对象 :</label>
                <div class="col-xs-3">
                    <input type="text" name="objects" class="form-control" id="exampleInputName2" value="<?php echo $data['objects'];?>">
                    <?php if (isset($msg['objects'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['objects'].'</span>';}?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">分值 :</label>
                <div class="col-xs-3">
                    <input type="text" name="val" class="form-control" id="exampleInputName2" value="<?php echo $data['val'];?>">
                    <?php if (isset($msg['val'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['val'].'</span>';}?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" style="text-align:left; width: 8%" for="">备注 :</label>
                <div class="col-xs-3">
                    <input type="text" name="comments" class="form-control" id="exampleInputName2" value="<?php echo $data['comments'];?>">
                    <?php if (isset($msg['comments'])){ echo '<span class="form-tips c-warning"><i class="fa fa-exclamation-triangle"></i> '.$msg['comments'].'</span>';}?>
                </div>
            </div>

        </form>

    </div>


</div>