<?php
/*
# ----------------------------------------------------------------------
# FINISH: VIEW
# ----------------------------------------------------------------------
*/

include "../config.php";
include "../header.php"; 
if (empty($_SESSION['order_number'])){
  set_alert('danger', 'Your cart Is Empty');
  safe_redirect('../index.php');
}


$get_data_transaksi = fetchData('single',"SELECT * FROM transaksi WHERE order_id='".$_SESSION['order_number']."'");
unset($_SESSION['order_number']);
?>

  <div class="bionic-step clearfix">
    <div class="bionic-step-title"></div>
    <div class="bionic-step-title"></div>
    <div class="bionic-step-title active"></div>
  </div><!--.step-->
  
  <div class="container main">
    <div class="line"></div>
    <div class="content">
      <div class="row">
        <div class="col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6" style="margin-bottom:20px">
          <div class="box" style="margin-top:20px">
            <h2 class="heading">Thanks, <?php echo $_SESSION['login']['first_name']?>!</h2> 
            <div class="line m_b_20"></div>
            <p>
              Your order number is<br/>
              <span class="orderno"><?php echo $get_data_transaksi->order_id;?></span><br/>
              <br>
            </p>
            <div class="line m_b_20"></div>
            <p>
              <?php 
              /* --- PAYPAL --- */
              if($success->order_payment_method != '4'){
              echo 'To complete the order, please:<br/><br/>';
              }
              ?>
              </p>
              
              <?php 
              /* --- NON PAYPAL --- */
              if($success->order_payment_method != '4'){
              ?>
            
            <div class="step-box">
              <div class="step-head">1</div>
              <h3 class="h6 m_b_10"><strong>Pay</strong></h3>
              <div class="step-content">
                Pay the amount of <span><?php echo "Rp".$get_data_transaksi->grand_total ?></span><br/>
                To <br>
                <?php
                foreach($bank_info as $bank_info){
                echo '<span>'.$bank_info->bank_name.' - '.$bank_info->account_number.' - A/N: '.$bank_info->account_name.'</span> <br>';
                }
                ?>
              </div>
            </div>
            <div class="step-box">
              <div class="step-head">2</div>
              <h3 class="h6 m_b_10"><strong>Confirm</strong></h3>
              <div class="step-content">
                Confirm your payment at<br/>
                <a href="<?php echo BASE_URL."confirm";?>"><?php echo BASE_URL."confirm";?></a>
              </div>
            </div>
            
      			<?php
      			}
      			?>
            
            <div class="line"></div>
          </div><!--.box-->

          <div class="btn-placeholder">
            <div class="outer-center">
              <div class="inner-center">
                <a class="btn btn-default" href="<?php echo BASE_URL;?>">Continue Shopping</a>
                <a class="btn btn-primary" href="<?php echo BASE_URL.'order-detail/'.$order_number;?>">View Order Summary</a>
              </div>
            </div>
          </div><!--.btn-placeholder-->
        </div><!--.col-->

        <!-- <aside class="info col-md-2 col-sm-12 col-xs-12 hidden">
          <div class="box">
            <div class="title">My Account</div>
            <div class="content">
              Visit your account to:<br/>
              <div class="info-account">
                - <a href="<?php echo BASE_URL.'order-history';?>">See order history</a><br/>
                - <a href="javascript:void(0)">Track your order</a><br/>
                - <a href="<?php echo BASE_URL.'my-account';?>">Manage your details</a><br/>
              </div>
            </div>
          </div>
          <a href="<?php echo BASE_URL."my-account";?>" class="btn btn-default" style="width: 100%">GO TO MY ACCOUNT</a>
        </aside> -->

      </div><!--.row-->

    </div><!--.content-->
  </div><!--.container.main-->
  
    
<?php include "../footer.php"; ?>
<?php

/*
# ----------------------------------------------------------------------
# UNSET SESSION
# ----------------------------------------------------------------------
*/

// unset($_SESSION['cart_type_id']);
// unset($_SESSION['cart_stock_id']);
// unset($_SESSION['amount_discount']);
// unset($_SESSION['cart_qty']);
// unset($_SESSION['amount_purchase']);
// unset($_SESSION['order_number']);
// unset($_SESSION['shop']);
// unset($_SESSION['bag']);
// unset($_SESSION['checkout']);
?>

<script>
// $(document).ready(function(e) {
//    $('#id_shop_count').text('0');
// });
</script>

	