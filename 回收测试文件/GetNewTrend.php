<?php
date_default_timezone_set('Asia/Shanghai');
include ('../conmysql.php');
// 

$NI1 = "'NI18021','NI28021'";
$NI10 = "'NI02321_tank','NI13021','NI17021','NI27021'";
$TI = "'TI13021'";
$PI10 = "'PI13021','PI14021','PI15021','PI18021'";
$PI100 = "'PI16021','PI16121','PI16221','PI16321','PI16421','PI26021'";
$PH = "'YI02321_tank','YI09721_tank','YI02221_tank','YI17021'";
$FI = "'FI02321_tank','FI18021','FI28021'";
$UI = "'UI18021','UI28021'";
$s1 = $s2 = "";
$xl = array();
$n = 0;
foreach($_POST["v"] as $x=>$x_value) 
{ 
	if ($x_value == "NI1")
	{
		$n = $n + substr_count($NI1,"NI");		
		$s1 = $s1. $NI1."," ;	
	}
		if ($x_value == "NI10")
	{
		$n = $n + substr_count($NI10,"NI");		
		$s1 = $s1. $NI10."," ;	
	}
	if ($x_value == "TI")
	{
		$n = $n + substr_count($TI,"TI");	
		$s1 = $s1. $TI."," ;	
	}
	if ($x_value == "PI10")
	{
		$n = $n + substr_count($PI10,"PI");	
		$s1 = $s1. $PI10."," ;	
	}
	if ($x_value == "PI100")
	{
		$n = $n + substr_count($PI100,"PI");	
		$s1 = $s1. $PI100."," ;	
	}
	if ($x_value == "PH")
	{
		$n = $n + substr_count($PH,"YI");	
		$s1 = $s1. $PH."," ;	
	}
	if ($x_value == "FI")
	{
		$n = $n + substr_count($FI,"FI");	
		$s1 = $s1. $FI."," ;	
	}
		if ($x_value == "UI")
	{
		$n = $n + substr_count($UI,"UI");	
		$s1 = $s1. $UI."," ;	
	}
}
$s1 = substr($s1,0,-1);                  //曲线标题head
$s2 = str_replace("'","",$s1);           // SQL查询字段
//echo "S1:".$s1;
//echo "<br>";
//echo $s2;
//echo "<br>";
$time1 =$_POST["Start_Time"];
$long = intval($_POST["durations1"])*3600+intval($_POST["durations2"])*60;
$time1 = str_replace("T"," ",$time1);
$time2 = date('Y-m-d H:i:s',(strtotime($time1)+$long));

$tablename = $project."_r";


$sql_2 = "SELECT TIME ,{$s2} FROM `{$tablename}` WHERE TIME > '{$time1}' AND TIME < '{$time2}'";
//echo $sql_2 ;

$xl = explode(",",$s2);

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
			$st = $st. "{name:'".$xl[$i]."',data: ".json_encode($obj[$i+1]).",type:'line',smooth:true},";
		}
		$st =substr($st,0,-1);
		////////////////////////////////////////////////////
		 include ("trend.html");	
		//echo "查询结果";
		/*
		echo "<br>";		
		echo $s1;
		echo "<br>";
		echo $st;
		echo "<br>";
		echo json_encode($obj[0]);
		*/
		//echo $n;
		//echo json_encode($obj[0]);
		
		
    }
 else 
	{
    echo "对不起，您查询的时间段没有数据！";
	}

 //echo "OK";
//echo "<br>";
//echo $s1;

//echo $st;
//echo "<br>";
//echo json_encode($obj[0]);
mysqli_close($conn);
 

?>