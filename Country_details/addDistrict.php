<?php
	include("header.php");
	include("dbconfig.php");
	include("session.php");
	include("links.php");

	$dname        = $_POST['dname'];
	$sname        = $_POST['sname'];
	$cname        = $_POST['cname'];
	$code		  = $_POST['code'];
	$population	  = $_POST['population'];
	$area         = $_POST['area'];
	
	
	$sql ="INSERT INTO district(district_name,district_code,population,area)
	    VALUES('$dname','$code','$population','$area')";
	$result=mysqli_query($conn,$sql);

	$select="SELECT district_id FROM district ORDER BY district_id DESC LIMIT 0, 1" ;
	$resultdistrict=mysqli_query($conn,$select); 
	$row=mysqli_fetch_assoc($resultdistrict);
	
	$sql1="INSERT INTO dist_state_count(district_id,state_id,country_id)values('".$row['district_id']."',".$sname.",".$cname.")";
	$resultdistricts=mysqli_query($conn,$sql1);
	
	$status1 = mysqli_query($conn, $resultdistricts);
	if ($result == 1) {?>

	   <script>
			$(function() {
			$("#exampleModal").modal();
			});

		</script>
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 		 <div class="modal-dialog" role="document">
    	<div class="modal-content">
		<div class="modal-header">
      		<h5 class="modal-title" id="exampleModalLongTitle">Add District</h5>
 
          <button type="button" class="close" data-dismiss="modal" data-toggle="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      	</div>
      	<div class="modal-body">
        <p>District added successfully...</p>
      	</div>
		<div class="modal-footer">
		<a href="district_list.php" role="button" class="btn btn-secondary">OK</a>
       
      	</div>
    	</div>
 	 	</div>
		</div>
	<?php } 
?>

