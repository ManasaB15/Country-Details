<?php
	include("header.php");
	include("dbconfig.php");
	include("session.php");
	include("searchSort.php");


?>

<div class="row margin">
	<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#country"><span class="glyphicon glyphicon-plus" ></span>&nbsp;Add Country</button>

	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name" style="float:right;border-radius:1px solid orange;"><img src='Images/search-engine.png' style="float:right;margin-right:-200px;margin-top:15px;">&nbsp;&nbsp;

	<button class="btn btn-primary"onclick="sortTable()"style="float:right;margin-right:10px;margin-top:10px;">Sort</button>

	<h3 class="text-center">Country Lists</h3>
	 <!-- Modal -->
	<div class="modal fade" id="country" role="dialog">
	    <div class="modal-dialog modal-md">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header btn-primary">
	          <button type="button" class="close " data-dismiss="modal">&times;</button>
	          <h4 class="modal-title "> Add Country</h4>
	        </div>
	        <div class="modal-body">
	         
		        <form action="addCountry.php" method="POST" id="country_list">
					<div class="form-group">
						<label>Country Name</label>
						<input type="text" name="cname" id="cname" class="form-control">
						<i id="countryErr"></i>
					</div>
					
					<div class="form-group">
						<label>Country Code</label>
						<input type="text" name="code" id="code" class="form-control">
						<i id="codeErr"></i>
					</div>
					
					<div class="form-group">
						<label>Capital</label>
						<input type="text" name="capital" id="capital" class="form-control">
						<i id="capitalErr"></i>
					</div>

					<div class="form-group">
						<label>Official Language</label>
						<input type="text" name="lang" id="lang" class="form-control">
						<i id="langErr"></i>
					</div>

					<div class="form-group">
						<label>Currency</label>
						<input type="text" class="form-control" id="currency" name="currency">
						<i id="currencyErr"></i>
					</div>

					<div class="form-group">
						<label>Calling Code</label>
						<input type="text" name="call" id="call" class="form-control">
						<i id="callErr"></i>
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
	 <?php
	 			$showRecordPerPage = 5;
				if(isset($_GET['page']) && !empty($_GET['page'])){
				$currentPage = $_GET['page'];
				}else{
				$currentPage = 1;
				}
				$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
				$totalEmpSQL = "SELECT * FROM country";
				$allEmpResult = mysqli_query($conn, $totalEmpSQL);
				$totalEmployee = mysqli_num_rows($allEmpResult);
				$lastPage = ceil($totalEmployee/$showRecordPerPage);
				$firstPage = 1;
				$nextPage = $currentPage + 1;
				$previousPage = $currentPage - 1;
		 
		 		$sql="SELECT * FROM country LIMIT $startFrom, $showRecordPerPage";
		 		$result=mysqli_query($conn,$sql);
		 		$row=mysqli_num_rows($result);
		 		
	?>	
            <div class="table-responsive" id="append">
				<table class="table table-bordered"  id="myTable">
					<tr class="table-header bg-primary " >
						<th>Country Name </th>
						<th>Country Code</th>
						<th>Capital</th>
						<th>Official Lanuage</th>
						<th>Currency</th>
						<th>Calling Code</th>
						<th>Actions</th>
					</tr>	

					<?php
					while($row1=mysqli_fetch_object($result))
					{
						echo "<tr class='warning'>";
						echo "<td> $row1->country_name </td>";
						echo "<td> $row1->country_code</td>";
						echo "<td> $row1->capital</td>";
						echo "<td> $row1->official_language</td>";
						echo "<td> $row1->currency</td>";
						echo "<td> $row1->calling_code</td>";
						 echo "<td> <a href='editCountry.php?country_id=$row1->country_id'><span class='glyphicon glyphicon-edit'></span>&nbsp;
									<a href='delCountry.php?country_id=$row1->country_id'><span class='glyphicon glyphicon-trash'></span></a></td>";
						// echo "<td> <button class='btn btn-warning'id='$row1->country_id'>Edit</button>&nbsp;
						// 			<a href='delCountry.php?country_id=$row1->country_id'><span class='glyphicon glyphicon-trash'></span></a></td>";
						echo "</tr>";
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
</div><!--row end-->
<?php
	include("footer.php");
?>





<script src="JS/country_list.js"></script>
<!-- <script>
  $(document).ready(function () {

        $(".btn-warning").click(function () {
          var variable = $(this).attr('id');
      
            $.ajax({
            
                url: 'editCountry.php',
                type:'POST',
                dataType: 'text',
                data: {test: variable},
                success: function (rspns) {
                $("#mytable").remove();
               //  $('#editform').html(rspns);
                 $("#append").append(rspns);
                 //console.log(rspns);
                }
            });
        });
    });

</script> -->

<!-- 
<script>
	$(document).ready(function(){
		$('.btn-warning').click(function(e){
	    e.preventDefault();
	     var $this = $(this);
	    var id_id = $(this).attr('id');
	    console.log(id_id);
	    alert(id_id);
	         $.ajax({
	     type: "POST",
	         url: "editCountry.php",
	             data:{id: id_id},
	          success: function(data) {
    $("#getCode").html(data);
    jQuery("#editCountry").modal('show');
}

	    });
	});
	      
	      });    
</script> -->

