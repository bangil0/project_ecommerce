/*
# ----------------------------------------------------------------------
# CHECKOUT: JAVASCRIPT
# ----------------------------------------------------------------------
*/

var base_url = $('#id-hidden-base-url').val();
var currency = $('#id-hidden-currency').val();


function openOverlay() {
   $('#overlayhelp').removeClass('hidden');
}


function closeOverlay() {
   $('#overlayhelp').addClass('hidden');
}


function setCountry(){
   var country  = $('#id_checkout_user_country option:selected').val();
   var province = $('#id_checkout_user_province option:selected').val();
   var city     = $('#id_checkout_user_city option:selected').val();
   var rate     = $('#id-shipping option:selected').val();
   
   if(country == ""){
      $('#id_hidden_checkout_country').val("indonesia");
   }else{
      $('#id_hidden_checkout_country').val(country);
   }
   
   if(province == ""){
      $('#id_hidden_checkout_province').val("Jakarta");
	  $('#id_checkout_user_province option[value="Jakarta"]').attr('selected', 'selected');
   }else{
      $('#id_hidden_checkout_province').val(province);
	  $('#id_checkout_user_province option[value="'+country+'"]').attr('selected', 'selected');
   }
   
   if(city == ""){
      $('#id_hidden_checkout_city').val("Jakarta");
   }else{
      $('#id_hidden_checkout_city').val(city);
   }
   
   if(rate == ""){
      $('#id_hidden_checkout_courier').val("13");
   }else{
      $('#id_hidden_checkout_courier').val(rate);
   }
   
}


function ajaxProvince(user_country){
   
   if(user_country == '' || typeof user_country === 'undefined'){
      //$('#id-country option[value="Indonesia"]').prop('selected', true);
   }else{
      $('#id-country option[value="'+user_country+'"]').prop('selected', true);
   }
   
   var country = $('#id-country option:selected').val();
   
   if(country == 'Indonesia'){
   
      var ajx   = $.ajax({
	                 type: "POST",
				     url: base_url+"order_/ajax/ajax_province.php",
				     data: {country:country},
				     error: function(jqXHR, textStatus, errorThrown) {
					   
					        }
			      }).done(function(data) {	
			         $('#ajax-load-province').html(data);
				     ajaxCity();
				  }); 
   }else{
      $('#ajax-load-province').html('<input type="text" name="checkout_user_province" class="form-control input-sm w50" id="id-province">');
	  ajaxCity();
	  ajaxCourier();
	  ajaxCourierRadio();
   }
   
}


function ajaxCity(){
   var country = $('#id-country option:selected').val();
   
   if(country == 'Indonesia'){
      var province = $('#id-province option:selected').val();
   
      var ajx   = $.ajax({
	                 type: "POST",
				     url: base_url+"order_/ajax/ajax_city.php",
				     data: {country:country, province:province},
				     error: function(jqXHR, textStatus, errorThrown) {
					   
					        }
			      }).done(function(data) {	
			         $('#ajax-load-city').html(data);
				     ajaxCourier();
					 ajaxCourierRadio();
				  }); 
   }else{
      $('#ajax-load-city').html('<input type="text" name="checkout_user_city" class="form-control input-sm w50" id="id-city">');
	  ajaxCourier();
	  ajaxCourierRadio();
   }
    
}


function ajaxCourier(){
   var country = $('#id-country option:selected').val();
   var city    = $('#id-city option:selected').val();
   
   if(typeof city === 'undefined'){
      city = 'none';
	  $('#id-box-shipping').addClass('hidden');
   }else if(city == 0){
      city = 'none';
	  $('#id-box-shipping').addClass('hidden');
   }else{
      city = city;
	  $('#id-box-shipping').removeClass('hidden');
   }
	  
   var ajx   = $.ajax({
	              type: "POST",
				  url: base_url+"order_/ajax/ajax_courier.php",
				  data: {country:country,city:city},
				  error: function(jqXHR, textStatus, errorThrown) {
					   
					     }
			   }).done(function(data) {	
			      $('#ajax-load-courier').html(data);
				  setCountry();
				  setRate();
				  ajaxCourierRadio();
			   });  
   
}


