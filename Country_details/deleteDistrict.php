<?php
	include('dbconfig.php');
	include("header.php");
	session_start();
	
	$id = $_SESSION['id'];
	$delDistrict="DELETE FROM district where district_id='".$id."'";
	$result=mysqli_query($conn,$delDistrict);

	

	if($result == true)
	{ ?>
		
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
        <p>District deleted successfully.....</p>
      	</div>
		<div class="modal-footer">
        <a href="district_list.php" role="button" class="btn btn-primary">OK</a>
      	</div>
    	</div>
 	 	</div>
		</div>
<?php	}
	else
	{ ?>
		
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
        <p>Please try again.....</p>
      	</div>
		<div class="modal-footer">
        <a href="district_list.php" role="button" class="btn btn-primary">OK</a>
      	</div>
    	</div>
 	 	</div>
		</div>
<?php	}
	