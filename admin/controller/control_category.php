<?php 
include '../../config.php';
print_post();

// INSERT & UPDATE
if (isset($_POST['submit']) && $_POST['submit']=='add_category') {

	$id_category 			= $_POST['id_category'];
	$nama_product_category  = filter_var($_POST['nama_product_category'], FILTER_SANITIZE_STRING);
	$visibility 			= filter_var($_POST['visibility'], FILTER_SANITIZE_NUMBER_INT);

	if ($id_category=='')
	{
		echo "INSERT";
		// die;
		$sql_insert_product_category = "INSERT INTO product_category(name_category,category_visibility) VaLUES ('".$nama_product_category."','".$visibility."')";
		insert_data($sql_insert_product_category);
	}
	else
	{
		$sql_update_product_category = "UPDATE product_category SET name_category='".$nama_product_category."',category_visibility='".$visibility."' WHERE id='".$id_category."'";
		echo "UPDATE";
		var_dump($sql_update_product_category);
		// die;
		mysql_query($sql_update_product_category);
	}


}

// DELETE CATEGORY
// 

if (isset($_GET['delete_category_product']) && $_GET['delete_category_product']!='') {
	$id_category = $_GET['delete_category_product'];
	$sql_update_product_category = "UPDATE product_category SET category_visibility='2' WHERE id='".$id_category."'";	
	mysql_query($sql_update_product_category);
}

	safe_redirect('../master_product_category.php');
?>