<?php 
require('../config.php');
include "../header.php"; 
?>
<?php
show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
unset($_SESSION['alert']);
?>

<!-- cart -->
	<script src="<?php echo $baseurl?>js/simpleCart.min.js"> </script>
<!-- cart -->
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">

<script src="<?php echo $baseurl?><?php echo $baseurl ?>js/simpleCart.min.js"> </script>

<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Checkout Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<h3 class="animated wow slideInLeft" data-wow-delay=".5s">Your shopping cart contains: <span><?php echo count($_SESSION['cart']) ?></span></h3>
			<div class="checkout-right animated wow slideInUp" data-wow-delay=".5s">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product</th>
							<th>Quality</th>
							<th>Product Name</th>
							<th>Price</th>
							<th>Remove</th>
						</tr>
					</thead>
					<?php if (!empty($_SESSION['cart'])): ?>
							<?php foreach (array_values($_SESSION['cart']) as $key => $value): ?>
								<tr class="rem<?php echo $value['product_id'] ?>">
									<td class="invert"><?php echo $key+1 ?></td>
									<?php 
										if ($value['product_image']=="") {
											$product_image = "product_picture_empty.png";
										} 
										else{
											$product_image = $value['product_image'];
										}
									?>
									<td class="invert-image"><a href="single.html"><img src="<?php echo $baseurl.'product_images/'.$product_image?>" alt=" " class="img-responsive" /></a></td>
									<td class="invert">
										 <div class="quantity"> 
											<div class="quantity-select">                           
												<div class="entry value-minus" data-id="<?php echo $value['product_id'] ?>">&nbsp;</div>
												<div class="entry value"><span><?php echo $value['qty'] ?></span></div>
												<div class="entry value-plus active" data-id="<?php echo $value['product_id'] ?>">&nbsp;</div>
											</div>
										</div>
									</td>
									<td class="invert"><?php echo $value['nama_product'] ?></td>
									<td class="invert"><?php echo $value['selling_price'] ?></td>
									<td class="invert">
										<div class="rem">
											<div class="close<?php echo $value['product_id'] ?> close">
												<button class="hidden" value="<?php echo $value['product_id'] ?>"></button>
											</div>
										</div>
										<script>
										$(document).ready(function(c) {
												$('.close<?php echo $value['product_id'] ?>').on('click', function(c){
													// console.log($(this).find("button").val());
													
													var product_remove = $(this).find("button").val();
														$.ajax({
															url:"../controller/control_session.php",
															type:"post",
															data:{product_id:product_remove,status:'remove_product'},
														      success: function(data){
														        console.log(data);

														      }
														    });
														$('.rem<?php echo $value['product_id'] ?>').fadeOut('slow', function(c){
															$('.rem<?php echo $value['product_id'] ?>').remove();
													});

												});	  
											});
									   </script>
									</td>
								</tr>
							<?php endforeach ?>
					<?php else: ?>
						
					<?php endif ?>

								<!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
										console.log("HAI PLUS"+newVal+$(this).data("id"));
										var product_id = $(this).data("id");
										$.ajax({
												url:"../controller/control_session.php",
												type:"post",
												data:{product_id:product_id,qty:'1',status:'add_product'},
											    success: function(data){
											        console.log(data);

										      }
									    });
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
										console.log("HAI MINUS"+newVal+$(this).data("id"));
										var product_id = $(this).data("id");
										$.ajax({
												url:"../controller/control_session.php",
												type:"post",
												data:{product_id:product_id,qty:'1'},
											    success: function(data){
											        console.log(data);

										      }
										    });
									});
									</script>
								<!--quantity-->
				</table>
			</div>
			<div class="checkout-left">	
				<div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
					<h4>Continue to basket</h4>
					<ul>
					<?php if (!empty($_SESSION['cart'])): ?>
								<?php $grandTotal = 0; ?>
								<?php foreach ($_SESSION['cart'] as $key => $value): ?>
									<li><?php echo $value['nama_product'] ?> <i>-</i> <span>IDR <?php echo $value['subtotal'] ?> </span></li>
									<?php 
										$grandTotal += $value['subtotal'];
									 ?>
								<?php endforeach ?>
								<li>Total <i>-</i> <span class="grandTotal">IDR <?php echo $grandTotal ?></span></li>
					<?php endif ?>
					</ul>
				</div>
				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="<?php echo $baseurl ?>pages/checkout.php"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>


<?php include "../footer.php"; ?>