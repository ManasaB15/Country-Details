<?php
	include("dbconfig.php");
	include("session.php");
	include("header.php");
	
	$stateId=$_GET['state_id'];
	$_SESSION['id']=$stateId;

	$sql="SELECT * from dist_state_count WHERE state_id='".$stateId."'";
	$result=mysqli_query($conn,$sql);

	$state=mysqli_num_rows($result);

	if($state>0){?>
		<script>
			$(function() {
			$("#exampleModal").modal();
			});

		</script>
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 		 <div class="modal-dialog" role="document">
    	<div class="modal-content">
		<div class="modal-header">
      		<h5 class="modal-title" id="exampleModalLongTitle">State delete</h5>
 
          <button type="button" class="close" data-dismiss="modal" data-toggle="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      	</div>
      	<div class="modal-body">
        <p>Are you sure??</p>
      	</div>
		<div class="modal-footer">
		<a href="state_list.php" role="button" class="btn btn-secondary">NO</a>
         <a href="stateDelete.php" role="button" class="btn btn-primary">YES</a> 
      	</div>
    	</div>
 	 	</div>
		</div>
	<?php }
	else
	{
		// $delState="DELETE FROM state where state_id='".$stateId."'";
		// $result1=mysqli_query($conn,$delState);
	?>
		<script>
			$(function() {
			$("#exampleModal").modal();
			});
		</script>
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 		 <div class="modal-dialog" role="document">
    	<div class="modal-content">
		<div class="modal-header">
      		<h5 class="modal-title" id="exampleModalLongTitle">State Delete</h5>
 
          <button type="button" class="close" data-dismiss="modal" data-toggle="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      	</div>
      	<div class="modal-body">
        <p>This state contains district..Please delete district first.....</p>
      	</div>
		<div class="modal-footer">
       	<a href="state_list.php" role="button" class="btn btn-secondary">OK</a>
       
      	</div>
    	</div>
 	 	</div>
		</div>
	<?php } ?>
