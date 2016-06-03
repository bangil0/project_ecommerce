<?php include "header_admin.php"; ?>
<?php 

$list_customer = fetchData('multiple',"SELECT * 
                              FROM tbl_user WHERE 1
                              AND type='customer'");

?>


<section class="content">
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">List Customer</h3>
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
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label" id="name">Group By</label>
          <div class="col-sm-3">
            <select name="group_by" class="form-control select2" style="width: 100%;" id="nik">
              <option value="">- Pilih -</option>
            </select>
          </div>
        </div>



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
                        <th>ID Customer</th>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Register Date</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php if (isset($list_customer)): ?>
                      <?php foreach ($list_customer as $value) { ?>
                      <tr>                   
                        <td><?php echo $value->id ?></td>
                        <td><?php echo $value->email ?></td>
                        <td><?php echo $value->first_name ?></td>
                        <td><?php echo $value->last_name ?></td>
                        <td><?php echo $value->created_timestamp ?></td>
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

  <?php include "footer.php"; ?>