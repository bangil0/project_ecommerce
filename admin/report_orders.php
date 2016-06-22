<?php include "header_admin.php"; ?>
<?php 

$list_orders = fetchData('multiple',"SELECT *,tr.`created_timestamp` AS created_timestamp
                                FROM transaksi tr
                                JOIN tbl_user u ON tr.`user_id`=u.`id`
                                WHERE 1");

?>


<section class="content">
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">List Report Order</h3>
    <div class="block-content collapse in">
  <div class="span12 hi">
     <div class="table-toolbar">
        <div class="btn-group hidden">
           <a href="#" class="btn btn-success" id="btn_addnew">Add New <i class="icon-plus icon-white"></i></a>
        </div>
        <div class="btn-group pull-right">
           <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
           <ul class="dropdown-menu">
              <li><a href="#">Print</a></li>
              <li><a href="#">Save as PDF</a></li>
              <li><a href="<?php echo BASE_URL ?>master_barang/TRUE">Export to Excel</a></li>
           </ul>
        </div>
     </div>   
    </div> 
    </div>
    </div><!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" id="form3" action="<?php echo BASE_URL ?>report_transaksi_pinjaman" method="get">
      <div class="box-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">From</label>
          <div class="col-sm-3">
            <input type="text" name="from" class="form-control datepicker" value="<?php echo isset($_GET['from'])?$_GET['from']:"" ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label" id="name">To</label>
          <div class="col-sm-3">
            <input type="text" name="to" class="form-control datepicker" value="<?php echo isset($_GET['to'])?$_GET['to']:"" ?>">
          </div>
        </div>
<!--         <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label" id="name">Group By</label>
          <div class="col-sm-3">
            <select name="group_by" class="form-control select2" style="width: 100%;" id="nik">
              <option value="">- Pilih -</option>
            </select>
          </div>
        </div> -->



      </div>

      <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-5">
          <button type="submit" class="btn btn-info pull-left col-sm-4" id="click">Submit</button>
        </div>
      </div>
      </form>
      <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Table With Full Features</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped datatable">
                    <thead>
                      <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Total Belanja</th>
                        <th>Total Shipping</th>
                        <th>Detail</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php if (isset($list_orders)): ?>
                      <?php foreach ($list_orders as $value) { ?>
                      <tr>                   
                        <td><?php echo $value->order_id ?></td>
                        <td><?php echo $value->created_timestamp ?></td>
                        <td><?php echo $value->first_name ?></td>
                        <td><?php echo $value->total_belanja ?></td>
                        <td><?php echo $value->total_shipping ?></td>
                        <td>
                          <button class="btn btn-default fa fa-gg-circle view-detail" value="<?php echo $value->order_id ?>"> Detail</button>
                        </td>
                        <?php if ($value->status=='checkout'): ?>                     
                            <td>
                              <a href="<?php echo BASE_URL."/goo" ?>">
                                <button class="btn btn-warning btn-flat" ><?php echo strtoupper(str_replace('_', ' ', $value->status)) ?></button>
                              </a>
                                  <?php if (!empty($value->akun_bank_customer)): ?>
                                        <div class="payment-notes">
                                          Account Name: <?php echo $value->akun_bank_customer ?> <br>
                                          Rp<?php echo $value->grand_total ?><br>
                                        </div>  
                                  <?php endif ?>
                            </td>
                            <?php elseif ($value->status=='paid'): ?>                     
                                <td>
                                  <span class="bg-green" style="
                                            font-weight: 600;
                                            padding: 5px;
                                            display: inline-block;
                                            background-color: #fff;
                                            text-align: center;
                                            width:91.56px">
                                            <?php echo strtoupper(str_replace('_', ' ', $value->status)) ?>
                                  </span>
                                     <div class="payment-notes">
                                       Bank Transfer via: BCA <br>
                                       Account Name: Michelle Renata <br>
                                       Rp35.500<br>
                                     </div>
                                 </td>
                            <?php else: ?>
                            <td>
                            <label>
                              <a href="#"><?php echo strtoupper(str_replace('_', ' ', $value->status)) ?></a>
                            </label>
                            </td>
                        <?php endif ?>
                      </tr>
                    <?php  } ?>
                  <?php endif ?>                     
            </tbody>
            <tfoot>                  
            </tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
  </div>
</section>

<div class="modal fade" id="myModal">
<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="modal-title"><span value="samuel erwardi" id="title_shu"></span></h3>
        </div>
        <div class="modal-body">

          <div class="col-md-8">
            <div class="row">
              <div class="col-sm-3">Order ID</div>
              <div class="col-sm-1">:</div>
              <div class="col-sm-8" id="order_id"></div>
            </div>
            <div class="row">
              <div class="col-sm-3">Tanggal</div>
              <div class="col-sm-1">:</div>
              <div class="col-sm-8" id="tanggal_transaksi">Testes</div>
            </div>
            <div class="row">
              <div class="col-sm-3">Customer</div>
              <div class="col-sm-1">:</div>
              <div class="col-sm-8" id="pelanggan">Testes</div>
            </div>
          </div>
          <div class="col-md-4">
            <textarea class="form-control" rows="3" disabled style="resize: none;" id="alamat"></textarea>
          </div>

          <table class="table table-striped" id="tblGrid">
            <thead id="tblHead">
              <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th class="text-right">Harga</th>
                <th class="text-right">Qty</th>
                <th class="text-right">Sub Total</th>
              </tr>
            </thead>
            <tbody id="mutasi_anggota">
              
            </tbody>
            <tfoot>

            </tfoot>
          </table>
          <div class="form-group">
            <div class="clearfix"></div>
          </div>
          <div class="row">
            <div class="col-sm-3">Total</div>
            <div class="col-sm-1">:</div>
            <div class="col-sm-8" id="total"></div>
          </div>
          <div class="row">
            <div class="col-sm-3">Payment Shipping </div>
            <div class="col-sm-1">:</div>
            <div class="col-sm-8" id="ppn"></div>
          </div>
          <div class="row">
            <div class="col-sm-3">Grand Total</div>
            <div class="col-sm-1">:</div>
            <div class="col-sm-8" id="grand_total"></div>
          </div>
    </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
        </div>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <?php include "footer.php"; ?>
  <script type="text/javascript">
  $(function(){

    $("#example1").on('click','.view-detail',function(){
      var order_id = $(this).val();
      // $("#mutasi_anggota").html("");
      $("#myModal").modal('show');
          $.ajax({
              url:"controller/control_json.php?report",
              type:"get",
              data:{order_id:order_id},
              success:function(data){
                console.log(data[1]);
                console.log(data.length);
              // $("#title_shu").html(data['result'][0]['nama']);
              if (data.length>0){
                  for (var i =0 ; i < data.length; i++) {
                    var row='<tr>'+
                        '<td>'+data[i].product_id+'</td>'+
                        '<td>'+data[i].nama_product+'</td>'+
                        '<td class="text-right">'+data[i].qty+'</td>'+
                        '<td class="text-right">'+data[i].selling_price+'</td>'+
                        '<td class="text-right">'+data[i].subtotal+'</td>'+                        
                    '</tr>';
              $("#mutasi_anggota").append(row);     
                  };
                  $('#alamat').html(data[0].address);
                  $('#order_id').html(data[0].order_id);
                  $('#tanggal_transaksi').html(data[0].created_transaksi);
                  $('#pelanggan').html(data[0].first_name);
                $('#total').html('Rp '+data[0].total_belanja);
                $('#ppn').html('Rp '+data[0].total_shipping);
                $('#grand_total').html('Rp '+data[0].grand_total);

                
                $("#myModal").modal('show');
              // showModalDialog($("#myModal"));
              };
            }
        });
    });
  });
  </script>