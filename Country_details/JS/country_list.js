$(document).ready(function(){
			//==================================//
				$(".btn-danger").click(function(e){
					e.preventDefault();
						var name=$("#cname").val();
						var code=$("#code").val();
						var capital=$("#capital").val();
						var lang=$("#lang").val();
						var currency=$("#currency").val();
						var call=$("#call").val();
				
						var status=true;
					
					
					//--------------------for country name------------------//
					if(name=="") {
						$("#cname").css('border-color','red');
						$("#countryErr").text('Plaese enter country name').css('color','red');
						status=false;
					}
					else if(!validateName(name)) {
			          $("#cname").css('border-color','red');
			          $("#countryErr").text('Invalid country name').css('color','red');
			          status=false;
		            }

					else {
						$("#cname").css('border-color','');
						$("#countryErr").text('');
					}
					function validateName(name) {
		              var nameReg = /^[a-zA-Z_ ]*$/;;
		              return nameReg.test(name);
		            }

					//---------------for country code----------------------//
					if(code==""){
						$("#code").css('border-color','red');
						$("#codeErr").text('Please enter country code').css('color','red');
						status=false;
					}

					else {
						$("#code").css('border-color','');
						$("#codeErr").text('');
					}

					//---------------------for capital----------------//
					
					if(capital==""){
						$("#capital").css('border-color','red');
						$("#capitalErr").text('Please enter capital').css('color','red');
						status=false;
					}

					else {
						$("#capital").css('border-color','');
						$("#capitalErr").text('');
					}
					//------------------------for language----------------//
					if(lang==""){
						$("#lang").css("border-color","red");
						$("#langErr").text("Please enter official language").css("color","red");
						status=false;
					}

					else{
						$("#lang").css("border-color","");
						$("#langErr").text("");
					}
					
					//----------------------Currency----------//
					if(currency==""){
						$("#currency").css('border-color','red');
						$("#currencyErr").text('Please enter currency').css('color','red');
						status=false;
					}else{
						$("#currency").css('border-color','');
						$("#currencyErr").text('');
					}
					//---------------for calling code----------------------//
					if(call==""){
						$("#call").css('border-color','red');
						$("#callErr").text('Please enter calling code').css('color','red');
						status=false;
					}else{
						$("#call").css('border-color','');
						$("#callErr").text('');
					}
					
					//--------------------------------------------------//
					if(status==true)
					{
						$("#country_list").submit();
					}
					
				});//btnclick closes
			//==================================//
			});

	