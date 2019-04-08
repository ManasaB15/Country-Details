<?php
	include("header.php");
	include("dbconfig.php");
	include("session.php");
	include("searchSort.php")

?>

<div class="row margin">
	
	<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#district"><span class="glyphicon glyphicon-plus" ></span>&nbsp;Add District</button>

	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.. "title="Type in a name" style="float:right;"><img src='Images/search-engine.png' style="float:right;margin-right:-200px;margin-top:15px;">&nbsp;&nbsp;

	<button class="btn btn-primary" onclick="sortTable()"style="float:right;margin-right:10px;margin-top:10px;">Sort</button>

	<h3 class="text-center">District Lists</h3>
	 <!-- Modal -->
	<div class="modal fade" id="district" role="dialog">
	    <div class="modal-dialog modal-md">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header btn-primary">
	          <button type="button" class="close " data-dismiss="modal">&times;</button>
	          <h4 class="modal-title "> Add District</h4>
	        </div>
	        <div class="modal-body">
	         
		        <form action="addDistrict.php" method="POST" id="district_list">
					<div class="form-group">
						<label>District Name</label>
						<input type="text" name="dname" id="dname" class="form-control">
						<i id="distErr"></i>
					</div>
					
					<div class="form-group">
						<label>Country Name</label>
						<select class="form-control" id="country" name="cname">
							<option value="">----Choose country----</option>
							<?php
								$sql="select * from country";
			                    $res=mysqli_query($conn,$sql);
			                    while($row=mysqli_fetch_assoc($res))
			                    {
			                    ?>
			                    <option value = "<?php echo($row['country_id'])?>" >
			                                        <?php echo($row['country_name']) ?>
			                                    </option>
			                           			 <?php
			                    }
			                 ?>
						</select>
						<!-- <select id="country"></select> -->
						<i id="countryErr"></i>
					</div>
					
					<div class="form-group">
						<label>State Name</label>
						<select id="state" class="form-control" name="sname">
						 	<option value="" >Select country first</option>
						</select>
						<i id="stateErr"></i>
					</div>

					<div class="form-group">
						<label>District Code</label>
						<input type="text" name="code" id="code" class="form-control">
						<i id="codeErr"></i>
					</div>

					<div class="form-group">
						<label>Population</label>
						<input type="number" name="population" id="population" class="form-control">
						<i id="populationErr"></i>
					</div>

					<div class="form-group">
						<label>Area</label>
						<input type="number" name="area" id="area" class="form-control">
						<i id="areaErr"></i>
					</div>
					
					<div class="form-group text-center">
						<button type="submit"  class="btn btn-danger"  id="btnsubmit">Add</button>
						<button type="reset" class="btn btn-success">Clear</button>
					</div>
				
				</form>

	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	      
	    </div>
	</div><!--modal close-->
</div>

<table class="table table-bordered " id="myTable">
	<tr class="bg-primary">
		<th>District Name </th>
		<th>Country Name</th>
		<th>State Name</th>
		<th>District Code</th>
		<th>Population</th>
		<th>Area/Sq Km</th>
		<th>Actions</th>
	</tr>	

	<?php
		$showRecordPerPage = 10;
		if(isset($_GET['page']) && !empty($_GET['page'])){
		$currentPage = $_GET['page'];
		}else{
		$currentPage = 1;
		}
		$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
		$totalEmpSQL = "SELECT * FROM dist_state_count";
		$allEmpResult = mysqli_query($conn, $totalEmpSQL);
		$totalEmployee = mysqli_num_rows($allEmpResult);
		$lastPage = ceil($totalEmployee/$showRecordPerPage);
		$firstPage = 1;
		$nextPage = $currentPage + 1;
		$previousPage = $currentPage - 1;
		 
		$diststatecount="SELECT * FROM dist_state_count LIMIT $startFrom, $showRecordPerPage";

		$sql=mysqli_query($conn, $diststatecount);
		  while($row = $sql->fetch_assoc()) {
		    echo "<tr class='warning'>";

		    $countryname="SELECT country_name  FROM country where country_id=".$row['country_id'];
		    $sql1=mysqli_query($conn, $countryname);
		    $rowcountryname=mysqli_fetch_assoc($sql1);
			
			$statename="SELECT state_name  FROM state where state_id=".$row['state_id'];
		    $sql2=mysqli_query($conn, $statename);
		    $rowstatename=mysqli_fetch_assoc($sql2);
			
		    $districtname="SELECT *  FROM district where district_id=".$row['district_id'];
		    $sql3=mysqli_query($conn, $districtname);
		    $rowdistrictname=mysqli_fetch_assoc($sql3);
		     //print_r($sql3);exit;
		      
		    echo"<td>".$rowdistrictname['district_name']."</td>";
		    echo"<td>".$rowcountryname['country_name']."</td>";
		    echo"<td>".$rowstatename['state_name']."</td>";
		    echo"<td>".$rowdistrictname['district_code']."</td>";
		    echo"<td>".$rowdistrictname['population']."</td>";
		    echo"<td>".$rowdistrictname['area']."</td>";

		    echo"<td><a href='editDistrict.php?district_id=".$row['district_id']."'><span class='glyphicon glyphicon-edit'></span></a> &nbsp;&nbsp&nbsp;&nbsp";
		   	echo"<a href='delDistrict.php?district_id=".$row['district_id']."'><span class='glyphicon glyphicon-trash'</span></a></td>";
		    echo"</tr>";
		    
		  } 
	?>
			
</table>
<nav aria-label="Page navigation" class="text-center">
	<ul class="pagination" >
	<?php if($currentPage != $firstPage) { ?>
	<li class="page-item">
	<a class="page-link" href="?page=<?php echo $firstPage ?>" tabindex="-1" aria-label="Previous">
	<span aria-hidden="true">First</span>
	</a>
	</li>
	<?php } ?>
	<?php if($currentPage >= 2) { ?>
	<li class="page-item"><a class="page-link" href="?page=<?php echo $previousPage ?>"><?php echo $previousPage ?></a></li>
	<?php } ?>
	<li class="page-item active"><a class="page-link" href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>
	<?php if($currentPage != $lastPage) { ?>
	<li class="page-item"><a class="page-link" href="?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a></li>
	<li class="page-item">
	<a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
	<span aria-hidden="true">Last</span>
	</a>
	</li>
	<?php } ?>
	</ul>
</nav>

<?php
	include("footer.php");
?>
<script src="JS/district_list.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                	$('#state').html(html);
                	console.log(html);
                  
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
          
        }
    });
    
});
</script>


