$(function() {
	$.initForm(function(){
		//dalem ini isinya yg isi data tadi yg di comment di scripts.js
		$("#kode_product").val($(this).data("kode_product"));
		$("#nama_product").val($(this).data("nama_product"));
		$("#merk_product").val($(this).data("merk_product"));
		$("#selling_price").val($(this).data("selling_price"));
		$("#id-description").val($(this).data("id-description"));
		$("select[name=category_product]").val($(this).data("selecttype"));
		console.log($(this).data());
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