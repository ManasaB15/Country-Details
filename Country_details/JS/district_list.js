$(document).ready(function(){
			//==================================//
				$(".btn-danger").click(function(e){
					e.preventDefault();
						var name=$("#dname").val();
						var cname=$("#cname option:selected").val();
						var sname=$("#sname option:selected").val();
						var code=$("#code").val();
						var population=$("#population").val();
						var area=$("#area").val();
				
						var status=true;
					
					
					//--------------------for state name------------------//
					if(name=="") {
						$("#dname").css('border-color','red');
						$("#distErr").text('Plaese enter district name').css('color','red');
						status=false;
					}
					else if(!validateName(name)) {
			          $("#dname").css('border-color','red');
			          $("#distErr").text('Invalid district name').css('color','red');
			          status=false;
		            }

					else {
						$("#dname").css('border-color','');
						$("#distErr").text('');
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

					 //-----------------------country-----------------------//
		            if(sname=="") {
						$("#sname").css('border-color', 'red');
						$("#stateErr").text("Please choose state").css('color','red');
						status=false;
					}else {
						$("#sname").css('border-color', '');
						$("#stateErr").text("").css('color', '');
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

				
					//------------------------for language----------------//
					if(population==""){
						$("#population").css("border-color","red");
						$("#populationErr").text("Please enter population").css("color","red");
						status=false;
					}

					else{
						$("#population").css("border-color","");
						$("#populationErr").text("");
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
						$("#district_list").submit();
					}
					
				});//btnclick closes
				
			//==================================//
			});

	