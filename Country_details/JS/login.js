$(document).ready(function(){
	$(".btn-primary").click(function(e){
	 e.preventDefault();
		var email=$("#email").val();
		var password=$("#password").val();

		var  status=true;

		if(email=="") {
		 $("#email").css('border-color','red');
		 $("#emailerror").text('Enter Email').css('color','red');
		 status=false;
		}
		else if(!validateEmail(email))
		{
			$("#email").css('border-color','red');
		 	$("#emailerror").text('Invalid Email').css('color','red');
		 	status=false;
		}
		else {
		 $("#email").css('border-color','');
		 $("#emailerror").text('').css('color', '');
	    }
	    function validateEmail(email) {
			var emailReg = /^[a-z]+[a-z0-9._]+@[a-z]+\.[a-z.]{2,5}$/;
		  	return emailReg.test( email );
		}

		if(password==""||password.length > 8) {
		 $("#password").css('border-color','red');
		 $("#passworderror").text('Enter valid password').css('color','red');
		 status=false;
		}
		else if(!validatePassword(password))
		{
			$("#password").css('border-color','red');
		 	$("#passworderror").text('Invalid password').css('color','red');
		 	status=false;
		}
		else {
		 $("#password").css('border-color','');
		 $("#passworderror").text('');
		}
		    function validatePassword(password) {
			var passwordReg = /^[a-zA-Z0-9]+$/;
		  	return passwordReg.test( password );
		}

		if(status==true) {
		 $("#login").submit();
	    }
	});
});