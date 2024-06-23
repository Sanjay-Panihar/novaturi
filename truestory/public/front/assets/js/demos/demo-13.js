// Demo 4 Js file
$(document).ready(function () {
    'use strict';

	

	

	$("#registerform").submit(function(){
        var formdata = $(this).serialize();
		$.ajax({
			url:"/Customer/registration",
			type:"POST",
			data:formdata,
			success:function(resp){
				
				if (resp.type=="error") {
					$.each(resp.errors,function(i,error){
						$("#user-"+i).attr('style','color:red');
						$("#user-"+i).html(error);


					
					setTimeout(function(){
						$("#user-"+i).css({'display':'none'});
					},3000);	
				});				
				}else if (resp.type=="success"){
				
				window.location.href = resp.url; }
			},error:function(){
			
			}
		})

    });
    
    
    ///////////////forget password //////////////////////////////
    $("#forgotpassword").submit(function(e) {
		e.preventDefault(); // prevent default form submission
		var formdata = $(this).serialize();
		$.ajax({
			url: "/user/forgot-password",
			type: "POST",
			data: formdata,
			success:function(resp){
				if (resp.type=="error") {
					$.each(resp.errors,function(i,error){
						$("#forgot-"+i).attr('style','color:red');
						$("#forgot-"+i).html(error);
					setTimeout(function(){
						$("#forgot-"+i).css({'display':'none'});
					},3000);	
				});				
				}else if (resp.type=="success"){
				
				window.location.href = resp.url; }
			},error:function(){
			
			}
		});
	});
    

  ///////////////////login form ////////////////////////////////

	$("#loginform").submit(function(){
        var formdata = $(this).serialize();
		$.ajax({
			url:"/Customer/login",
			type:"POST",
			data:formdata,
			success:function(resp){
				//alert(resp.type);
				if (resp.type=="error"){
					$.each(resp.errors,function(i,error){
						$("#login-"+i).attr('style','color:red');
						$("#login-"+i).html(error);
					setTimeout(function(){
						$("#login-"+i).css({'display':'none'});
					},3000);	
				});				
				}else if (resp.type=="success"){
				
				   window.location.href = resp.url; }
				else if (resp.type=="incorrect"){
				    /// alert(resp.message);
					 
					$("#login-error").attr('style','color:red');
					$("#login-error").html(resp.message);
				}   
				else if (resp.type=="inactive"){
				    /// alert(resp.message);
					 
					$("#login-error").attr('style','color:red');
					$("#login-error").html(resp.message);
				} 
			},error:function(){
				alert("Error");
			}
		})

    });


	////////////////////////////user account addess update //////////////////////////////////

	
	$("#accountform").submit(function(){
        var formdata = $(this).serialize();
		$.ajax({
			url:"/user/account",
			type:"POST",
			data:formdata,
			success:function(resp){
				alert(resp.type);
				if (resp.type == "error") {
					$.each(resp.errors, function (i, error) {
						$("#account-" + i).attr('style', 'color:red');
						$("#account-" + i).html(error);
						setTimeout(function () {
							$("#account-" + i).css({ 'display': 'none' });
						}, 3000);
					});
				} else if (resp.type == "success") {
					$("#account-success").attr('style', 'color:green');
					$("#account-success").html(resp.message);
				}				
			},error:function(){
				alert("Error");
			}
		})

    });

	//////////////////////////////////////////////////end//////////////////////////////////////////////////////


	///////edit delivery address////////////////////////////////

	$(document).on('click','.editAddress',function(){
		var addressid = $(this).data("addressid");
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			data:{addressid:addressid},
			url:'/get-delivery-address',
			type:'post',
			success:function(resp){
				$('[name=delivery_id]').val(resp.address['id']);
				$('.newAddress').hide();
				$('.deliveryText').text("Edit Delivery Address");
				$('[name=delivery_name]').val(resp.address['name']);
				$('[name=delivery_address]').val(resp.address['address']);
				$('[name=delivery_Country]').val(resp.address['country']);
				$('[name=delivery_City]').val(resp.address['city']);
				$('[name=delivery_State]').val(resp.address['state']);
				$('[name=delivery_Pincode]').val(resp.address['pincode']);
				$('[name=delivery_Mobile]').val(resp.address['mobile']);

				
			},error:function(){
				alert("Error");
			}

		})

	});

	////////////////////end///////////////////////////

	///////save delivery address
	$(document).on('submit',"#addressAddEditForm",function(){
		var formdata = $("#addressAddEditForm").serialize();
		$.ajax({
			url:'/save-delivery-address',
			type:'post',
			data:formdata,
			success:function(resp){
				if (resp.type == "error") {
					$.each(resp.errors, function (i, error) {
						$("#delivery-" + i).attr('style', 'color:red');
						$("#delivery-" + i).html(error);
						setTimeout(function () {
							$("#delivery-" + i).css({ 'display': 'none' });
						}, 3000);
					});
				} else{
					$("#deliveryAddresses").html(resp.view);

				}

				

			},error:function(){
				alert("Error");
			}
		});

	});
	
	//////////////remove delivery address/////////////

	$(document).on('click','.removeDeliveryAddress',function(){
		if(confirm("Are you sure to remove this?")){
			var addressid = $(this).data("addressid");
			$.ajax({
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				url:'/remove-delivery-address',
			    type:'post',
			    data:{addressid:addressid},
				success:function(resp){
					/*alert(data);*/
	
					$("#deliveryAddresses").html(resp.view);
	
				},error:function(){
					alert("Error");
				}

			});
		}

	});


	$(".userLogin").click(function(){
		alert("Login to add ptoduct in your Wishlist");

	});
	
	$(".updateWishlist").click(function(){
		var product_id = $(this).data('product_id');
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			type:"post",
			url:"/update-wishlist",
			data:{"product_id":product_id},
			success:function(resp){
				console.log(resp);
				if(resp.action=='add'){
					$('button[data-product_id='+product_id+']').html('Wishlist <i class="bi bi-heart-fill"></i>');
					
				}else if(resp.action=='remove'){
					$('button[data-product_id='+product_id+']').html('Wishlist <i class="bi bi-heart"></i>');
				}
				
			},
			
			error: function(xhr, status, error){
				console.log("Error: ", error); // Add this line for debugging
				alert("error");}

		}) 

		
	});



	///////////////////price by attribute change /////////////////////////
	$("#getPrice").change(function () {
    var size = $(this).val();
    var product_id = $(this).attr("product-id");

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '/get-product-price',
        data: {size: size, product_id: product_id},
        type: 'post',     
        success: function (resp) {
            if (resp.discount > 0) {
                $(".getAttributePrice").html("<div class='price'>Rs:" + resp['final_price']+ "</div><div class='Original-price'><label >Original Price Rs:" + resp['product_price']+ "</label></div>");
            } else {
                $(".getAttributePrice").html("<div>Rs:" + resp['final_price'] + "</div>");
            }
        },
        error: function () {
            alert("Error");
        }
    });
});

 // delete cart item 

 $(document).on('click','.deleteCartItem',function(){
	var cartid = $(this).data('cartid');
	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		url:'/cart/delete',
		type:'post',
		data:{cartid:cartid},
		success:function(resp){
					/*alert(data);*/
			$("#appendCartItems").html(resp.view);
	
		},error:function(){
			alert("Error");
		}

	})


 });

   

});

