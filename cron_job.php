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

function fetchData($type, $sql){
  if($type === 'single'){
     $query	= mysql_query($sql);
	 $row = mysql_fetch_object($query);
  }else if($type === 'multiple'){
     $query	= mysql_query($sql);
     $row	= array();
     while($result = mysql_fetch_object($query)){
        array_push($row, $result);
	 }
  }
  return $row;
  
}

function execute_checkout_to_cancel(){
	$sql = "SELECT *
			FROM transaksi t
			JOIN transaksi_detail td ON t.`order_id`=td.`order_id`
			WHERE 1
			AND t.`status`='checkout'
			AND TIMESTAMPDIFF(SECOND,t.`checkout_timestamp`,CURRENT_TIME)>=300";
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