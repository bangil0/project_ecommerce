
	$(document).ready(function() {
		$(".add_cart").click(function(event) {
			var product_id =  $(this).find(".add_cart_id").val();
			var qty = 1;
			$.ajax({
				url:"controller/control_session.php",
				type:"post",
				data:{product_id:product_id,qty:qty,status:'add_product'},
			      success: function(data){
			        console.log(data);
			        $("#namabarang").html(data.nama_barang);
			        $("#harga").html(data.harga_beli);
			        $("#qty").focus();
			      }
			    });
			});
	});
