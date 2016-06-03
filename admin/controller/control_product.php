<?php 
ini_set("display_errors", 1);
error_reporting(E_ALL);
include "../../config.php";
// print_post();
// print_r($_FILES);

$category_product 	= $_POST['category_product'];
$kode_product 		= $_POST['kode_product'];
$merk_product 		= $_POST['merk_product'];
$nama_product 		= $_POST['nama_product'];
$description_product   = $_POST['description_product'];
$selling_price_product = $_POST['selling_price_product'];


if (isset($_POST['submit']) && $_POST['submit']=='add_product') {
	$image ='';

	if (!empty($_FILES['foto_product'])) {
		echo getcwd()."<br>";
		echo BASE_URL;
		$check_upload_file = move_uploaded_file($_FILES['foto_product']['tmp_name'],'../../product_images/'.$_FILES['foto_product']['name']);
		if ($check_upload_file) {
			$image = $_FILES['foto_product']['name'];
		}
		var_dump($check_upload_file);
	}
		$sql_insert_product = "INSERT INTO product(id_category,kode_product,nama_product,merk,image,description_product,selling_price) 
								VALUES('".$category_product."','".$kode_product."','".$nama_product."','".$merk_product."','".$image."','".$description_product."','".$selling_price_product."')";
		insert_data($sql_insert_product);
}

if (isset($_GET['delete_product']) && $_GET['delete_product']!='') {
	$id_product = $_GET['delete_product'];
	$sql_update_product = "UPDATE product SET product_visibility='2' WHERE id='".$id_product."'";	
	mysql_query($sql_update_product);
}

safe_redirect('../master_product.php');
// die;

?>