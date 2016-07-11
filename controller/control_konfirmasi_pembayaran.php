<?php 
error_reporting(E_ALL);
include "../config.php";
// var_dump($baseurl);
print_post();

if (!empty($_POST)) {
	$order_id = $_POST['number'];
	$amount   = $_POST['amount'];	
	$akun_bank_customer = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	
	$sql_check_konfirmasi = "SELECT * FROM transaksi 			
								WHERE 1
								AND order_id='".$order_id."'
								AND grand_total='".$amount."'";
	$get_data = fetchData('single',$sql_check_konfirmasi);
	if ($get_data){
		$sql_konfirmasi_pembayaran = "UPDATE transaksi SET akun_bank_customer='".$akun_bank_customer."'
										WHERE 1
										AND order_id='".$order_id."'
										AND grand_total='".$amount."'";
		mysql_query($sql_konfirmasi_pembayaran);
		set_alert('success', 'Sukses');
	}						
}

$page = '../pages/konfirmasi_pembayaran.php';
safe_redirect($page);
?>