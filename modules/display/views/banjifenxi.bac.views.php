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
<body>
<script src="/static/assets/js/vendor/jquery.min.js"></script>
<script src="/static/assets/js/vendor/echarts.js"></script>
<script src="/static/admin/js/layer/layer.js"></script>
<div class="col-md-9" style="left: 21%" role="main">

    <div class="page-header">
        <h2>分析</h2>
    </div>

    <div>
        <form action="" onsubmit="arrTest(); return false;" class="form-horizontal">
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label" style="text-align:left; width: 9%" for="">请选择年级 :</label>
                <div class=" col-xs-3">
                    <select name="grade" id="grade" class="form-control">
                        <option value="">不选择</option>
                        <?php foreach ($grades as $v){
                            echo '<option value="'.$v['grade'].'">'.$v['grade'].'</option>';
                        }?>
                    </select>
                </div>
                <button type="submit" class="btn btn-default btn-lg btn-info">提交</button>
            </div>
        </form>
    </div>
    <div id="banji"  class="col-xs-6" style="width: 700px;height:500px;"></div>
</div>

<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('banji'));
    var proj=[],count=[],classes=[],alls=[];
    function arrTest() {
        $.ajax({
            type : "get",//这个地方要统一
            async : false,
            url : "/display/display/banji",
            data : {'grade':$('#grade').val()},
            dataType : "json", //返回数据形式为json
            success : function(result) {
                if (result) {
                    console.log(result);
                    for(var i=0;i<result.length-1;i++){
                        for(var j=0;j<result[i].length-1;j++){
                           proj = result[i][j].project;
                        }
                    }
                    for(var m=0;m<result[result.length - 1].length;m++) {
                        alls[m] = (result[result.length - 1][m].project);
                    }
                }
                console.log(proj);
                console.log(alls);
            },
            error : function(errorMsg) {
                alert("sorry，请求数据失败");
                myChart.hideLoading();
            }
        })
      //  return proj,classes;
    }

    arrTest();

    option = {
        title: {
            text: '2016年12月长宁区合规成本分析'
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: { // 坐标轴指示器，坐标轴触发有效
                type: 'shadow' // 默认为直线，可选为：'line' | 'shadow'
            }
        },
        legend: {
            data: alls,//项目
            align: 'right',
            right: 10
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: [{
            type: 'category',
            data: classes      //班级
        }],
        yAxis: [{
            type: 'value',
            name: '次数',
            axisLabel: {
                formatter: '{value}'
            }
        }],
        series: [{
            name: '',
            type: 'bar',
            data: count   //数据
        }]
    };


    // 使用刚指定的配置项和数据显示图表
    myChart.setOption(option);
</script>

</body>
</html>
