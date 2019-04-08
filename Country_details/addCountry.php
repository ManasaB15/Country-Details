<?php
	include("dbconfig.php");
	include("session.php");
	include("links.php");
	$cname        = $_POST['cname'];
	$code		  = $_POST['code'];
	$capital      = $_POST['capital'];
	$lang         = $_POST['lang'];
	$currency     = $_POST['currency'];
	$call         = $_POST['call'];
	
	$sql = "INSERT INTO country(country_name,country_code,capital,official_language,currency,calling_code)
	    VALUES('$cname','$code','$capital','$lang','$currency','$call')";
	$status = mysqli_query($conn, $sql);
	if ($status == 1) {?>
     <script>
			$(function() {
			$("#exampleModal").modal();
			});

		</script>
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 		 <div class="modal-dialog" role="document">
    	<div class="modal-content">
		<div class="modal-header">
      		<h5 class="modal-title" id="exampleModalLongTitle">Add Country</h5>
 
          <button type="button" class="close" data-dismiss="modal" data-toggle="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      	</div>
      	<div class="modal-body">
        <p>Country added successfully...</p>
      	</div>
		<div class="modal-footer">
		<a href="country_list.php" role="button" class="btn btn-secondary">OK</a>
        <!-- <a href="delState.php
      	</div>
    	</div>
 	 	</div>
		</div>
  <?php }else{
    echo "Error: " . $status . "<br>" . $conn->error;
      }
?>