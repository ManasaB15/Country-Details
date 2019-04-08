<?php
	include("header.php");
	include("dbconfig.php");
	include("session.php");
	include("searchSort.php");
?>
<style>
	/*{ background-image: url('Images/b1.jpeg');
  background-color: #cccccc;
  height: 500px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}*/
</style>

<div class="row margin" >
	
	<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#state"><span class="glyphicon glyphicon-plus" ></span>&nbsp;Add State</button>
	
	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name" style="float:right;"><img src='Images/search-engine.png' style="float:right;margin-right:-200px;margin-top:15px;">&nbsp;&nbsp;
	<button class="btn btn-primary" onclick="sortTable()"style="float:right;margin-right:10px;margin-top:10px;">Sort</button>

	<h3 class="text-center">State Lists</h3>
	 <!-- Modal -->
	<div class="modal fade" id="state" role="dialog">
	    <div class="modal-dialog modal-md">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header btn-primary">
	          <button type="button" class="close " data-dismiss="modal">&times;</button>
	          <h4 class="modal-title "> Add State</h4>
	        </div>
	        <div class="modal-body">
	         
		        <form action="addState.php" method="POST" id="state_list">
					<div class="form-group">
						<label>State Name</label>
						<input type="text" name="sname" id="sname" class="form-control">
						<i id="stateErr"></i>
					</div>
					
					<div class="form-group">
						<label>Country name</label>
						<select class="form-control" id="cname" name="cname">
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
						<i id="countryErr"></i>
					</div>
					
					<div class="form-group">
						<label>Capital City</label>
						<input type="text" name="capital" id="capital" class="form-control">
						<i id="capitalErr"></i>
					</div>

					<div class="form-group">
						<label>State Code</label>
						<input type="text" name="code" id="code" class="form-control">
						<i id="codeErr"></i>
					</div>

					<div class="form-group">
						<label>Official Language</label>
						<input type="text" name="lang" id="lang" class="form-control">
						<i id="langErr"></i>
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


<table class="table table-bordered" id="myTable">
	<tr class="bg-primary">
		<th>State Name </th>
		<th>Country Name</th>
		<th>Capital City</th>
		<th>State Code</th>
		<th>Official Language</th>
		<th>Area</th>
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
		$totalEmpSQL = "SELECT * FROM country_state";
		$allEmpResult = mysqli_query($conn, $totalEmpSQL);
		$totalEmployee = mysqli_num_rows($allEmpResult);
		$lastPage = ceil($totalEmployee/$showRecordPerPage);
		$firstPage = 1;
		$nextPage = $currentPage + 1;
		$previousPage = $currentPage - 1;

		 $countstat="SELECT * FROM country_state LIMIT $startFrom, $showRecordPerPage";


		$sql=mysqli_query($conn, $countstat);

		  	while($row = $sql->fetch_assoc()) {
		    echo "<tr class='warning'>";

		    $countryname="SELECT country_name  FROM country where country_id=".$row['country_id'];
		    $sql1=mysqli_query($conn, $countryname);
		    $rowcountryname=mysqli_fetch_assoc($sql1);
		
		    $statename="SELECT *  FROM state where state_id=".$row['state_id'];
		    $sql2=mysqli_query($conn, $statename);
		    $rowstatename=mysqli_fetch_assoc($sql2);

		   // print_r($statename);exit;
		      
		    echo"<td>".$rowstatename['state_name']."</td>";
		    echo"<td>".$rowcountryname['country_name']."</td>";
		    echo"<td>".$rowstatename['capital_city']."</td>";
		    echo"<td>".$rowstatename['state_code']."</td>";
		    echo"<td>".$rowstatename['official_language']."</td>";
		    echo"<td>".$rowstatename['area']."</td>";

		    echo"<td><a href='editState.php?state_id=".$row['state_id']."'><span class='glyphicon glyphicon-edit'></span></a> &nbsp;&nbsp&nbsp;&nbsp";


		   	echo"<a href='delState.php?state_id=".$row['state_id']."'><span class='glyphicon glyphicon-trash'</span></a></td>";
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
</div>
<?php
	include("footer.php");
?>
<script src="JS/state_list.js"></script>
