<?php 
include '../../config.php';
print_post();
// die;


if (isset($_POST['submit']) && $_POST['submit']=='stock_manager') {
	
	$id_product = $_POST['id_product'];
	$qty_product= $_POST['qty_product']; 
	$count_data = count($_POST['id_product']);

	for ($i=0; $i <$count_data ; $i++) { 
		// Validasi Apakah Inputan & id Product INTEGER 
		if (is_numeric($qty_product[$i]) && is_numeric($id_product[$i])) {
			// Cek Apakah id Product Tsb Ada di table product_stock
			$check_id_product = fetchData('single',"SELECT * FROM stock_product WHERE 1 AND id_product='".$id_product[$i]."'");
			// Jika Ada ,Maka Update
			if ($check_id_product) {
				$sql_update_stock = "UPDATE stock_product SET qty='".$qty_product[$i]."' WHERE 1 AND id_product='".$id_product[$i]."'";
				mysql_query($sql_update_stock);
			}
			else
			{
				$sql_insert_stock = "INSERT INTO stock_product(id_product,qty) VALUES('".$id_product[$i]."','".$qty_product[$i]."')";
				insert_data($sql_insert_stock);
			}
			// var_dump($check_id_product);
		}
	}
	safe_redirect('../stock_manager.php');

}

?>