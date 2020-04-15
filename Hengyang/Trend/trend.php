<?php

date_default_timezone_set('Asia/Shanghai');
include ('../conmysql.php');
$xl = array('NI13021','FI18021','FI28021','PI16021');
$s1 = "'NI13021',,'FI18021','FI28021','PI16021'";
$s2 = "NI13021,FI18021,FI28021,PI16021 ";
//第一次打开曲线默认显示变量
$n = 4;
$time1 = date('Y-m-d H:i:00', time()-86400);
$time2 = date('Y-m-d H:i:s',time());
$sql_2 = "SELECT TIME ,{$s2}FROM `{$project}` WHERE TIME > '{$time1}' AND TIME < '{$time2}'";
//echo $sql_2;
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
   include ("Noresult.html");
	
	
}

//print_r (json_encode($obj[0]));


mysqli_close($conn);


?>