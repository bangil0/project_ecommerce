<?php 
// echo basename($_SERVER['PHP_SELF'])=='home.php'?'active':'bukan';

// var_dump(basename($_SERVER['PHP_SELF']));
 ?>
<html>
<head>
<title>Best Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Best Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="<?php echo $baseurl ?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $baseurl ?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="<?php echo $baseurl ?>js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->
<script src="<?php echo $baseurl ?>js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="<?php echo $baseurl ?>js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<!-- <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'> -->
<!-- <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'> -->
<!-- timer -->
<link rel="stylesheet" href="<?php echo $baseurl ?>css/jquery.countdown.css" />
<!-- //timer -->
<!-- animation-effect -->
<link href="<?php echo $baseurl ?>css/animate.min.css" rel="stylesheet"> 
<script src="<?php echo $baseurl ?>js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
</head>
	
<body>
<!-- header -->
	<div class="header">
		<div class="container">
			<div class="header-grid">
				<div class="header-grid-left animated wow slideInLeft" data-wow-delay=".5s">
					<ul>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="<?php echo $baseurl ?>mailto:info@example.com">@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 892</li>

						<?php if (isset($_SESSION['login'])): ?>
								<li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="#">Welcome, <?php echo $_SESSION['login']['first_name'] ?></a></li>
							<?php else: ?>
								<li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="<?php echo $baseurl."pages/" ?>login.php">Login</a></li>
								<li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="<?php echo $baseurl."pages/" ?>register.php">Register</a></li>
							<?php endif ?>	
					</ul>
				</div>
				<div class="header-grid-right animated wow slideInRight" data-wow-delay=".5s">
					<ul class="social-icons">
						<li><a href="<?php echo $baseurl ?>#" class="facebook"></a></li>
						<li><a href="<?php echo $baseurl ?>#" class="twitter"></a></li>
						<li><a href="<?php echo $baseurl ?>#" class="g"></a></li>
						<li><a href="<?php echo $baseurl ?>#" class="instagram"></a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="logo-nav">
				<div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
					<h1><a href="<?php echo $baseurl ?>index.php">Best Store <span>Shop anywhere</span></a></h1>
				</div>
				<div class="logo-nav-left1">
					<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div> 
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav">
							<li class="<?php echo basename($_SERVER['PHP_SELF'])=='index.php'?'active':'' ?>"><a href="<?php echo $baseurl ?>index.php" class="act">Home</a></li>	
							<!-- Mega Menu -->
							 <li class="dropdown active">
								<a href="<?php echo $baseurl ?>#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<div class="row">
										<div class="col-sm-12">
											<ul class="multi-column-dropdown">
												<h6>List Of Product</h6>
												<?php if (!empty($list_category_product)): ?>
													<?php foreach ($list_category_product as $key => $value): ?>
																<li><a href="<?php echo $baseurl ?>product.php?product_category=<?php echo $value->id  ?>"><?php echo $value->name_category ?></a></li>
													<?php endforeach ?>
												<?php endif ?>
											</ul>
										</div>
										<div class="clearfix"></div>
									</div>
								</ul>
							</li>
							<li class="dropdown">
								<a href="<?php echo $baseurl ?>#" class="dropdown-toggle" data-toggle="dropdown">Furniture <b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<div class="row">
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<h6>Home Collection</h6>
												<li><a href="<?php echo $baseurl ?>furniture.html">Cookware</a></li>
												<li><a href="<?php echo $baseurl ?>furniture.html">Sofas</a></li>
												<li><a href="<?php echo $baseurl ?>furniture.html">Dining Tables</a></li>
												<li><a href="<?php echo $baseurl ?>furniture.html">Shoe Racks</a></li>
												<li><a href="<?php echo $baseurl ?>furniture.html">Home Decor</a></li>
											</ul>
										</div>
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<h6>Office Collection</h6>
												<li><a href="<?php echo $baseurl ?>furniture.html">Carpets</a></li>
												<li><a href="<?php echo $baseurl ?>furniture.html">Tables</a></li>
												<li><a href="<?php echo $baseurl ?>furniture.html">Sofas</a></li>
												<li><a href="<?php echo $baseurl ?>furniture.html">Shoe Racks</a></li>
												<li><a href="<?php echo $baseurl ?>furniture.html">Sockets</a></li>
												<li><a href="<?php echo $baseurl ?>furniture.html">Electrical Machines</a></li>
											</ul>
										</div>
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<h6>Decorations</h6>
												<li><a href="<?php echo $baseurl ?>furniture.html">Toys</a></li>
												<li><a href="<?php echo $baseurl ?>furniture.html">Wall Clock</a></li>
												<li><a href="<?php echo $baseurl ?>furniture.html">Lighting</a></li>
												<li><a href="<?php echo $baseurl ?>furniture.html">Top Brands</a></li>
											</ul>
										</div>
										<div class="clearfix"></div>
									</div>
								</ul>
							</li>
							<li class="active"><a href="<?php echo $baseurl ?>short-codes.html">Short Codes</a></li>
							<li><a href="<?php echo $baseurl ?>mail.html">Mail Us</a></li>
						</ul>
					</div>
					</nav>
				</div>
				<div class="logo-nav-right">
					<div class="search-box">
						<div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Enter your search term..." type="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"> </span>
							</form>
						</div>
					</div>
						<!-- search-scripts -->
						<script src="<?php echo $baseurl ?>js/classie.js"></script>
						<script src="<?php echo $baseurl ?>js/uisearch.js"></script>
							<script>
								new UISearch( document.getElementById( 'sb-search' ) );
							</script>
						<!-- //search-scripts -->
				</div>
				<div class="header-right">
					<div class="cart box_1">
						<a href="<?php echo $baseurl ?>pages/shopping-cart.php">
							<h3> <div class="total">
								<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
								<img src="<?php echo $baseurl ?>images/bag.png" alt="" />
							</h3>
						</a>
						<p><a href="<?php echo $baseurl ?>javascript:;" class="simpleCart_empty"></a></p>
						<div class="clearfix"> </div>
					</div>	
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //header -->