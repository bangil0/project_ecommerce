<?php 
include '../../config.php';
print_post();

if (!empty($_POST)) {
	$id_destination 	= $_POST['id_destination'];
	$biaya_pengiriman	= $_POST['biaya_pengiriman']; 
	$count_data 		= count($_POST['id_destination']);

	for ($i=0; $i <$count_data ; $i++) { 
		// Validasi Apakah Inputan & id Product INTEGER 
		if (is_numeric($biaya_pengiriman[$i]) && is_numeric($id_destination[$i])) {
			// Cek Apakah id Product Tsb Ada di table product_stock
			$check_id = fetchData('single',"SELECT * FROM tbl_city WHERE 1 AND id='".$id_destination[$i]."'");
			// Jika Ada ,Maka Update
			if ($check_id) {
				$sql_update_stock = "UPDATE tbl_city SET cost='".$biaya_pengiriman[$i]."' WHERE 1 AND id='".$id_destination[$i]."'";
				mysql_query($sql_update_stock);
			}
			else
			{
				$sql_insert_stock = "INSERT INTO tbl_city(id,cost) VALUES('".$id_destination[$i]."','".$biaya_pengiriman[$i]."')";
				insert_data($sql_insert_stock);
			}
			// var_dump($check_id);
		}
	}
	safe_redirect('../master_biaya_pengiriman.php');

}

?>