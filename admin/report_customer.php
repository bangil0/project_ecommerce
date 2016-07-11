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
     </div>   
    </div> 
    </div>
    </div><!-- /.box-header -->
    <!-- form start -->

      <div class="box">
                <div class="box-header">
                  <h3 class="box-title hidden">Data Table With Full Features</h3>
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