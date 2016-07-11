<?php 
include '../../config.php';
if (!empty($_POST['order_id'])) {
	$sql_update_status_transaksi = "UPDATE transaksi SET status='paid' WHERE 1 AND order_id='".$_POST['order_id']."'";
	mysql_query($sql_update_status_transaksi);
}
safe_redirect('../report_orders.php');
?>