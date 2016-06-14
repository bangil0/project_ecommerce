<?php 

error_reporting(E_ALL);
require '../config.php';
include "../header.php"; 
// var_dump($_SESSION);
// die;

?>
<!-- breadcrumbs -->

<?php
show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
unset($_SESSION['alert']);
?>
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="<?php echo BASE_URL."index.php" ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Login Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Login Form</h3>
			<p class="est animated wow zoomIn" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
				deserunt mollit anim id est laborum.</p>
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form action="<?php echo $baseurl."controller/control_login.php" ?>" method="POST">
					<input type="email" placeholder="Email Address" required=" " name="email" >
					<input type="password" placeholder="Password" required=" " name="password">
					<div class="forgot">
						<a href="#">Forgot Password?</a>
					</div>
					<input type="submit" value="login" name="submit">
				</form>
			</div>
			<h4 class="animated wow slideInUp" data-wow-delay=".5s">For New People</h4>
			<p class="animated wow slideInUp" data-wow-delay=".5s"><a href="register.php">Register Here</a> (Or) go back to <a href="<?php echo $baseurl ?>">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>

<?php include "../footer.php"; ?>