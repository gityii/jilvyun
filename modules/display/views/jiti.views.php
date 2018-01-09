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
        <h2>数据分析</h2>
    </div>
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="width: 600px;height:400px;"></div>
    <script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));
        var arr1=[],arr2=[];
        function arrTest() {
            $.ajax({
                type : "post",
                async : false, //同步执行
                url : "/display/display/category",
                data : {},
                dataType : "json", //返回数据形式为json
                success : function(result) {
                    if (result) {
                        console.log(result);
                        for(var i=0;i<result.length;i++){
                            arr1.push(result[i].family);
                            arr2.push(result[i].family_count);
                        }
                    }

                },
                error : function(errorMsg) {
                    alert("sorry，请求数据失败");
                    myChart.hideLoading();
                }
            })
            return arr1,arr2;
        }

        arrTest();

        // 指定图表的配置项和数据
        var option = {
            title: {
                text: '集体项：按类别分析'
            },
            tooltip: {
                show: true
            },
            legend: {
                data:['次数']
            },
            xAxis: [
                {
                    type : 'category',
                    data : arr1
                }
            ],
            yAxis: {
                minInterval: 1,
                type: 'value'
            },
            series : [
                {
                    "name":"",
                    "type":"bar",
                    barMaxWidth:20,
                    "data":arr2
                }
            ]
        };

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    </script>
</body>
</html>
