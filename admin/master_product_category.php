<?php include "header_admin.php"; ?>
<?php 

$data_product_category = fetchData("multiple","SELECT * FROM product_category WHERE 1 AND category_visibility IN('1','0')");
?>
<section class="content">
                <?php 
                  $notifikasi = false;
                  if($notifikasi!=false){ ?>
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                    -Your process <?php echo $notifikasi; ?> is successful! -
                  </div>
                <?php  } ?>
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Form Master Product Category</h3>
    <div class="block-content collapse in">
  <div class="span12">
     <div class="table-toolbar">
        <div class="btn-group">
           <a href="#" class="btn btn-success" id="btn_addnew">Add New <i class="icon-plus icon-white"></i></a>
        </div>
     </div>   
    </div> 
    </div>
    </div><!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" id="form" action="<?php echo BASE_URL ?>controller/control_category.php" method="post">
      <input type="hidden" name="id_category" value="" id="id_category">
      <div class="box-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Nama Product Category</label>
          <div class="col-sm-5">
            <input name="nama_product_category" type="text" class="form-control" id="nama" placeholder="Nama" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail13" class="col-sm-2 control-label">visibility</label>
          <div class="col-sm-5">
            <select class="form-control select" name="visibility">
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>
          </div>
        </div>
      <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-5">
          <button type="submit" class="btn btn-info pull-left col-sm-4" id="click" name="submit" value="add_category">Save</button>
          <button type="reset" class="btn btn-default pull-right col-sm-4">Cancel</button>
        </div>
      </div>
      </div>
      </form>
<!--         <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
              <label>
                <input type="checkbox"> Remember me
              </label>
            </div>
          </div>
        </div>
      </div><! -->
      <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Table With Full Features</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped datatable">
                    <thead>
                      <tr>
                        <th>Nama Category</th>
                        <th>Visibility</th>
                        <th>CREATED TIME</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php if (isset($data_product_category)): ?>
                      <?php foreach ($data_product_category as $value) { ?>
                      <tr>                   
                        <td><?php echo $value->name_category ?></td>
                        <td><?php echo $value->category_visibility==1?'YES':'NO' ?></td>
                        <td><?php echo $value->created_timestamp ?></td>
                        <td width="16%">
                            <a href="#" class="btn btn-default fa fa-edit btn-default btn_edit" data-idcategory="<?php echo $value->id ?>" data-selecttype=<?php echo $value->category_visibility ?> data-nama="<?php echo $value->name_category ?>">
                            <i class="icon-pencil icon-white"></i> Edit
                            </a>
                          <a href="<?php echo BASE_URL."controller/control_category.php?delete_category_product=".$value->id ?>" class="btn btn-default fa fa-trash btn-default confirm" >
                            <i class="icon-pencil icon-white"></i> Delete
                          </a>
                        </td>
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
  <?php include "footer.php"; ?>
<script type="text/javascript" src="<?php echo BASE_URL ?>/my_js/scripts_master_barang.js"></script>
<script type="text/javascript">
  $(".confirm").confirm({
    text: "Yakin akan menghapus Data?"
  });
</script>
