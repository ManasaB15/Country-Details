$(document).ready(function(){
			//==================================//
				$(".btn-danger").click(function(e){
					e.preventDefault();
						var name=$("#sname").val();
						var cname=$("#cname option:selected").val();
						var capital=$("#capital").val();
						var code=$("#code").val();
						var lang=$("#lang").val();
						var area=$("#area").val();
				
						var status=true;
					
					
					//--------------------for state name------------------//
					if(name=="") {
						$("#sname").css('border-color','red');
						$("#stateErr").text('Plaese enter state name').css('color','red');
						status=false;
					}
					else if(!validateName(name)) {
			          $("#sname").css('border-color','red');
			          $("#stateErr").text('Invalid state name').css('color','red');
			          status=false;
		            }

					else {
						$("#sname").css('border-color','');
						$("#stateErr").text('');
					}
					function validateName(name) {
		              var nameReg = /^[a-zA-Z_ ]*$/;
		              return nameReg.test(name);
		            }

		            //-----------------------country-----------------------//
		            if(cname=="") {
						$("#cname").css('border-color', 'red');
						$("#countryErr").text("Please choose country").css('color','red');
						status=false;
					}else {
						$("#cname").css('border-color', '');
						$("#countryErr").text("").css('color', '');
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
						$("#capitalErr").text('Please enter capital city').css('color','red');
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
					
					
					//---------------for area----------------------//
					if(area==""){
						$("#area").css('border-color','red');
						$("#areaErr").text('Please enter area').css('color','red');
						status=false;
					}else{
						$("#area").css('border-color','');
						$("#areaErr").text('');
					}
					
					//--------------------------------------------------//
					if(status==true)
					{
						$("#state_list").submit();
					}
					
				});//btnclick closes
			//==================================//

			
			});


	