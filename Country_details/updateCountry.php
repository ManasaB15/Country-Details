<?php
	include("dbconfig.php");
	include("session.php");
	include("links.php");

	$id=$_POST['id'];
	$cname        = $_POST['cname'];
	$code		  = $_POST['code'];
	$capital      = $_POST['capital'];
	$lang         = $_POST['lang'];
	$currency     = $_POST['currency'];
	$call         = $_POST['call'];
	
	
	$sql="UPDATE country set
							country_name='$cname',
							country_code='$code',
							capital='$capital',
							official_language='$lang',
							currency='$currency',
							calling_code='$call'
							where country_id='".$id."'";
						
	if(mysqli_query($conn,$sql)==true)
	{?>
		
		<script>
			$(function() {
			$("#exampleModal").modal();
			});

		</script>
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 		<div class="modal-dialog" role="document">
    	<div class="modal-content">
		<div class="modal-header bg-primary">
      		<h5 class="modal-title" id="exampleModalLongTitle">Add State</h5>
 			<button type="button" class="close" data-dismiss="modal" data-toggle="modal" aria-label="Close">
         	<span aria-hidden="true">&times;</span>
        	</button>
      	</div>
      	<div class="modal-body">
        	<p>Country updated successfully...</p>
      	</div>
		<div class="modal-footer">
			<a href="country_list.php" role="button" class="btn btn-warning btn-secondary">OK</a>
       	</div>
    	</div>
 	 	</div>
		</div>
	<?php }?>
	