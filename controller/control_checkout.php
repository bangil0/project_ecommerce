<?php 
include "../config.php";
// var_dump($_SESSION);

// var_dump($_SESSION['cart']);
// var_dump($_SESSION['login']);
// print_post();
// die;

if (empty($_SESSION['cart'])){
	set_alert('danger', 'Your cart Is Empty');
	safe_redirect('shopping-cart.php');
}
if (empty($_SESSION['login'])) {
	set_alert('danger', 'You must be Login');
	safe_redirect('login.php');	
}
// 
// 
// Jika Baru pertama kali akses ke halaman Checkout Maka data di Session di insert ke Session 
if (!isset($_SESSION['order_id'])) {
	$grand_total_transaksi = 0 ;
	// var_dump(count($_SESSION['cart']));
	// die;
	$get_last_order_id = fetchData('single',"SELECT max(order_id) AS last_order FROM transaksi");

	if ($get_last_order_id->last_order==NULL) {
		$get_last_order_id = 1;
	}
	else
	{
		$get_last_order_id = $get_last_order_id->last_order+1;
	}
	// var_dump($get_last_order_id);
	// Hitung Grand Total Dari Session
	foreach ($_SESSION['cart'] as $key => $value) {	
		$grandTotal += $value['subtotal'];
	}
	$que_table_transaksi = "INSERT INTO transaksi(order_id,user_id,total_belanja,grand_total) VALUES ('".$get_last_order_id."','".$_SESSION['login']['user_id']."','".$grandTotal."','".$grandTotal."')";
	insert_data($que_table_transaksi);

	// Insert Table Transaksi Detail
	foreach ($_SESSION['cart'] as $key => $value) {	

		$que_table_transaksi_detail = "INSERT INTO transaksi_detail(order_id,product_id,qty,buying_price) VALUES ('".$get_last_order_id."','".$value['product_id']."','".$value['qty']."','".$value['selling_price']."') ";
		insert_data($que_table_transaksi_detail);
	}
	// var_dump($grandTotal);

	$_SESSION['order_id'] = $get_last_order_id;

}

if (isset($_POST['btn_submit_checkout']) && $_POST['btn_submit_checkout']=='Next') {
	echo "string";

	$order_ship_fname 	= filter_var($_POST['checkout_user_fname'], FILTER_SANITIZE_STRING);
	$order_ship_lname 	= filter_var($_POST['checkout_user_lname'], FILTER_SANITIZE_STRING);
	$order_ship_phone 	= filter_var($_POST['checkout_user_phone'], FILTER_SANITIZE_STRING);
	$order_ship_address = filter_var($_POST['checkout_user_address'], FILTER_SANITIZE_STRING);
	$order_ship_city 	= filter_var($_POST['checkout_user_city'], FILTER_SANITIZE_STRING);
	$order_ship_postal 	= filter_var($_POST['checkout_user_postal'], FILTER_SANITIZE_STRING);

	$get_cost_shipping = fetchData('single',"SELECT * FROM tbl_city WHERE 1 AND id='".$order_ship_city."'");
	
	$que_shipping = "INSERT INTO tbl_shipping (order_id,city_id,first_name,last_name,phone,address,postal_code,cost_shipping) 
						VALUES ('".$_SESSION['order_id']."','".$order_ship_city."','".$order_ship_fname."','".$order_ship_lname."',
								'".$order_ship_phone."','".$order_ship_address."','".$order_ship_postal."','".$get_cost_shipping->cost."')";
	
	insert_data($que_shipping);

	$que_get_last_shipping_id = fetchData("single","SELECT MAX(id) AS last_shipping FROM tbl_shipping");

	// if ($que_get_last_shipping_id->last_shipping==NULL) {
	// 	$que_get_last_shipping_id = 1;
	// }
	// else
	// {
	// 	$que_get_last_shipping_id = $que_get_last_shipping_id->last_shipping+1;
	// }
	// var_dump($que_get_last_shipping_id);
	$que_get_transaksi = fetchData('single',"SELECT * FROM transaksi WHERE order_id='".$_SESSION['order_id']."'");
	// var_dump($que_get_transaksi);
	var_dump($get_cost_shipping->cost+$que_get_transaksi->total_belanja);
	$sum_shipping_belanja = $get_cost_shipping->cost+$que_get_transaksi->total_belanja;
	$que_update_transaksi = "UPDATE transaksi SET total_shipping='".$get_cost_shipping->cost."',
								grand_total='".$sum_shipping_belanja."',shipping_id='".$que_get_last_shipping_id->last_shipping."',status='checkout' 
							 WHERE 1
							 AND order_id='".$_SESSION['order_id']."'";
								// var_dump($que_update_transaksi);
								// die;
	// var_dump(mysql_query($que_update_transaksi));
	mysql_query($que_update_transaksi);

	$_SESSION['order_number'] = $_SESSION['order_id'];
	unset($_SESSION['order_id']);
	unset($_SESSION['cart']);								
	safe_redirect('../pages/finish.php');


}


if (isset($_POST['payment_shipping'])){ 
	$get_shipping_cost = "SELECT * FROM tbl_city WHERE 1 AND id='".$_POST['payment_shipping']."' ";
	$data_shipping = fetchData('single',$get_shipping_cost); 
	// var_dump($data_shipping);
	// die;
	header('Content-Type: application/json');
	echo json_encode($data_shipping);
}
?>