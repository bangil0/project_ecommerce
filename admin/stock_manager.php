<?php include "header_admin.php"; ?>
<?php 

$list_products = fetchData('multiple',"SELECT *,pr.`id` AS id_product
                                FROM product pr
                                JOIN product_category pc ON pc.`id`=pr.`id_category`
                                LEFT JOIN stock_product sp ON pr.`id`=sp.`id_product`
                                WHERE 1");

?>

<section class="content">
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Stok Manager</h3>
      <button class="pull-right btn btn-default">Download</button>
    </div><!-- /.box-header -->
    <!-- form start -->
  <form action="<?php echo BASE_URL ?>controller/control_stock.php" method="POST">
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <div class="box-tools">
                    <!-- <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div> -->
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr style="background-color: black;color:white">
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Category Product</th>
                      <th>Merk</th>
                      <th>Price</th>
                      <th>Stock</th>
                      <th>Qty Booked</th>
                    </tr>
                      <?php if (!empty($list_products)): ?>
                        <?php foreach ($list_products as $key => $value): 
                          $sql_booked = "SELECT SUM(qty) AS qty_booked
                                          FROM transaksi tr
                                          JOIN transaksi_detail trd ON tr.`order_id`=trd.`order_id`
                                          WHERE 1
                                          AND tr.`status`='checkout'
                                          AND trd.`product_id`='".$value->id_product."'
                                          GROUP BY trd.`product_id`";
                          $get_booked = fetchData('single',$sql_booked);
                        ?>

                          <tr>
                            <td><?php echo $value->kode_product ?></td>
                            <td><?php echo $value->nama_product ?></td>
                            <td><?php echo $value->name_category ?></td>
                            <td><?php echo $value->merk ?></td>
                            <td><?php echo $value->selling_price ?></td>
                            <td>
                                <input type="hidden" name="id_product[]" value="<?php echo $value->id_product ?>">
                                <input type="text" name="qty_product[]" style="width:70px" value="<?php echo $value->qty==null?'0':$value->qty ?>" class="form-control">
                            </td>
                            <td><span class="label label-danger"><?php echo $get_booked->qty_booked?$get_booked->qty_booked:'0' ?></span></td>
                          </tr>
                        <?php endforeach ?>
                      <?php endif ?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
        </div>
        <div class="box-footer">
          <div class="col-sm-offset-2 col-sm-5">
            <button type="submit" class="btn btn-info pull-left col-sm-4" id="click" name="submit" value="stock_manager">Submit</button>
          </div>
        </div>
    </div>
</form>
</section>


<?php include "footer.php"; ?>
