<?php
	include("dbconfig.php");
	include("session.php");
	include("header.php");

	$countryId=$_GET['country_id'];
	$_SESSION['id'] = $countryId;

	//echo $countryId;exit;
	$sql="SELECT * from country_state WHERE country_id='".$countryId."'";
	$result=mysqli_query($conn,$sql);

	$country=mysqli_num_rows($result);

	if($country==0){ ?>
		
		<script>
			$(function() {
			$("#exampleModal").modal();
			});

		</script>
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 		 <div class="modal-dialog" role="document">
    	<div class="modal-content">
		<div class="modal-header">
      		<h5 class="modal-title" id="exampleModalLongTitle">Country delete</h5>
 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      	</div>
      	<div class="modal-body">
        <p>Are You sure to delete the country?</p>
      	</div>
		<div class="modal-footer">
		<a href="country_list.php" role="button" class="btn btn-secondary">NO</a>
        <a href="countryDelete.php" role="button" class="btn btn-primary">YES</a>
      	</div>
    	</div>
 	 	</div>
		</div>
	<?php }
	else
	{
		// $delCountry="DELETE FROM country where country_id='".$countryId."'";
		// $result1=mysqli_query($conn,$delCountry);
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
      		<h5 class="modal-title" id="exampleModalLongTitle">Country delete</h5>
 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      	</div>
      	<div class="modal-body">
        <p>This country contains state. Please delete state first..</p>
      	</div>
		<div class="modal-footer">
        <a href="country_list.php" role="button" class="btn btn-primary">OK</a>
      	</div>
    	</div>
 	 	</div>
		</div>
	<?php } ?>


 





