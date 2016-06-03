$(function() {
	CKEDITOR.replace('iddescription');
	$.initForm(function(){
		//dalem ini isinya yg isi data tadi yg di comment di scripts.js
		$("#kode_product").val($(this).data("kodeproduct"));
		$("#nama_product").val($(this).data("namaproduct"));
		$("#merk_product").val($(this).data("merkproduct"));
		$("#selling_price").val($(this).data("sellingprice"));
		
		$("#iddescription").text($(this).data("iddescription"));
		CKEDITOR.remove(CKEDITOR.instances.iddescription);
		CKEDITOR.replace('iddescription');
		$("#cke_iddescription").addClass('hidden');
        $("select[name=category_product]").val($(this).data("selectcategory"));
		console.log($(this).data());
		console.log("Debug");
	});
	var showModal = function(){
		var fileName = URL.createObjectURL(event.target.files[0]);
		if (fileName!=null){
			$(".image-modal").fadeIn('slow');
	       	$("#profile_img").attr('src',fileName);
		};
	}
	$("#foto_profile").change(showModal);
	$(".modal .close").click(function(){
		$(".image-modal").fadeOut('slow');
	});
	// $("#view_password").click(function(){
	// 	$('#password').get(0).type = 'text';
	// });
});