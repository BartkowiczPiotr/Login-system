$(document).on('click', '#login-form__button', function(){
		
	let email = $('#login-form__input--email').val();
	let password = $('#login-form__input--password').val();
	
	$('.alert-label-message').remove();
	
	if(email == "" || password == ""){
			
		al.label({
			type : "error",
			message: "Please enter email or password"
		});

	}else{
			
		$.ajax({
			url: "Controler/login.php",
			method: "POST",
			data:{email:email, password:password},
			success: function(data){
				$('.alert-label').html(data);
			}
					
		});

	}
		
});









