<?php include "header_admin.php"; ?>
<?php 

$list_biaya_pengiriman = fetchData('multiple',"SELECT *
                                FROM tbl_city
                                WHERE 1");

?>

<form action="<?php echo BASE_URL ?>controller/control_biaya_pengiriman.php" method="post">
<section class="content">
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Master Biaya Pengiriman</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
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
                      <th>No</th>
                      <th>Kota Tujuan</th>
                      <th>Biaya</th>
                    </tr>
                      <?php if (!empty($list_biaya_pengiriman)): ?>
                        <?php foreach ($list_biaya_pengiriman as $key => $value): ?>
                          <tr>
                            <td><?php echo $value->id ?></td>
                            <td><?php echo $value->destination ?></td>
                            <td>
                                <input type="hidden" name="id_destination[]" value="<?php echo $value->id ?>">
                                <input type="text" name="biaya_pengiriman[]" style="width:90px" value="<?php echo $value->cost==null?'0':$value->cost ?>" class="form-control">
                            </td>
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
            <button type="submit" class="btn btn-info pull-left col-sm-4" id="click" name="button" value="add_pengiriman">Submit</button>
          </div>
        </div>
      </div>
</section>
</form>

<?php include "footer.php"; ?>
