<?php
	include("header.php");
	include("dbconfig.php");
?>
	
		<div class="col-sm-8">
			<caption class="text-center"> Country</caption>
					<?php
						$id = $_GET['country_id'];
						
						$sql="select * from country where country_id=$id";
						$res=mysqli_query($conn,$sql);
						$row=mysqli_fetch_assoc($res);

					?>
					<table class="table table-bordered">
					
						<tr>
							<th class="tablebg">Country Name</th>
							<td><?php echo $row['country_name']; ?></td>
						</tr>
						<tr>
							<th class="tablebg">Capital</th>
							<td><?php echo $row['capital']; ?></td>
						</tr>
						<tr>
							<th  class="tablebg">Country Code</th>
							<td><?php echo $row['country_code']; ?></td>
						</tr>
						<tr>
							<th class="tablebg">Currency</th>
							<td><?php echo $row['currency']; ?></td>
						</tr>
						<tr>
							<th  class="tablebg">Calling Code</th>
							<td><?php echo $row['calling_code']; ?></td>
						</tr>
						<tr>
							<th  class="tablebg">Official Language</th>
							<td><?php echo $row['official_language']; ?></td>
						</tr>
						
					</table>
		</div>
	
	
<?php
	include("footer.php");
?>