<?php

$dbname = "dt";
$servername = "localhost";
$username = "php";
$password = "111111";
$project = substr(str_ireplace(dirname(dirname(__FILE__)),"",dirname(__FILE__)),1);
//echo $project;
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);



if (!$conn) {
    //die("连接失败: " . mysqli_connect_error());	
}
else {
	//echo "连接成功<br>";
}

//header("Content-type: text/html; charset:utf-8");

//mysqli_query("SET NAMES 'utf-8'");
 



/*
$sql_1 = "SHOW FULL COLUMNS FROM `main`";
$result_1 =  mysqli_query($conn, $sql_1);

 while($row=mysqli_fetch_assoc($result_1)){
	
 print_r ($row['Field']);
 print_r($row);
  echo "<br>";
// echo count($row));
 echo "<br>";
  }
*/
//////////////////////////////////////////////////SELECT*FROMconfig HERE config.ID = RRRRR
mysqli_set_charset($conn,"utf8");

$sql_1 = "SELECT * FROM config WHERE config.ID = '" . $project . "'";
$result_1 = mysqli_query($conn, $sql_1);
//echo $sql_1;


if (mysqli_num_rows($result_1) == 1) {
    // 输出数据
    $row1 = mysqli_fetch_assoc($result_1);
	//echo json_encode($row1);	
}
 else {
    echo "0 结果";
}


$sql_2 = "SELECT * FROM " . $project;
$result_2 = mysqli_query($conn, $sql_2);
if (mysqli_num_rows($result_2) == 1) {
    // 输出数据
    $row = mysqli_fetch_assoc($result_2);
	//echo json_encode($row);
	
}
 else {
    echo "0 结果";
}
 

 
 
$T1 = date_create_from_format('Y-m-d H:i:s',$row['TIME']);
$T2 = date_timestamp_get($T1);
$T3 = time();
//$T4 = $T3 - $T2;
//echo $T4;


////////////////////////////////////////////////////

//include './A0.html';

//$html = file_get_contents('./A0.html'); 

//$html = str_ireplace("Time_Value",$row['Time'], $html);
//$html = str_ireplace("PI16021","#00FF00", $html);
//print_r ($html); 
//echo "<div>$row['Time']</div>";
//echo "<td>" . $row . "</td>";


