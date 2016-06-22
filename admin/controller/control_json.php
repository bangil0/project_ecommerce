<?php 
include '../../config.php';

if (isset($_GET['order_id']) && isset($_GET['report'])) {
	
		header("content-type:application/json");
		$data = fetchData('multiple',"SELECT *,SUM(qty*trd.`buying_price`) AS subtotal,tr.`created_timestamp` AS created_transaksi,tr.`order_id` AS order_id
							FROM transaksi_detail trd 
							JOIN transaksi tr ON trd.`order_id`=tr.`order_id`
							LEFT JOIN tbl_shipping ts ON ts.`order_id`=tr.`order_id`
							JOIN tbl_user u ON tr.`user_id`=u.`id`
							JOIN product p ON p.`id`=trd.`product_id`
							WHERE 1
							AND trd.`order_id`='".$_GET['order_id']."'
							GROUP BY trd.`order_id`,trd.`product_id`");
		echo json_encode($data);
}



?>