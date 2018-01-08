<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>生成学院专业级联下拉菜单测试 </title>
</head>
<body>
<? //
/***********************************************
 ** 功 能： php+mysql+javascript实现学院专业二级级联下拉框
 ** 数据库：数据库名（ dms）、数据表（ colleges、 majors）
 ** 表 colleges中字段： college_id（ id编号）、 name（学院名）
 ** 表 majors中的字段： major_id（ id编号）、 college_id（学院 ID）、 name（学院名）
 ** version 1.0
 ** 作 者： wu yaowen
 ***********************************************/
//****************** 连接选择数据库 ***************
$link = mysqli_connect("localhost", "root", "")
or die("Could not connect : " . mysqli_error());
mysqli_select_db("test") or die("Could not select database");
//******************提取学院信息 ******************
$queryCol = "select * from colleges order by college_id ";
mysqli_query("SET NAMES 'gb2312'");
$result1 = mysqli_query($queryCol) or die("Query failed : " . mysqli_error());
$colleges = array();
while( $row1 = mysqli_fetch_array($result1) )
{
    $colleges[] = $row1;
}
//print_r ($forum_data);
mysqli_free_result($result1);
//**************获取专业信息 **************
$queryMaj = "select * from majors order by college_id desc";
mysqli_query("SET NAMES 'gb2312'");
if( !($result2 = mysqli_query($queryMaj)) )
{
    die('Could not query t_city list');
}
$majors = array();
while( $row2 = mysqli_fetch_array($result2) )
{
    $majors[] = $row2;
}
mysqli_free_result($result2);
?>
<!--************ JavaScript处理 college-onChange *************-->
<script language = "JavaScript">
    var majorCount; // 存储专业记录条数
    // form_majors[] 储存专业 major数据，如 {(1,1,电子商务 ),(4,1,计算机科学 ),(3,2,古典文学 )}
    form_majors = new Array();
    <?php
    $num2 = count($majors); // $num2 获取专业表中记录的个数
    ?>
    majorCount = <?php echo $num2;?>;
    <?php for($j=0;$j<$num2;$j++){ // 从 0开始取出上面 majors[]中存储的专业数据填充数组
    ?> form_majors[<?echo $j;?>] = new Array("<?echo $majors[$j]['major_id'];?>","<?echo $majors[$j]['college_id'];?>","<?echo $majors[$j]['name'];?>");<?php
    }?>
    function changeCollege(college_id)
    {
        document.stu_add_form.major.length = 0;
        var id=id;
        var j;
        document.stu_add_form.major.options[0] = new Option('==选择专业 ==',''); // label的 value为空 ' '
        for (j=0;j < majorCount; j++) // 从 0开始判断
        {
            if (form_majors[j][1] == college_id) // if college_id等于选择的学院的 id
            {
                document.stu_add_form.major.options[document.stu_add_form.major.length] = new Option(form_majors[j][2], form_majors[j][0]);
            }
        }
    }
</script>
<!--********************页面表单 *************************-->
<form name="stu_add_form" method="post">
    选择： <select name="college" onChange="changeCollege(document.stu_add_form.college.options[document.stu_add_form.college.selectedIndex].value)" size="1">
        <option selected>==请选择学院 ==</option>
        <?php
        $num = count($colleges);
        for($i=0;$i<$num;$i++)
        {
            ?>
            <option value="<?echo $colleges[$i]['college_id'];?>"><?echo $colleges[$i]['name'];?></option>
            <?
        }
        ?>
    </select>
    <select name="major">
        <option selected value="">==选择专业 ==</option>
    </select>
</form>
</body>
</html>