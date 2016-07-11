<?php include "header_admin.php"; ?>
<script src="<?php echo BASE_URL.'asset/ckeditor/ckeditor.js';?>"></script>
<?php 

$list_product = fetchData('multiple',"SELECT pr.*,pc.`name_category` FROM product pr
                          JOIN product_category pc ON pr.`id_category`=pc.`id` 
                          WHERE 1
                          AND product_visibility='1'");

?>


<section class="content">
                <?php 
                $notifikasi=false;
                  // $notifikasi = $this->session->flashdata("notifikasi");
                  if($notifikasi!=false){ ?>
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                    -Your process <?php echo $notifikasi; ?> is successful! -
                  </div>
                <?php  } ?>
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Form Master Product</h3>
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
    <form class="form-horizontal" id="form" action="<?php echo BASE_URL ?>controller/control_product.php" method="post" enctype="multipart/form-data">
      <div class="box-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Category Product</label>
          <div class="col-sm-5">
            <select name="category_product" class="form-control" id="category_product">
              <?php if (!empty($list_category_product)): ?>
                <?php foreach ($list_category_product as $key => $value): ?>
                  <option value="<?php echo $value->id ?>"><?php echo $value->name_category ?></option>
                <?php endforeach ?>
              <?php endif ?>
            </select>
          </div>
        </div>
        <input type="hidden" id="id_product" name="id_product">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Kode Product</label>
          <div class="col-sm-5">
            <input name="kode_product" type="text" class="form-control" id="kode_product" placeholder="Kode Product">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Merk Product</label>
          <div class="col-sm-5">
            <input name="merk_product" type="text" class="form-control" id="merk_product" placeholder="Merk Product">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Nama Product</label>
            <div class="col-sm-5">
              <input type="text" name="nama_product" class="form-control" id="nama_product" placeholder="Nama Product">
            </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Foto Product</label>
            <div class="col-sm-5">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                <input type="file" class="form-control" placeholder="Email" id="foto_profile" name="foto_product" accept="image/*" value="iahahs">
              </div>
            </div>
        </div>

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Selling Price</label>
            <div class="col-sm-5">
              <div class="input-group">
                <input type="number" class="form-control" placeholder="Selling Price" name="selling_price_product" id="selling_price" >
              </div>
            </div>
        </div>

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Description Product</label>
            <div class="col-sm-6">
              <div class="input-group">
                <textarea class="form-control" rows="8" id="iddescription" name="description_product" class="id-description">
                  
                </textarea>
              </div>
            </div>
        </div>

      </div>
      <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-5">
          <button type="submit" class="btn btn-info pull-left col-sm-4" id="click" name="submit" value="add_product">Save</button>
          <button type="reset" class="btn btn-default pull-right col-sm-4">Cancel</button>
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
                        <th>Kode</th>
                        <th>Merk Product</th>
                        <th>Nama Product</th>
                        <th>Category Product</th>
                        <th>Foto Product</th>
                        <th>Selling Price</th>
                        <th>Creted Time</th>
                        <th>List Testimoni</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php if (isset($list_product)): ?>
                      <?php foreach ($list_product as $value) { ?>
                      <tr>                   
                        <td><?php echo $value->kode_product ?></td>
                        <td><?php echo $value->merk ?></td>
                        <td><?php echo $value->nama_product ?></td>
                        <td><?php echo $value->name_category ?></td>
                        <?php if (!empty($value->image)): ?>                     
                            <td>
                              <img src="<?php echo BASE_URL.'../product_images/'.$value->image ?>" style="height: 120px;width: 180px;">
                            </td>
                        <?php else: ?>
                            <td>No Image</td>
                        <?php endif ?>
                        <td><?php echo $value->selling_price ?></td>
                        <td><?php echo $value->created_timestamp ?></td>
                        <td>
                          <button class="btn btn-default fa fa-gg-circle view-detail" value="<?php echo $value->id ?>"> Detail</button>
                        </td>
                        <td width="16%">
                          <a href="#" class="btn btn-default fa fa-edit btn-default btn_edit"
                              data-idproduct="<?php echo $value->id ?>"
                              data-kodeproduct="<?php echo $value->kode_product ?>"
                              data-namaproduct="<?php echo $value->nama_product ?>"
                              data-merkproduct="<?php echo $value->merk ?>"
                              data-sellingprice="<?php echo $value->selling_price ?>"
                              data-selectcategory="<?php echo $value->id_category ?>"
                              data-fotoproduct="<?php echo $value->image ?>"
                              data-iddescription="<?php echo $value->description_product ?>"
                          >
                            <i class="icon-pencil icon-white"></i> Edit
                          </a>
                          <a href="<?php echo BASE_URL."controller/control_product.php?delete_product=".$value->id ?>" class="btn btn-default fa fa-trash btn-default btn-delete confirm" >
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
</section>
<div class="modal fade" id="myModal">
<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="modal-title"><span value="samuel erwardi" id="title_shu"></span></h3>
        </div>
        <div class="modal-body">


          <table class="table table-striped" id="tblGrid">
            <thead id="tblHead">
              <tr>
                <th width="25%">Created Time</th>
                <th width="25%">Nama Customer</th>
                <th class="text-left">Review / Testimoni</th>
              </tr>
            </thead>
            <tbody id="list_testimoni">
              
            </tbody>
            <tfoot>

            </tfoot>
          </table>
          <div class="form-group">
            <div class="clearfix"></div>
          </div>
    </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
        </div>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<style>
  .image-modal {
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    display: block;
    z-index: 9999;
    background: rgba(0, 0, 0, 0.5);
    display: none;
  }
  .image-modal .modal-body{
    overflow: auto;
    max-height: 530px;
  }
</style>
<div class="image-modal modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Foto Profile</h4>
      </div>
      <div class="modal-body">
        <img src="" id="profile_img" style="width: 100%">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  <?php include "footer.php"; ?>
  <script type="text/javascript" src="<?php echo BASE_URL ?>asset/my_js/scripts_master_user.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $(".confirm").confirm({
          text: "Yakin akan menghapus Data?"
        });
        $(function(){

          $("#example1").on('click','.view-detail',function(){
            var id_product = $(this).val();
            // $("#list_testimoni").html("");
            $("#myModal").modal('show');
                $.ajax({
                    url:"controller/control_json.php?master_product",
                    type:"get",
                    data:{id_product:id_product},
                    success:function(data){
                      console.log(data);
                      console.log(data.length);
                    // $("#title_shu").html(data['result'][0]['nama']);
                    $('#list_testimoni').html("");
                    if (data.length>0){
                        for (var i =0 ; i < data.length; i++) {
                          var row='<tr>'+
                              '<td>'+data[i].created_timestamp+'</td>'+
                              '<td>'+data[i].first_name+'</td>'+
                              '<td class="text-left">'+data[i].review_detail+'</td>'+                  
                          '</tr>';
                    $("#list_testimoni").append(row);     
                        };
                      $("#myModal").modal('show');
                    };
                  }
              });
          });
        });

    });
  </script>