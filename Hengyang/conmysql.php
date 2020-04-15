<?php

$dbname = "dtro";
$servername = "localhost";
$username = "php";
$password = "111111";
$project = substr(str_ireplace(dirname(dirname(__FILE__)),"",dirname(__FILE__)),1);
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// 检测连接
if (!$conn) {
//    die("连接失败: " . mysqli_connect_error());
}
else {
//	echo "连接成功<br>";
}

?>