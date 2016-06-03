<?php 
$db_host = "localhost"; 
$db_name = "skripsi_ecommerce";
$db_user = "root";
$db_pass = "";

$link = @mysql_connect($db_host,$db_user,$db_pass);
$database = mysql_select_db($db_name,$link);
if (!$database) {
	die(mysql_errno()."-".mysql_error());
}
?>

