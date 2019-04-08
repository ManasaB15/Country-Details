<?php
	include("dbconfig.php");
	include("session.php");
	include("links.php");
	$sname        = $_POST['sname'];
	$capital      = $_POST['capital'];
	$lang         = $_POST['lang'];
	$code		  = $_POST['code'];
	$area         = $_POST['area'];
	$cname        = $_POST['cname'];

	
	$sql ="INSERT INTO state(state_name,capital_city,state_code,official_language,area)
	    VALUES('$sname','$capital','$code','$lang','$area')";
	$result=mysqli_query($conn,$sql);  
	
	$select="SELECT state_id FROM state ORDER BY state_id DESC LIMIT 0, 1" ;
	$resultstate=mysqli_query($conn,$select); 
	$row=mysqli_fetch_assoc($resultstate); 

 	//foreach($cname as $country){
  	$insertcountstate = "INSERT INTO country_state(state_id,country_id)VALUES('".$row['state_id']."','".$cname."')";
 	 $stateresult=mysqli_query($conn,$insertcountstate);
	//}
  	//$row1=mysqli_fetch_assoc($resultstate);
	// print_r($row1);exit;
 	//}
	
	$status1 = mysqli_query($conn, $stateresult);
	if ($result==1) {?>

	   <script>
			$(function() {
			$("#exampleModal").modal();
			});

		</script>
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 		 <div class="modal-dialog" role="document">
    	<div class="modal-content">
		<div class="modal-header">
      		<h5 class="modal-title" id="exampleModalLongTitle">Add State</h5>
 
          <button type="button" class="close" data-dismiss="modal" data-toggle="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      	</div>
      	<div class="modal-body">
        <p>State added successfully...</p>
      	</div>
		<div class="modal-footer">
		<a href="state_list.php" role="button" class="btn btn-secondary">OK</a>
        <!-- <a href="delState.php" role="button" class="btn btn-primary">YES</a> -->
      	</div>
    	</div>
 	 	</div>
		</div>
	<?php } else {
	    echo "<script type='text/javascript'>alert('Error');
	    window.location='state_list.php';
	    </script>";
	
	}
?>

