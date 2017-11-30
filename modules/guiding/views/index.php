<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layui</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/static/css/my.css">
    <link rel="stylesheet" href="/static/layui-v2.2.3/layui/css/layui.css">
</head>
<body>
<div class="layui-body" style="margin:25px">
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 40px; width: 100%">
        <legend>规则设置</legend>
    </fieldset>

    <div class="layui-btn-group demoTable">
        <button class="layui-btn" data-type="getCheckData">获取选中行数据</button>
        <button class="layui-btn" data-type="getCheckLength">获取选中数目</button>
        <button class="layui-btn" data-type="isAll">验证是否全选</button>
    </div>
        <form action="" mathod="get">
            <div class="form-block">
                <div class="form-group">
                    <label for="" class="form-label f-w3">专题：</label>
                    <span class="form-select-box size-small">
                <select name="type" id="">
                    <option value="">不选择</option>
                    <?php foreach ($types as $v){
                        echo '<option value="'.$v['typeid'].'"'.($v['typeid']==$type?' selected="selected"':'').'>'.$v['name'].'</option>';
                    }?>
                </select>
            </span>
                </div>
                <button type="submit" class="layui-btn">搜索</button>
            </div>
        </form>
        <div class="table-wrap"  style="display:inline-block;width:970px;height:90px">
            <table class="table table-border" cellspacing="0">
                <thead>
                <tr>
                    <th class="f-w2 f-tac">编号</th>
                    <th>标题</th>
                    <th class="f-w10">发布时间</th>
                    <th class="f-w12">专题</th>
                    <th class="f-w5">排序</th>
                    <th class="f-w6">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($list as $v){?>
                    <tr id="tr_<?php echo $v['articleid'];?>">
                        <td class="f-tac"><?php echo $v['articleid'];?></td>
                        <td><?php echo $v['title'];?></td>
                        <td><?php echo date('Y-m-d H:i:s',$v['dateline']);?></td>
                        <td><?php echo $v['name'];?></td>
                        <td><?php echo $v['order'];?></td>
                        <td>
                            <a href="/zhuanti/zhuanti/add?id=<?php echo $v['articleid'];?>">编辑</a>
                            <span class="divider">/</span>
                            <a href="javascript:;" onclick="del('<?php echo $v['articleid'];?>','<?php echo $v['title'];?>')">删除</a>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
        <?php echo \base\controllers\page::html('/zhuanti/zhuanti/backend?'.($type==''?'':'type='.$type.'&'));?>
    </div>

<script type="text/javascript">
    function del(id,title){
        layer.confirm('确认要删除“'+title+'”？',{icon:3,title:'删除确认'},function(){
            $.ajax({
                type:"post",
                url:"del",
                data:{'id':id},
                dataType:'json',
                async:false,
                success:function(m){
                    if(m.status==0){
                        layer.msg('删除成功',{time:1500});
                        $("#tr_"+id).remove();
                    }else{
                        layer.msg(m.msg);
                    }
                }
            });
        },function(){});
    }
</script>
</body>
</html>

