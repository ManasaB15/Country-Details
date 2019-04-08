<?php
include("session.php");
include("header.php");
include("dbconfig.php"); 


$districtId = $_POST['districtid'];
$district=$_POST['districtname'];
$country=$_POST['cname'];
$state=$_POST['sname'];
$dcode=$_POST['code'];
$population=$_POST['num'];
$area=$_POST['area'];


$updatecsd="UPDATE dist_state_count SET  country_id='".$country."',
					state_id='".$state."'
					where district_id='".$districtId."'"; 
$res = mysqli_query($conn, $updatecsd) ;

$updatedistrict="UPDATE district set
						district_name='".$district."',
						district_code='".$dcode."',
						population='".$population."',
						area='".$area."'
						where district_id='".$districtId."'"; 

$res1= mysqli_query($conn, $updatedistrict) ;
 
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
      		<h5 class="modal-title" id="exampleModalLongTitle">Update District</h5>
 
          <button type="button" class="close" data-dismiss="modal" data-toggle="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      	</div>
      	<div class="modal-body">
        <p>District updated successfully...</p>
      	</div>
		<div class="modal-footer">
		<a href="district_list.php" role="button" class="btn btn-warning btn-secondary">OK</a>
      	</div>
    	</div>
 	 	</div>
		</div>
	<?php } ?>