function ajaxCourierRadio(){
   var country = $('#id-country option:selected').val();
   var city    = $('#id-city option:selected').val();
   
   if(typeof city === 'undefined'){
      city = 'none';
   }else{
      city = city;
   }
	  
   var ajx   = $.ajax({
	              type: "POST",
				  url: base_url+"order_/ajax/ajax_courier_radio.php",
				  data: {country:country,city:city},
				  error: function(jqXHR, textStatus, errorThrown) {
					   
					     }
			   }).done(function(data) {	
			      $('#ajax-load-courier-radio').html(data);
				  setCountry();
				  setRate();
			   });  
   
}


function setRate(){
   var cid    = $('#id-shipping option:selected').val();
   var amount = $('#id_summary_amount').val();
   var rate   = $('#id-shipping option:selected').attr('rate');
   var ship   = accounting.formatMoney(rate, "", 0, ".", ",");
   var sum    = Number(amount)+Number(rate);
   var total  = accounting.formatMoney(sum, "", 0, ".", ",");
   
   var ajx    = $.ajax({
	               type: "POST",
				   url: base_url+"order_/ajax/ajax_checkout.php",
				   data: {amount:amount,rate:rate},
				   error: function(jqXHR, textStatus, errorThrown) {
					   
					      }
			    }).done(function(data) {
				   $('#id_hidden_checkout_courier').val(cid);
				   $('#checkout_summary_shipping').text(currency+ship);
				   $('#id_summary_shipping').val(rate);
				   $('#total_summary').text(currency+total);
				   $('#hidden_checkout_amount').val(amount);
				   $('#hidden_checkout_total').val(sum);
				   $('#id-opt-shipping-amount').text(ship);
			    }); 
   
   
   
}
	
	
function selectCountry(x){
   $('#id_checkout_user_country option[value="'+x+'"]').attr('selected', true);
}


/* --- START: BILLING --- */
function ajaxProvinceBilling(user_country){
   
   if(user_country == '' || typeof user_country === 'undefined'){
      //$('#id-country option[value="Indonesia"]').attr('selected', true);
	  $('#id-billing-country option[value="Indonesia"]').attr('selected', true);
   }else{
      $('#id-billing-country option[value="'+user_country+'"]').attr('selected', true);
   }
   
   var $btn    = $('#btn-alias-submit').button('loading');
   var country = $('#id-billing-country option:selected').val();
   
   if(country == 'Indonesia'){
   
      var ajx   = $.ajax({
	                 type: "POST",
				     url: base_url+"order_/ajax/ajax_province_billing.php",
				     data: {country:country},
				     error: function(jqXHR, textStatus, errorThrown) {
					   
					        }
			      }).done(function(data) {	
			         $('#ajax-billing-load-province').html(data);
				     ajaxCityBilling();
				  }); 
				  
   }else{
      $('#ajax-billing-load-province').html('<input type="text" name="billing-province" class="form-control input-sm w50" id="id-billing-province">');
	  ajaxCityBilling();
	  ajaxCourier();
	  ajaxCourierRadio();
   }
   
}


function ajaxCityBilling(){
   var country = $('#id-billing-country option:selected').val();
   var $btn    = $('#btn-alias-submit').button('loading');
   
   if(country == 'Indonesia'){
      var province = $('#id-province option:selected').val();
   
      var ajx   = $.ajax({
	                 type: "POST",
				     url: base_url+"order_/ajax/ajax_city_billing.php",
				     data: {country:country, province:province},
				     error: function(jqXHR, textStatus, errorThrown) {
					   
					        }
			      }).done(function(data) {	
			         $('#ajax-billing-load-city').html(data);
				     $btn.button('reset');
				  }); 
   }else{
      $('#ajax-billing-load-city').html('<input type="text" name="billing-city" class="form-control input-sm w50" id="id-billing-city">');
	  //ajaxCourier();
   }
    
}

function billingForm(){
   var checked = $('#id-same-billing-address:checked').val();
   
   if(typeof checked === 'undefined'){
      $('#id-billing-form').removeClass('hidden');
   }else{
      $('#id-billing-form').addClass('hidden');
   }
   
}

