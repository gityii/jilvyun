$(function(){
	$.ajax({
        type: "get",
        url: "http://wthrcdn.etouch.cn/weather_mini?citykey=101190101",
        dataType: "jsonp",
        data: { name: 'Zepto',type:"JSONP" },
        success: function(data){
            var wea = data["data"]["forecast"][0];
            $(".banner-weather").html('南京：'+ wea["type"] +'　气温：'+data["data"]["wendu"]+'℃');
        }
    })
})