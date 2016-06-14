<?php 
error_reporting(E_ALL);
include "../config.php";
// var_dump($baseurl);
if (isset($_POST['submit']) && $_POST['submit']=='login') {
	$email 		= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$password 	= filter_var($_POST['password'], FILTER_SANITIZE_STRING);

	$check = "SELECT * 
				FROM tbl_user 
			   WHERE 1 
			   AND email='".$email."' AND password=MD5('".$password."')";

	$result_check = fetchData('single',$check);
	// var_dump($result_check);
	if (!$result_check) 
	{
		$type = 'warning';
		$msg  = 'Email / Password Tidak Cocok !';
		$page = '../pages/login.php';

	}
	else
	{
		// die;
		$_SESSION['login']['user_id']	= $result_check->id;
		$_SESSION['login']['type'] 		= $result_check->type;
		$_SESSION['login']['email'] 	= $result_check->email;
		$_SESSION['login']['first_name']= $result_check->first_name;
		$_SESSION['login']['last_name'] = $result_check->last_name;
		$type = 'success';			
		$msg  = 'Selamat datang';
		$page = '../index.php';
	}

	set_alert($type, $msg);
	safe_redirect($page);

}

if (isset($_GET['action']) && $_GET['action']=='logout_user')  {
	
	unset($_SESSION['login']);
	$page = '../pages/login.php';
	set_alert('success', 'Anda Telah Logout !');
	safe_redirect($page);
}

?>