if ($T3 - $T2<60)
{
	echo json_encode(array_merge_recursive($row1,$row));	
}
 else
 {
	echo '{"ID":"A","TIME":"2019-08-04 00:33:40","NI13021":"####","TI13021":"####","NI17021":"####","NI18021":"####","NI27021":"####","NI28021":"####","FI18021":"####","FI28021":"####","PI13021":"####","PI14021":"####","PI15021":"####","PI16021":"####","PI16121":"####","PI16221":"####","PI16321":"####","PI16421":"####","PI18021":"####","PI26021":"####","YI17021":"####","LI11021":"####","YI02221_tank":"####","YI02321_tank":"####","YI09721_tank":"####","NI02321_tank":"####","LI02211_tank":"####","LI09711_tank":"####","PDI13021":"####","PDI14021":"####","PDI15021":"####","PDI16021":"####","PDI16X21":"####","UI18021":"####","UI28021":"####","FI09711_tank":"####","FI02321_tank":"####","LI02411_tank":"####","Unit11_RT":"####","Unit21_RT":"####","FI28021_Total":"####","FI18021_Total":"####","NI13011_H":"####","Step_Time_S":"####","Step_Time_M":"####","Step_Time_H":"####","System_idle_1":"False","System_Operateing_1":"False","System_Adj_VS16911":"False","System_Stop_Rinse_1":"False","System_Stop_1":"False","System_Clean_Active":"False","water_rinse_Active":"False","System_Operateing_2":"False","System_Adj_VS269111":"False","System_Stop_Rinse_2":"False","System_Stop_2":"False","System_Clean_Active_2":"False","PK13011_Run":"False","PK13011_Fault":"False","PK02211_Run":"False","PK02211_Fault":"False","PK13811_Run":"False","PK13811_Fault":"False","PP16011_Run":"False","PP16011_Fault":"False","PP16021_Run":"False","PP16021_Fault":"False","PP16031_Run":"False","PP16031_Fault":"False","PP16041_Run":"False","PP16041_Fault":"False","PK16111_Run":"False","PK16111_Fault":"False","PK16211_Run":"False","PK16211_Fault":"False","PK16311_Run":"False","PK16311_Fault":"False","PK16411_Run":"False","PK16411_Fault":"False","PK16511_Run":"False","PK16511_Fault":"False","PK16611_Run":"False","PK16611_Fault":"False","PK16711_Run":"False","PK16711_Fault":"False","PK16811_Run":"False","PK16811_Fault":"False","PP26011_Run":"False","PP26011_Fault":"False","PP26021_Run":"False","PP26021_Fault":"False","PP26031_Run":"False","PP26031_Fault":"False","PP26041_Run":"False","PP26041_Fault":"False","PK26111_Run":"False","PK26111_Fault":"False","PK26211_Run":"False","PK26211_Fault":"False","PK26311_Run":"False","PK26311_Fault":"False","PK26411_Run":"False","PK26411_Fault":"False","HZ11011_Run":"False","HZ11011_Fault":"False","HZ11021_Run":"False","HZ11021_Fault":"False","VS16911_Open":"False","VS16911_Close":"False","VS26911_Open":"False","VS26911_Close":"False","TS11021":"False","TS11011":"False","FS13011":"False","PS17011":"False","PS25011":"False","PS28011":"False","PS00811":"False","FS00411":"False","PS15021":"False","TS16011":"False","TS26011":"False","TS16111":"False","TS16211":"False","PK09411_Run":"False","PK09411_Fault":"False","E_Stop":"False","Power_Fault":"False","Operation_Selected":"False","LS11091":"False","LS11031":"False","LS11021":"False","LS11011":"False","PD09711_Run":"False","PK02411_Fault":"False","PK09711_Fault":"False","FS02321":"False","FS02221":"False","FS09721":"False","LS02411":"False","LS02421":"False","LS02431":"False","LS02491":"False","LS02221":"False","LS02211":"False","LS02231":"False","LS02241":"False","LS02291":"False","LS00101":"False","LS00111":"False","LS00131":"False","LS00191":"False","LS09711":"False","LS09721":"False","LS09731":"False","LS09791":"False","LS01211":"False","LS01311":"False","LS00211":"False","LR09311_Fault":"False","LR09311_Run":"False","PK02411_Run":"False","PK09711_Run":"False","PK02221_Run":"False","PC01211_Run":"False","PC01311_Run":"False","PD00111_Run":"False","PD00211_Run":"False","PD00411_Run":"False","VA09711_Open":"False","VA02311_Open":"False","VA12011_Open":"False","VA13011_Open":"False","VA13111_Open":"False","VA13151_Open":"False","VA13121_Open":"False","VA13081_Open":"False","VA13161_Open":"False","VA13811_Open":"False","VA16921_Open":"False","VA17011_Open":"False","VA17021_Open":"False","VA17031_Open":"False","VA18011_Open":"False","VA18021_Open":"False","VA21011_Open":"False","VA26921_Open":"False","VA27011_Open":"False","VA28011_Open":"False","VA28021_Open":"False","VA11011_Open":"False","VA11021_Open":"False","VA19411_Open":"False"}'; 
	 
 }
