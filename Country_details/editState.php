<?php
	include("header.php");
	include("dbconfig.php");
	include("session.php");
?>
<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8 bg-info">
	<form action="updateState.php" method="post" id="updateState">
		<h3 class="text-center">Edit State</h3>
							
		
		<?php
	
			$sid=$_GET['state_id'];
			//echo $sid;exit;

			$sql="select * from country_state where state_id='$sid'";
			$res=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($res);
			//print_r($row);exit;
			
			$sql1="select * from state where state_id='".$sid."'";
			$res1=mysqli_query($conn,$sql1);
			$row1=mysqli_fetch_assoc($res1);
			//print_r($row1);exit;
			//echo $row1['state_id']; exit;
			//echo $row1['state_name']; exit;
			//echo $row1['state_code']; exit;
		?>
			<!-- <input type="hidden" name="id" class="form-control" value="<?php echo $cid; ?>"> -->
					
			<div class="form-group">
				<label>Country name</label>
				<select name="cname" class="form-control" id="country" required>
				<option value="">Select country</option>
				  <?php
					$selected = "";
					$sql2="SELECT * FROM country";
					$res2=mysqli_query($conn,$sql2);
					while($countrynames=mysqli_fetch_assoc($res2))
					{
					  if($countrynames['country_id'] == $row['country_id']){
					  $selected = "selected";

					}
					?>  
					<option value="<?php echo ($countrynames['country_id'])?>" <?php echo $selected ?>>
					<?php echo($countrynames['country_name']) ?>
					</option>
					<?php
					   $selected = "";
					 }
				  ?>
				</select>
				<i id="countryErr"></i>
			</div>
			
			<div class="form-group">
				<label>State Name</label>
				<input type="hidden" name="stateid" id="stateid" class="form-control" value="<?php echo $sid ;?>">
				<input type="text" name="statename" id="sname" class="form-control" value="<?php echo $row1['state_name']; ?>">
				<i id="stateErr"></i>
			</div>

					<div class="form-group">
						<label>Capital City</label>
						<input type="text" name="capital" id="capital" class="form-control" value="<?php echo $row1['capital_city'];?>">
						<i id="capitalErr"></i>
					</div>
					

					<div class="form-group">
						<label>State Code</label>
						<input type="text" name="code" id="code" class="form-control" value="<?php echo $row1['state_code'];?>">
						<i id="codeErr"></i>
					</div>

					<div class="form-group">
						<label>Official Language</label>
						<input type="text" name="lang" id="lang" class="form-control" value="<?php echo $row1['official_language']; ?>">
						<i id="langErr"></i>
					</div>

					<div class="form-group">
						<label>Area</label>
						<input type="number" name="area" id="area" class="form-control" value="<?php echo $row1['area'] ?>">
						<i id="areaErr"></i>
					</div>
		<div class="form-group text-center">
			<button type="submit" class="btn btn-primary">Update</button>
			<button type="reset" class="btn btn-success">Clear</button>
		</div>
		
	</form>
</div>
<div class="col-sm-2"></div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


<?php
include ("footer.php");
?>
