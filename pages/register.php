<?php 
include "../controller/control_register.php";
include "../header.php"; 
?>

<?php
show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
unset($_SESSION['alert']);
?>
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="<?php echo BASE_URL."index.php" ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Register Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Register Here</h3>
			<p class="est animated wow zoomIn" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
				deserunt mollit anim id est laborum.</p>
			<div class="login-form-grids">
				<h5 class="animated wow slideInUp" data-wow-delay=".5s">profile information</h5>
				<form class="animated wow slideInUp" data-wow-delay=".5s" method="POST"  action="<?php echo $baseurl."controller/control_register.php" ?>">
					<input type="text" placeholder="First Name..." required=" " name="first_name" >
					<input type="text" placeholder="Last Name..." required=" " name="last_name">
				<div class="register-check-box animated wow slideInUp" data-wow-delay=".5s">
					<div class="check hidden">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Subscribe to Newsletter</label>
					</div>
				</div>
				<h6 class="animated wow slideInUp" data-wow-delay=".5s">Login information</h6>
					<input type="email" placeholder="Email Address" required="" name="email" >
					<input type="password" placeholder="Password" required=" " name="password" >
					<!-- <input type="password" placeholder="Password Confirmation" required=" " class="hidden" > -->
					<div class="register-check-box">
						<div class="check">
							<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>I accept the terms and conditions</label>
						</div>
					</div>
					<input type="submit" value="register" name="submit">
				</form>
			</div>
			<div class="register-home animated wow slideInUp" data-wow-delay=".5s">
				<a href="<?php echo $baseurl ?>">Home</a>
			</div>
		</div>
	</div>

<?php include "../footer.php"; ?>