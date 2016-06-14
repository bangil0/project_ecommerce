<?php
include "../controller/control_checkout.php";
include "../header.php"; 

show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
unset($_SESSION['alert']);

?>

<!-- cart -->
	<script src="<?php echo $baseurl?>js/simpleCart.min.js"> </script>
<!-- cart -->
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">

<script src="<?php echo $baseurl ?>js/simpleCart.min.js"> </script>

<!-- breadcrumbs -->
	<div class="breadcrumbs" style="margin-bottom:20px">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="<?php echo $baseurl."index.php" ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Checkout Page</li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">





		<form class="form-horizontal" method="post" action="<?php echo $baseurl ?>controller/control_checkout.php">
		  <div class="box clearfix m_b_10" id="id-box-details">
		    <h1 class="heading">Checkout</h1>
		    <div class="line line-sm"></div>
		    <p class="subheading">Complete the form below to complete your order.</p>
		    <div class="line m_b_20"></div>

		    <h3 class="heading-2"><strong></strong></h3>
		    <div class="form-group row" id="id-row-fname">
		      <label class="col-sm-3 control-label" style="display:block;">First Name</label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control" name="checkout_user_fname" id="id-fname" value="<?php echo $_global_user->user_first_name;?>" placeholder="">
		      </div>
		    </div>

		    <div class="form-group row">
		      <label class="col-sm-3 control-label" style="display:block;">Last Name</label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control" name="checkout_user_lname" id="id-lname" value="<?php echo $_global_user->user_last_name;?>" placeholder="">
		      </div>
		    </div>
		    
		    <div class="form-group row" id="id-row-phone">
		      <label class="col-sm-3 control-label">Phone</label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control" name="checkout_user_phone" id="id-phone" value="<?php echo $_global_user->user_phone;?>" placeholder="">
		      </div>
		    </div>

		    <div class="form-group row" id="id-row-address">
		      <label class="col-sm-3 control-label">Address</label>
		      <div class="col-sm-9">
		        <textarea id="id-address" name="checkout_user_address" class="form-control" rows="5" placeholder=""></textarea>
		      </div>
		    </div>
		    
		    <div class="form-group row" id="id-row-address">
		      <label class="col-sm-3 control-label">Country</label>
		      <div class="col-sm-9">
		        <select class="form-control" name="checkout_user_country" id="id-country">
		          <option value="Indonesia">Indonesia</option>
		          <option value="0" disabled="disabled">--------------------</option>
		        </select>
		      </div>
		    </div><!--.form-group-->
		    <div class="form-group row" id="id-row-city">
		      <label class="col-sm-3 control-label">Destination</label>
				<div class="col-sm-9">
					<select class="form-control option_value" name="checkout_user_city" id="id_checkout_user_city">
						<option value="">- Pilih -</option>
<!-- 							<?php var_dump($list_city); ?> -->
						<?php if (!empty($list_city)): ?>
							<?php foreach ($list_city as $key => $value): ?>
								<option value="<?php echo $value->id ?>"><?php echo $value->destination ?></option>
							<?php endforeach ?>
						<?php endif ?>
					</select>
				</div>
		    </div>

		    <div class="form-group row" id="id-row-postal">
		      <label class="control-label col-sm-3">Postal Code</label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control" name="checkout_user_postal" id="id-postal" value="" placeholder="Postal Code">
		      </div>
		    </div>
		  </div><!--.box-->

<!-- 		  <div class="row">
		    <div class="col-sm-offset-3 col-sm-9 m_b_30">
		      <div class="checkbox">
		        <label>
		          <input type="checkbox" checked="checked" name="same-billing-address" id="id-same-billing-address" value="1"> <?php echo $var_checkout_note_billing_address;?>
		        </label>
		      </div>
		    </div>
		  </div> -->

