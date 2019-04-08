<?php
	include("dbconfig.php");
	include("session.php");
	include("links.php");

	$districtId=$_GET['district_id'];
	$_SESSION['id']=$districtId;

	$sql="SELECT * from dist_state_count WHERE district_id='".$districtId."'";
	$result=mysqli_query($conn,$sql);

	$district=mysqli_num_rows($result);

	if($district>0){?>
		
		<script>
			$(function() {
			$("#exampleModal").modal();
			});
		</script>
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 		 <div class="modal-dialog" role="document">
    	<div class="modal-content">
		<div class="modal-header">
      		<h5 class="modal-title" id="exampleModalLongTitle">District delete</h5>
 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      	</div>
      	<div class="modal-body">
        <p>Are you sure?.....</p>
      	</div>
		<div class="modal-footer">
        <a href="district_list.php" role="button" class="btn btn-primary">NO</a>
         <a href="deleteDistrict.php" role="button" class="btn btn-primary">YES</a>
      	</div>
    	</div>
 	 	</div>
		</div>
	<?php	}
	
	 ?>
		