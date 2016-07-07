<?php 
include 'config.php';

function execute_checkout_to_cancel(){
	$sql = "SELECT *
			FROM transaksi t
			JOIN transaksi_detail td ON t.`order_id`=td.`order_id`
			WHERE 1
			AND t.`status`='checkout'
			AND TIMESTAMPDIFF(SECOND,t.`checkout_timestamp`,CURRENT_TIME)>=2000";
	$data_canceled = fetchData('multiple', $sql);
	return $data_canceled;
}



$data_canceled = execute_checkout_to_cancel();
var_dump($data_canceled);

if (!empty($data_canceled)) {
	foreach ($data_canceled as $key => $value) {
		$sql_update_transaksi = "UPDATE transaksi SET status='canceled' WHERE 1
									AND order_id='".$value->order_id."'";	
		mysql_query($sql_update_transaksi);
		if (!empty($value->product_id)) {
			$sql_return_stock = "UPDATE stock_product SET qty=qty+'".$value->qty."' WHERE 1
									AND id_product='".$value->product_id."' ";
			mysql_query($sql_return_stock);								
		}
	}
}
// mysql_query()

?>