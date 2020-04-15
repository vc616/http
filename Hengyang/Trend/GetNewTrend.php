<?php
date_default_timezone_set('Asia/Shanghai');
include ('../conmysql.php');
// 
$s1 = $s2 = "";
$xl = array();
foreach($_POST["v"] as $x=>$x_value) 
{ 
	array_push($xl,$x_value);
	$s1 = $s1. $x_value."','" ;
	$s2 = $s2. $x_value." ," ;
}
$n = count($xl);                //字段统计
$s1 = "'".substr($s1,0,-2);       //曲线标题head
$s2 = rtrim($s2,",");           // SQL查询字段

$time1 =$_POST["Start_Time"];
$long = intval($_POST["durations1"])*3600+intval($_POST["durations2"])*60;
$time1 = str_replace("T"," ",$time1);
$time2 = date('Y-m-d H:i:s',(strtotime($time1)+$long));

$sql_2 = "SELECT TIME ,{$s2} FROM `{$project}` WHERE TIME > '{$time1}' AND TIME < '{$time2}'";
$result_2 = mysqli_query($conn, $sql_2);


if (mysqli_num_rows($result_2) > 0) 
   {
    // 整理数据
    $obj = array();
    $i = 0;	
	while($row = mysqli_fetch_assoc($result_2))
	    {
			$j = 0;
		foreach($row as $field )
	        {
				
            $obj[$j][$i] =  $field;
			$j = $j + 1;
            } 
  	    $i = $i + 1;
        }
	$st ="";

for($i=0;$i<$n;$i++)
{
	//echo $i;
	$st = $st. "{name:'".$xl[$i]."',data: ".json_encode($obj[$i+1]).",type: 'line',smooth: true},";
	//
}
$st =substr($st,0,-1);
////////////////////////////////////////////////////
include ("trend.html");	
		
		
		
		
		
    }
 else {
    echo "对不起，您查询的时间段没有数据！";
}
 //echo "OK";

//echo $s1;
//echo "<br>";
//echo $st;
//echo "<br>";
//echo json_encode($obj[0]);
mysqli_close($conn);
 

?>