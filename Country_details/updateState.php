<?php
include("session.php");
include("header.php");
include("dbconfig.php"); 


$stateId = $_POST['stateid'];
$state=$_POST['statename'];
$country=$_POST['cname'];
$capital=$_POST['capital'];
$scode=$_POST['code'];
$language=$_POST['lang'];
$area=$_POST['area'];


$updatecountstate="UPDATE country_state SET  country_id='".$country."',
					state_id='".$stateId."'
					 where state_id='".$stateId."'";  
$res = mysqli_query($conn, $updatecountstate) ;

$updatestate="UPDATE state SET  state_name='".$state."',
				state_code='".$scode."',
				capital_city='".$capital."',
				official_language='".$language."',
				area='".$area."'
 				where state_id='".$stateId."'"; 
$res1= mysqli_query($conn, $updatestate) ;
 
if($res == true && $res1==true){?>
	<script>
			$(function() {
			$("#exampleModal").modal();
			});
	</script>
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 		 <div class="modal-dialog" role="document">
    	<div class="modal-content">
		<div class="modal-header bg-primary">
      		<h5 class="modal-title" id="exampleModalLongTitle">Update State</h5>
 
          <button type="button" class="close" data-dismiss="modal" data-toggle="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      	</div>
      	<div class="modal-body">
        <p>State details updated successfully...</p>
      	</div>
		<div class="modal-footer">
		<a href="state_list.php" role="button" class="btn btn-warning btn-secondary">OK</a>
       	</div>
    	</div>
 	 	</div>
		</div>
	<?php }?>
	

