<?php 
include '../../config.php';
// print_post();

if (isset($_POST['submit']) && $_POST['submit']=='login') {
	echo "string";
	$email 		= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$password 	= filter_var($_POST['password'], FILTER_SANITIZE_STRING);

	$check = "SELECT * 
				FROM tbl_user 
			   WHERE 1 
			   AND email='".$email."' AND password=MD5('".$password."') AND type='admin'";

	$result_check = fetchData('single',$check);
	// var_dump($result_check);
	// die;
	if (!$result_check) 
	{
		$type = 'warning';
		$msg  = 'Email / Password Invalid';
		$page = '../login.php';

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
		$msg  = 'Welcome';
		$page = '../index.php';
	}

	set_alert($type, $msg);
	safe_redirect($page);

}

?>