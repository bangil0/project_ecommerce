<?php 
require('../config.php');
include "../header.php"; 
?>
<?php
show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
unset($_SESSION['alert']);
?>


<div class="container main">
  <div class="line"></div>
  <div class="content">
    <div class="row">
      <div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
        <div class="box clearfix">
        <form role="form" method="post" class="form-horizontal" action="<?php echo $baseurl."controller/control_konfirmasi_pembayaran.php" ?>">
          <h1 class="h4 heading">KONFIRMASI PEMBAYARAN</h1>
          <p class="subheading">Hanya Untuk Bank Transfer</p>
          <div class="line line-sm"></div>
          <p class="subheading hidden">Input your order number and your payment details to confirm order.</p>
          
          <div class="form-group clearfix" id="id-row-number">
            <label class="control-label col-sm-3">Order #</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="id-number" name="number">
            </div>
          </div>

            <div class="line m_t_20 m_b_20"></div>

            <div class="form-group clearfix m_b_10" id="id-row-amount">
              <label class="control-label col-sm-3">Total Pembayaran</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="id-amount" name="amount" placeholder="Rp">
              </div>
            </div>

            <div class="form-group clearfix" id="id-row-name">
              <label class="control-label col-sm-3">Nama Akun Bank</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="id-name" name="name" placeholder="">
              </div>
            </div>

            <div class="line m_t_20 m_b_20"></div>
            
            <div class="clearfix"></div>
            <div class="btn-placeholder clearfix">
              <div class="outer-center">
                <div class="inner-center">
                  <button type="submit" class="btn btn-primary btn-sm pull-right" id="id-btn-alias">Submit</button>
                </div><!--.inner-center-->
              </div><!--.outer-center-->
            </div><!--.btn-placeholder-->
          </form>
        </div><!--.box-->
      </div><!--.col-sm-8-->
    </div><!--.row-->
  </div><!--.content-->
</div><!--.container.main-->


<?php include "../footer.php"; ?>