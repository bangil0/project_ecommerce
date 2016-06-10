<?php 
include 'config.php';
include "header.php";
?>
<?php
show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
unset($_SESSION['alert']);
// var_dump($_SESSION);
?>

<!-- cart -->
	<script src="js/simpleCart.min.js"> </script>
<!-- cart -->
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">

<script src="<?php echo $baseurl ?>js/simpleCart.min.js"> </script>
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Products</li>
			</ol>
		</div>
	</div>
	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">

				<div class="categories animated wow slideInUp" data-wow-delay=".5s">
					<h3>Categories</h3>
					<ul class="cate">
						<?php if (!empty($list_category_product)): ?>
							<?php foreach ($list_category_product as $key => $value): ?>
										<li><a href="<?php echo $baseurl ?>product.php?product_category=<?php echo $value->id  ?>"><?php echo $value->name_category ?></a></li>
							<?php endforeach ?>
						<?php endif ?>					
					</ul>
				</div>
			</div>
			<div class="col-md-8 products-right">
				<div class="products-right-grid">
					<div class="products-right-grids animated wow slideInRight" data-wow-delay=".5s">
						<div class="sorting">
							<select id="country" onchange="change_country(this.value)" class="frm-field required sect">
								<option value="null">Default sorting</option>
								<option value="null">Sort by popularity</option> 
								<option value="null">Sort by average rating</option>					
								<option value="null">Sort by price</option>								
							</select>
						</div>
						<div class="sorting-left">
							<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
								<option value="null">Item on page 9</option>
								<option value="null">Item on page 18</option> 
								<option value="null">Item on page 32</option>					
								<option value="null">All</option>								
							</select>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="right-grids-position animated wow slideInRight" data-wow-delay=".5s">
						<img src="images/atk.png" alt=" " class="img-responsive" />
						<div class="products-right-grids-position1">
							<h4>2016 New Collection</h4>
						</div>
					</div>
				</div>
				<div class="products-right-grids-bottom">
					<?php if (!empty($list_product)): ?>
						<?php foreach ($list_product as $key => $value): ?>
							<div class="col-md-4 products-right-grids-bottom-grid">
								<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
									<div class="new-collections-grid1-image">
										<a href="<?php echo BASE_URL ?>product_review.php?id_product=<?php echo $value->id ?>" class="product-image">
										<?php if (!empty($value->image)): ?>
											<img src="<?php echo BASE_URL."product_images/".$value->image ?>" alt=" " class="img-responsive" style="min-height:200px"></a>
										<?php else: ?>
											<img src="<?php echo BASE_URL."product_images/product_picture_empty.png" ?>" alt=" " class="img-responsive" style="min-height:200px"></a>
										<?php endif ?>

										<div class="new-collections-grid1-image-pos products-right-grids-pos">
											<a href="<?php echo BASE_URL ?>product_review.php?id_product=<?php echo $value->id ?>">Product Review</a>
										</div>
										<div class="new-collections-grid1-right products-right-grids-pos-right">
											<div class="rating">
												<div class="rating-left">
													<img src="images/2.png" alt=" " class="img-responsive">
												</div>
												<div class="rating-left">
													<img src="images/2.png" alt=" " class="img-responsive">
												</div>
												<div class="rating-left">
													<img src="images/2.png" alt=" " class="img-responsive">
												</div>
												<div class="rating-left">
													<img src="images/1.png" alt=" " class="img-responsive">
												</div>
												<div class="rating-left">
													<img src="images/1.png" alt=" " class="img-responsive">
												</div>
												<div class="clearfix"> </div>
											</div>
										</div>
									</div>
									<h4><a href="<?php echo BASE_URL ?>product_review.php?id_product=<?php echo $value->id ?>?id_product=<?php echo $value->id ?>"><?php echo $value->nama_product; ?></a></h4>
									<p>Vel illum qui dolorem.</p>
									<div class="simpleCart_shelfItem products-right-grid1-add-cart">
										<p><span class="item_price">IDR <?php echo $value->selling_price ?></span><a class="item_add add_cart" href="#">add to cart<button style="display:none" value="<?php echo $value->id ?>" class="add_cart_id"></button></a></p>
									</div>
								</div>
							</div>
						<?php endforeach ?>						
					<?php endif ?>


					<div class="clearfix"> </div>
				</div>
				<nav class="numbering animated wow slideInRight" data-wow-delay=".5s">
				  <ul class="pagination paging">
					<li>
					  <a href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					  </a>
					</li>
					<li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li>
					  <a href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					  </a>
					</li>
				  </ul>
				</nav>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //breadcrumbs -->

<script src="<?php echo $baseurl ?>js/add-cart.js"> </script>
<?php 
include "footer.php";
?>