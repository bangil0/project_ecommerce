<?php 
include "../config.php";
// var_dump($_POST);
// var_dump($_SESSION['login']);
// print_post();
// die;

if (empty($_SESSION['login'])){
	set_alert('danger', 'Silahkan Login Terlebih Dahulu !');
	safe_redirect('../product_review.php');
	die;
}

if (isset($_POST['submit']) && $_POST['submit']=='submit') {
	
	$id_product  	= filter_var($_POST['id_product'], FILTER_SANITIZE_STRING);
	$id_user  		= filter_var($_POST['id_user'], FILTER_SANITIZE_STRING);
	$review_detail 	= filter_var($_POST['review_detail'], FILTER_SANITIZE_STRING);

	$insert_product_review = "INSERT INTO product_review(id_product,id_user,review_detail) VALUES ('".$id_product."','".$id_user."','".$review_detail."') ";
	insert_data($insert_product_review);
	$type 	= "success";
	$msg 	= "Add Product Review Success";
}

set_alert($type, $msg);
safe_redirect("../product_review.php?id_product=$id_product");

?>