function controlSameShipping(){
   var radio    = $('#id-same-billing-address').is('checked');
   var country  = $('#id-country option:selected').val();
   var province = $('#id-province option:selected').val();
   var city     = $('#id-city option:selected').val();
}
/* --- END: BILLING --- */


function paymentSelect(){
   var option_payment = $('input[name="opt-payment"]:checked').val();
   $('#id-payment option[value="'+option_payment+'"]').attr('selected', true);
}



function validateCheckout(){
   var $root    = $('html, body');
   var fname    = $('#id-fname').val();
   var lname    = $('#id-lname').val();
   var phone    = $('#id-phone').val();
   var address  = $('#id-address').val();
   var city     = $('#id_checkout_user_city').val();
   var country  = $('#id-country option:selected').val();
   
   
   var postal   = $('#id-postal').val();
   var shipping = $('#id-opt-shipping-0').val();
   var payment  = $('#id-payment option:selected').val();
   var payment_method = $('#id-payment-method option:selected').val();
   

   $('#id-row-address').removeClass('has-error');
   $('#id-row-fname').removeClass('has-error');
   $('#id-row-lname').removeClass('has-error');
   $('#id-row-phone').removeClass('has-error');
   $('#id-row-address').removeClass('has-error');
   $('#id-row-country').removeClass('has-error');
   $('#id-row-province').removeClass('has-error');
   $('#id-row-city').removeClass('has-error');
   $('#id-row-postal').removeClass('has-error');
   $('#id-row-shipping').removeClass('has-error');
   $('#id-row-payment').removeClass('has-error');
   
   if(fname == ''){
      $('#id-row-fname').addClass('has-error');
      alert("Masukan data secara lengkap!");
	  $root.animate({
	     scrollTop: $('#id-box-details').offset().top
	  }, 500);
	  return false;
	  
   }else if(lname == ''){
      alert("Silahkan lengkapi DATA !");
      $('#id-row-lname').addClass('has-error');
	  $root.animate({
	     scrollTop: $('#id-box-details').offset().top
	  }, 500);
	  return false;
   }else if(phone == ''){
      alert("Silahkan lengkapi DATA !");
      $('#id-row-phone').addClass('has-error');
	  $root.animate({
	     scrollTop: $('#id-box-details').offset().top
	  }, 500);
	  return false;
   }else if(address == ''){
      alert("Silahkan lengkapi DATA !");
      $('#id-row-address').addClass('has-error');
	  $root.animate({
	     scrollTop: $('#id-box-details').offset().top
	  }, 500);
	  return false;
   }else if(country == ''){
      alert("Silahkan lengkapi DATA !");
      $('#id-row-country').addClass('has-error');
	  $root.animate({
	     scrollTop: $('#id-box-details').offset().top
	  }, 500);
	  return false;
   }else if(city == ''){
      alert("Silahkan lengkapi DATA !");
      $('#id-row-city').addClass('has-error');
	   $root.animate({
	     scrollTop: $('#id-box-details').offset().top
	  }, 500);
	  return false;
   }else if(postal == ''){
      alert("Silahkan lengkapi DATA !");
      $('#id-row-postal').addClass('has-error');
	  $root.animate({
	     scrollTop: $('#id-box-details').offset().top
	  }, 500);
	  return false;
   }else if(shipping == ''){
      $('#id-row-shipping').addClass('has-error');
   }else if(payment == ''){
      $('#id-row-payment').addClass('has-error');
   }else{
      $('#id_btn_submit_checkout').click();
   }
   
   
}

$(document).ready(function() {
   var optionValue = $(".option_value").select2({
   });
   $('#btn-alias-submit').click(function(){
       validateCheckout();
   });
   $('#id_checkout_user_city').change(function(event) {
      console.log($(this).val());
      $.ajax({
         url:"../controller/control_checkout.php",
         type:"post",
         data:{payment_shipping:$(this).val()},
            success: function(data){
              console.log(data);
              $('#id-opt-shipping-amount-0').text("Rp"+data.cost);
            }
          });
   });

});