<!-- 		  <div class="box clearfix m_b_10 animated hidden" id="id-box-details-billing">
		    <h3 class="heading-2"><strong><?php echo $var_checkout_header_billing;?></strong></h3>
		    <div class="form-group row" id="id-row-fname-billing">
		      <label class="col-sm-3 control-label" style="display:block;"><?php echo $var_checkout_lbl_fname;?></label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control" name="checkout_billing_fname" id="id-fname-billing" placeholder="First Name">
		      </div>
		    </div>

		    <div class="form-group row" id="id-row-lname-billing">
		      <label class="col-sm-3 control-label" style="display:block;"><?php echo $var_checkout_lbl_lname;?></label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control" name="checkout_billing_lname" id="id-lname-billing" placeholder="Last Name">
		      </div>
		    </div>

		    <div class="form-group row" id="id-row-phone-billing">
		      <label class="col-sm-3 control-label"><?php echo $var_checkout_lbl_phone;?></label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control" name="checkout_billing_phone" id="id-phone-billing" placeholder="021888888">
		      </div>
		    </div>

		    <div class="form-group row" id="id-row-address-billing">
		      <label class="col-sm-3 control-label"><?php echo $var_checkout_lbl_address;?></label>
		      <div class="col-sm-9">
		        <textarea id="id-address-billing" name="checkout_billing_address" class="form-control" rows="5" placeholder="Address"></textarea>
		      </div>
		    </div>

		    <div class="form-group row" id="id-row-address-billing">
		      <label class="col-sm-3 control-label"><?php echo $var_checkout_lbl_country;?></label>
		      <div class="col-sm-9">
		        <select class="form-control" name="checkout_billing_country" id="id-country-billing">
		          <option value="Indonesia">Indonesia</option>
		          <option value="0" disabled="disabled">--------------------</option>

		          <?php
		          foreach($arrCountryBilling as $get_country){
		            echo '<option value="'.$get_country->courier_city.'">'.$get_country->courier_city.'</option>';
		          }
		          ?>

		        </select>
		      </div>
		    </div> --><!--.form-group-->
		    <!-- <div class="form-group row" id="id-row-province-billing">
		      <label class="col-sm-3 control-label"><?php echo $var_checkout_lbl_province;?></label>
		      <div class="col-sm-9">
		        <div id="ajax-load-province-billing"></div>
		      </div>
		    </div>

		    <div class="form-group row" id="id-row-city-billing">
		      <label class="control-label col-sm-3"><?php echo $var_checkout_lbl_city;?></label>
		      <div class="col-sm-9">
		        <div id="ajax-load-city-billing"></div>
		      </div>
		    </div>
		    <div class="form-group row" id="id-row-postal-billing">
		      <label class="control-label col-sm-3"><?php echo $var_checkout_lbl_postal;?></label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control" name="checkout_billing_postal" id="id-postal-billing" placeholder="Postal Code">
		      </div>
		    </div>
		  </div> --><!--.box-->
		  
		 
		  <!--TEMPORARILY UNUSED-->
		  <div class="box m_b_10" id="id-box-shipping">
            <h3 class="heading-2"><strong>Shipping Method</strong></h3>
            <div class="input-grp-placeholder">
	          	<div id="ajax-load-courier-radio">
	              	<div class="input-grp radio">
	              		<label><input type="radio" name="opt-shipping" id="id-opt-shipping-0" value="JNE" checked="">
	              		<img src="http://original.antidemo.com/order_/ajax/../../files/uploads/assets/logo-2015-10-22-22-09-33-icon-jne.png">
	          				<div class="input-grp-select"></div>
	              			<div class="input-grp-content">
		              			<p class="input-grp-title"><strong>JNE Regular</strong></p>
		              			<p class="input-grp-heading" id="id-opt-shipping-amount-0"><strong> +Rp0,00</strong></p>
		              			<p class="input-grp-caption"></p>
	      					</div><!--.input-grp-content-->
	      				</label>
	  				</div>
				</div>
            </div>
          </div>


		  
		  <div class="box m_b_10">
		    <h3 class="heading-2"><strong>Payment Method</strong></h3>
		    <div class="input-grp-placeholder pay-meth">
		      <div class="input-grp radio" style="border: 1px solid #ddd">
		        <label>
		          <input type="radio" name="opt-payment" id="id-opt-payment-1" value="1" checked>
		          <img src="<?php echo $baseurl;?>/images/ic_pay_transfer.svg" width="100%">
		          <div class="input-grp-select"></div>
		          <div class="input-grp-content">
		            <p class="input-grp-title"><strong>Bank Transfer</strong></p>
		            <!-- <p class="input-grp-caption">Bank transfer ke BCA / Bank Mandiri</p> -->
		          </div><!--.input-grp-content-->
		        </label>
		      </div><!--.input-grp-->
		    </div><!--.input-grp-placeholder-->
		  </div><!--.box-->



		  <!--TEMPORARILY UNUSED-->
		  <div class="box hidden">
		    <h3 class="heading-2"><strong>Payment Method</strong></h3>
		    <div class="form-group" id="id-row-payment">
		      <label class="control-label col-sm-3">Payment Method</label>
		      <div class="col-sm-9">
		        <select class="form-control" id="id-payment-method" name="checkout_payment_type">
		          <option value="0">-- Payment Method --</option>
		          <option value="1">Bank Transfer</option>
		          <option value="2">Credit Card</option><!-- 
		          <option value="3">Doku</option>
		          <option value="4">Paypal</option>
		          <option value="5">COD</option> -->
		        </select>
		        <p class="help-block hidden" id="id-payment-note"></p>
		      </div>
		    </div><!--.form-group-->

		  </div><!--.box-->
		  <!--TEMPORARILY UNUSED-->

		  

		  <div class="btn-placeholder clearfix">
		    <button type="button" class="transition btn btn-primary pull-right" id="btn-alias-submit">NEXT</button>
		    <input type="submit" name="btn_submit_checkout" id="id_btn_submit_checkout" class="btn btn-default pull-right hidden"value="Next"/>
		    <a href="" class="transition btn btn-default pull-right m_r_5">CANCEL</a>
		  </div>
		  
		  <input type="text" class="hidden" name="hidden_checkout_country" id="id_hidden_checkout_country" value="<?php echo $_global_user->user_country;?>">
		  <input type="text" class="hidden" name="hidden_checkout_province" id="id_hidden_checkout_province" value="<?php echo $_global_user->user_province;?>">
		  <input type="text" class="hidden" name="hidden_checkout_city" id="id_hidden_checkout_city" value="<?php echo $_global_user->user_city;?>">
		  <input type="text" class="hidden" name="hidden_checkout_courier" id="id_hidden_checkout_courier">
		  <input type="text" class="hidden" id="hidden_checkout_amount" name="hidden_checkout_amount">
		  <input type="text" class="hidden" id="hidden_checkout_discount" name="hidden_checkout_discount" value="<?php echo $_SESSION['amount_discount'];?>">
		  <input type="text" class="hidden" id="hidden_checkout_total" name="hidden_checkout_total">
		  <input type="text" class="hidden" id="order_amount_hidden" name="order_amount_hidden" value="<?php echo $_SESSION['amount_purchase'];?>">
		
		</form>



		</div>
	</div>
