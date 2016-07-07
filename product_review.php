<?php 
include 'config.php';
include "header.php";
?>
<?php
show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
unset($_SESSION['alert']);

$id_product = filter_var($_GET['id_product'], FILTER_SANITIZE_STRING);

$get_product = fetchData('single',"SELECT * FROM product WHERE 1
										AND product_visibility=1 AND id='".$id_product."' ");
if ($get_product) 
{
	$product_review = fetchData('multiple',"SELECT * FROM product_review pr 
												JOIN tbl_user tu ON tu.`id`=pr.`id_user`
												WHERE 1
												AND id_product='".$id_product."'");	
}
else
{
	safe_redirect('product.php');
}
?>
<!-- //header -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="<?php echo BASE_URL."index.php" ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Product Review</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- single -->
	<div class="single">
		<div class="container">

								<!-- <div class="thumb-image"> <img src="<?php echo BASE_URL."product_images/".$get_product->image ?>" data-imagezoom="true" class="img-responsive"> </div> -->

			<div class="col-md-12 single-right">
				<div class="col-md-5 single-right-left animated wow slideInUp" data-wow-delay=".5s">
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="images/si2.jpg">
								<div class="thumb-image"> <img src="<?php echo BASE_URL."product_images/".$get_product->image ?>" data-imagezoom="true" class="img-responsive"> </div> 
							</li> 
						</ul>
					</div>
					<!-- flixslider -->
						<script defer src="js/jquery.flexslider.js"></script>
						<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
						<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
						</script>
					<!-- flixslider -->
				</div>
				<div class="col-md-7 single-right-left simpleCart_shelfItem animated wow slideInRight" data-wow-delay=".5s">
					<h3><?php echo $get_product->nama_product." - ".$get_product->merk ?></h3>
					<h4><span class="item_price"><b>IDR</b> <?php echo $get_product->selling_price ?></span></h4>

					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
							<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Reviews(2)</a></li>
							<li role="presentation" class="dropdown">
								<a href="#" id="myTabDrop1" class="dropdown-toggle hidden" data-toggle="dropdown" aria-controls="myTabDrop1-contents">Information <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
									<li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">cleanse</a></li>
									<li><a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">fanny</a></li>
								</ul>
							</li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
								<h5>Product Brief Description</h5>
								<p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.
									<span>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>
							</div>
							<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
								<div class="bootstrap-tab-text-grids">

							<?php if (!empty($product_review)): ?>
								<?php foreach ($product_review as $key => $value): ?>
									<div class="bootstrap-tab-text-grid">
										<div class="bootstrap-tab-text-grid-left">
											<img src="images/4.png" alt=" " class="img-responsive" />
										</div>
												<div class="bootstrap-tab-text-grid-right">
													<ul>
														<li><a href="#"><?php echo $value->first_name ?></a></li>
														<li><a href="#"><span class="glyphicon glyphicon-time" aria-hidden="true"></span><?php echo $value->created_timestamp ?></a></li>
													</ul>
													<?php echo $value->review_detail ?>
												</div>
										<div class="clearfix"> </div>
									</div>
								<?php endforeach ?>
							<?php else: ?>
								Empty Review
							<?php endif ?>
									<div class="add-review">
										<h4>add a review</h4>
										<form class="form-horizontal" method="post" action="<?php echo $baseurl ?>controller/control_product_review.php">
											<input type="hidden" name="id_product" value="<?php echo $id_product ?>">
											<input type="hidden" name="id_user" value="<?php echo $_SESSION['login']['user_id'] ?>">
											<textarea type="text"  name="review_detail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
											<input type="submit" name="submit" value="<?php echo empty($_SESSION['login']['user_id'])?'Login Dahulu':'submit' ?>" <?php echo empty($_SESSION['login']['user_id'])?'disabled':'' ?> >
										</form>
									</div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="dropdown1" aria-labelledby="dropdown1-tab">
								<p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
							</div>
							<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="dropdown2" aria-labelledby="dropdown2-tab">
								<p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
							</div>
						</div>
					</div>



				</div>
				<div class="clearfix"> </div>
				<div class="bootstrap-tab animated wow slideInUp" data-wow-delay=".5s">
					


				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>




<?php 
	include "footer.php";
?>

<script src="js/imagezoom.js"></script>