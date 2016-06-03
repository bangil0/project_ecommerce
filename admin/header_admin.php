<?php include "../config.php"; ?>
<?php include "header.php"; ?>
<?php 
	$check_user = in_array("admin", $_SESSION['login']);
	if (!$check_user) {
		$type = 'warning';
		$msg  = 'You Dont Have Access Here !';
		$page = 'login.php';
		safe_redirect($page);
	}
?>