<!-- //breadcrumbs -->
<!-- checkout -->
	<div class="checkout hidden">
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
							<?php foreach ($_SESSION['cart'] as $key => $value): ?>
								<tr class="rem1">
									<td class="invert">1</td>
									<td class="invert-image"><a href="single.html"><img src="<?php echo $baseurl?>images/22.jpg" alt=" " class="img-responsive" /></a></td>
									<td class="invert">
										 <div class="quantity"> 
											<div class="quantity-select">                           
												<div class="entry value-minus">&nbsp;</div>
												<div class="entry value"><span><?php echo $value['qty'] ?></span></div>
												<div class="entry value-plus active">&nbsp;</div>
											</div>
										</div>
									</td>
									<td class="invert"><?php echo $value['nama_product'] ?></td>
									<td class="invert"><?php echo $value['selling_price'] ?></td>
									<td class="invert">
										<div class="rem">
											<div class="close1"> </div>
										</div>
										<script>$(document).ready(function(c) {
											$('.close1').on('click', function(c){
												$('.rem1').fadeOut('slow', function(c){
													$('.rem1').remove();
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
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
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
								<?php foreach ($_SESSION['cart'] as $key => $value): ?>
									<li>Product1 <i>-</i> <span>$250.00 </span></li>
									<li>Product2 <i>-</i> <span>$290.00 </span></li>
									<li>Product3 <i>-</i> <span>$299.00 </span></li>
									<li>Product3 <i>-</i> <span>$299.00 </span></li>
								<?php endforeach ?>
								<li>Total <i>-</i> <span>$854.00</span></li>
					<?php endif ?>
					</ul>
				</div>
				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="single.html"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Checkout</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

<script src="<?php echo $baseurl?>js/checkout.js"> </script>
<link rel="stylesheet" type="text/css" href="<?php echo $baseurl.'css/select2.min.css' ?>">
<script src="<?php echo $baseurl.'js/select2.full.min.js';?>"></script>
<?php include "../footer.php"; ?>