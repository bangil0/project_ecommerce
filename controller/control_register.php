<?php 
include "../config.php";
// var_dump($baseurl);
// print_post();
if (isset($_POST['submit']) && $_POST['submit']=='register') {
	// echo "string";
	$first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
	$last_name  = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
	$email 		= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$password 	= filter_var($_POST['password'], FILTER_SANITIZE_STRING);


	$check = "SELECT * 
				FROM tbl_user 
			   WHERE 1 
			   AND email='".$email."'";
	$result_check = fetchData('single',$check);
	// var_dump($result_check);
	// echo count($result_check);
				   
	$que = "INSERT INTO tbl_user(email,first_name,last_name,password) VALUES ('".$email."','".$first_name."','".$last_name."',MD5('".$password."'))";
	// var_dump($que);
	if (!$result_check) 
	{
		insert_data($que);
		$type = 'success';
		$msg  = 'successfully saved';
		$page = '../pages/login.php';

	}
	else
	{
		$type = 'warning';
		$msg  = 'Email Already Taken';
		$page = '../pages/register.php';
	}

	set_alert($type, $msg);
	safe_redirect($page);

}

?>