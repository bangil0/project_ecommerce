$(function() {
	$.initForm(function(){
		//dalem ini isinya yg isi data tadi yg di comment di scripts.js
    	$("select[name=visibility]").val($(this).data("selecttype"));
		$("#nama").val($(this).data("nama"));
		$("#id_category").val($(this).data("idcategory"));
		console.log($(this).data("selecttype"));
		// alert(data();
	});
});