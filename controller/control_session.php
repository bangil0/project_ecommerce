<?php 
error_reporting(E_ALL);
include "../config.php";
$product_id = $_POST['product_id'] ;

// Validasi Add Product , Hapus Qty Product & kurangin qty belanja product 
if (isset($_POST['status']) && $_POST['status']=="add_product") {
	$qty = $_POST['qty'];
}
else if($_POST['status']=="remove_product"){
	$qty = -1;
}
else{
	var_dump("sam");
	$qty = '-'.$_POST['qty'];
}

var_dump($qty);
if ($product_id!="" && $qty!="") {
	$sql_get_product = "SELECT * FROM product p WHERE 1
						AND p.`id`='".$product_id."'";
	$data_product = fetchData('single',$sql_get_product);
	// var_dump($data_product);
	// die;
	$key_session_cart = search_array_cart($_SESSION['cart'],$product_id);
	// var_dump($key_session_cart);
	// die;
	if (!empty($data_product)) {
		// Jika Product Sebelumnya tidak ada di Session Maka di Add ke Session
		if (!is_int($key_session_cart)) {
			$_SESSION['cart'][] = array(
										"product_id"=>$product_id,
										"nama_product"=>$data_product->nama_product,
										"selling_price"=>$data_product->selling_price,
										"qty"=>$qty,
										"subtotal"=>$qty*$data_product->selling_price
										); 
		}
		// Jika Tidak Maka Session Di edit
		else
		{
			$_SESSION['cart'][$key_session_cart] = array(
															"product_id"=>$product_id,
															"nama_product"=>$data_product->nama_product,
															"selling_price"=>$data_product->selling_price,
															"qty"=>$_SESSION['cart'][$key_session_cart]['qty']+$qty,
															"subtotal"=>($_SESSION['cart'][$key_session_cart]['qty']+$qty)*$data_product->selling_price
														);
		}
	}
	validate_empty_cart();
	// var_dump($_SESSION);

}


function validate_empty_cart()
{
	if (!empty($_SESSION['cart'])) {
		foreach ($_SESSION['cart'] as $key => $value) {
			if ($value['qty']<=0) {
				unset($_SESSION['cart'][$key]);
			}
		}
	}
	// die;
}


function search_array_cart($data_array,$search_value){
	$key_array = false;
	foreach ($data_array as $key => $value) {
		$key_array = array_search($search_value, $value);
		if ($key_array) {
			$key_array = $key;
			return $key_array;
			die;
		}
	}
}

?>