//{"ID":"hengyang","TIME":"2019-08-04 00:33:40","NI13021":"****","TI13021":"****","NI17021":"70.75","NI18021":"2225.12","NI27021":"15.42","NI28021":"219.62","FI18021":"7.69","FI28021":"6.61","PI13021":"4.78","PI14021":"4.03","PI15021":"3.01","PI16021":"39.87","PI16121":"49.74","PI16221":"49.94","PI16321":"50.09","PI16421":"0.00","PI18021":"1.68","PI26021":"20.11","YI17021":"6.60","LI11021":"0.07","YI02221_tank":"0.00","YI02321_tank":"0.00","YI09721_tank":"0.00","NI02321_tank":"0.00","LI02211_tank":"0.00","LI09711_tank":"0.00","PDI13021":"0.76","PDI14021":"1.02","PDI15021":"-36.87","PDI16021":"-36.87","PDI16X21":"9.87","UI18021":"82.70","UI28021":"85.89","FI09711_tank":"0.00","FI02321_tank":"0.00","LI02411_tank":"0.00","Unit11_RT":"0.20","Unit21_RT":"0.00","FI28021_Total":"0.00","FI18021_Total":"0.00","NI13011_H":"25.00","Step_Time_S":"34","Step_Time_M":"26","Step_Time_H":"4","System_idle_1":"False","System_Operateing_1":"False","System_Adj_VS16911":"True","System_Stop_Rinse_1":"False","System_Stop_1":"False","System_Clean_Active":"False","water_rinse_Active":"False","System_Operateing_2":"False","System_Adj_VS269111":"True","System_Stop_Rinse_2":"False","System_Stop_2":"False","System_Clean_Active_2":"False","PK13011_Run":"True","PK13011_Fault":"False","PK02211_Run":"True","PK02211_Fault":"False","PK13811_Run":"False","PK13811_Fault":"False","PP16011_Run":"True","PP16011_Fault":"False","PP16021_Run":"True","PP16021_Fault":"False","PP16031_Run":"False","PP16031_Fault":"False","PP16041_Run":"False","PP16041_Fault":"False","PK16111_Run":"True","PK16111_Fault":"False","PK16211_Run":"True","PK16211_Fault":"False","PK16311_Run":"True","PK16311_Fault":"False","PK16411_Run":"False","PK16411_Fault":"False","PK16511_Run":"False","PK16511_Fault":"False","PK16611_Run":"False","PK16611_Fault":"False","PK16711_Run":"False","PK16711_Fault":"False","PK16811_Run":"False","PK16811_Fault":"False","PP26011_Run":"True","PP26011_Fault":"False","PP26021_Run":"True","PP26021_Fault":"False","PP26031_Run":"False","PP26031_Fault":"False","PP26041_Run":"False","PP26041_Fault":"False","PK26111_Run":"False","PK26111_Fault":"False","PK26211_Run":"False","PK26211_Fault":"False","PK26311_Run":"False","PK26311_Fault":"False","PK26411_Run":"False","PK26411_Fault":"False","HZ11011_Run":"False","HZ11011_Fault":"False","HZ11021_Run":"False","HZ11021_Fault":"False","VS16911_Open":"False","VS16911_Close":"True","VS26911_Open":"False","VS26911_Close":"True","TS11021":"False","TS11011":"False","FS13011":"True","PS17011":"False","PS25011":"True","PS28011":"False","PS00811":"True","FS00411":"False","PS15021":"True","TS16011":"False","TS26011":"False","TS16111":"False","TS16211":"False","PK09411_Run":"False","PK09411_Fault":"False","E_Stop":"True","Power_Fault":"False","Operation_Selected":"False","LS11091":"False","LS11031":"False","LS11021":"False","LS11011":"False","PD09711_Run":"False","PK02411_Fault":"True","PK09711_Fault":"True","FS02321":"True","FS02221":"True","FS09721":"True","LS02411":"True","LS02421":"True","LS02431":"False","LS02491":"False","LS02221":"True","LS02211":"True","LS02231":"True","LS02241":"False","LS02291":"False","LS00101":"False","LS00111":"False","LS00131":"False","LS00191":"False","LS09711":"True","LS09721":"True","LS09731":"False","LS09791":"False","LS01211":"True","LS01311":"False","LS00211":"True","LR09311_Fault":"True","LR09311_Run":"True","PK02411_Run":"True","PK09711_Run":"True","PK02221_Run":"False","PC01211_Run":"False","PC01311_Run":"False","PD00111_Run":"True","PD00211_Run":"True","PD00411_Run":"True","VA09711_Open":"True","VA02311_Open":"False","VA12011_Open":"True","VA13011_Open":"True","VA13111_Open":"True","VA13151_Open":"False","VA13121_Open":"True","VA13081_Open":"False","VA13161_Open":"False","VA13811_Open":"False","VA16921_Open":"False","VA17011_Open":"True","VA17021_Open":"False","VA17031_Open":"True","VA18011_Open":"False","VA18021_Open":"False","VA21011_Open":"False","VA26921_Open":"False","VA27011_Open":"True","VA28011_Open":"True","VA28021_Open":"True","VA11011_Open":"False","VA11021_Open":"False","VA19411_Open":"False"}

mysqli_close($conn);
 

?>