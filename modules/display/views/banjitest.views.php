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
    <div id="banji"  class="col-xs-6" style="width: 900px;height:500px;"></div>
</div>

<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('banji'));
    var gclass = [];
    var gtype = [];
    var gcolum = [];
    // 获取名称对应数值
    function getCounts(str, result){
        var arr = [];
        for(var i = 0, len = result.length; i < len - 1; i++){
            var flag = false;
            for(var j = 0, len2 = result[i].length; j < len2 - 1; j++){
                if(result[i][j].project == str){
                    arr.push(parseInt(result[i][j].count, 10));
                    flag = true;
                }
            }
            if(!flag){
                arr.push(0);
                flag = false;
            }
        }
        return arr;
    }

    function arrTest() {

        var columnValue = new Array();
        var classes=[],types=[];
        $.ajax({
            type : "get",//这个地方要统一
            async : false,
            url : "/display/display/test",
            data : {'grade':$('#grade').val()},
            dataType : "json", //返回数据形式为json
            success: function (result) {
                if (result) {
                    console.log(result);
                    var tempArr = [], temp = result[result.length - 1];

                    for (var i = 0; i < temp.length; i++) {
                        tempArr.push(temp[i].project);
                    }
                    //console.log(tempArr);

                    for(var t=0;t<result.length - 1;t++) {
                        classes[t] = (result[t][result[t].length - 1]);
                    }
                    gclass = classes;

                    var len = result[result.length - 1].length;
                    for(var m=0;m<len;m++) {
                        types[m] = (result[result.length - 1][m].project);
                    }
                    gtype = types;

                    for (var i = 0, len = tempArr.length; i < len; i++) {
                        columnValue[i] = {name:tempArr[i],type:'bar',data:getCounts(tempArr[i], result)};
                    }
                    gcolum = columnValue;
                }

            },
            error : function(errorMsg) {
                alert("sorry，请求数据失败");
                myChart.hideLoading();
            }
        })
//        console.log(gtype);
//        console.log(gclass);
//        console.log(gcolum);
       // return types,classes,columnValue;
    }

    arrTest();

    option = {
        title: {
            text: '这是测试显示分析'
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: { // 坐标轴指示器，坐标轴触发有效
                type: 'shadow' // 默认为直线，可选为：'line' | 'shadow'
            }
        },
        legend: {
            data: gtype,
            align: 'right',
            right: 10
        },
//        grid: {
//            left: '3%',
//            right: '4%',
//            bottom: '3%',
//            containLabel: true
//        },
        xAxis: [{
            name: '班级',
            type: 'category',
            data: gclass
        }],
        yAxis: [{
            type: 'value',
            name: '次数',
            axisLabel: {
                formatter: '{value}'
            }
        }],
        series: gcolum,
        barMaxWidth:20,
    };


    // 使用刚指定的配置项和数据显示图表
    myChart.setOption(option);
</script>

</body>
</html>
