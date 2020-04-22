<?php
$name = isset($_POST["Start_Time"]) ? htmlspecialchars($_POST["Start_Time"]) : '';
//$url = isset($_POST['url']) ? htmlspecialchars($_POST['url']) : '';
echo '网站名: ' . $name;
echo "<br>";
//echo 'URL 地址: ' .$url;
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

echo $s1;

?>