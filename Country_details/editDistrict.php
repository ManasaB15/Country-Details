<?php
	include("header.php");
	include("dbconfig.php");
	include("session.php");
?>
<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8 bg-info">
	<form action="updateDistrict.php" method="post" id="updateDistrict">
		<h3 class="text-center">Edit District</h3>
							
		
		<?php
			$id=$_GET['district_id'];
			$sql="select * from dist_state_count where district_id='$id'";
			$res=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($res);
			
			//print_r($row);exit;
			
			$sql1="select * from district where district_id='".$row['district_id']."'";
			$res1=mysqli_query($conn,$sql1);
			$row1=mysqli_fetch_assoc($res1);
			//print_r($row1);exit;
			//echo $row1['state_id']; exit;
			//echo $row1['state_name']; exit;
			//echo $row1['state_code']; exit;
		?>
			<input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
					
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
				<select name="sname" class="form-control" id="state" required>
				<option value="">Select state</option>
				  <!-- <?php
					$selected = "";
					$sql3="SELECT * FROM state";
					$res3=mysqli_query($conn,$sql3);
					while($statenames=mysqli_fetch_assoc($res3))
					{
					  if($statenames['state_id'] == $row['state_id']){
					  $selected = "selected";
					}
					?>  
					<option value="<?php echo ($statenames['state_id'])?>" <?php echo $selected ?>>
					<?php echo($statenames['state_name']) ?>
					</option>
					<?php
					   $selected = "";
					 }
				  ?> -->
				</select>
			</div>
			
			<div class="form-group">
				<label>District Name</label>
				<input type="hidden" name="districtid" id="districtid" class="form-control" value="<?php echo $row1['district_id']; ?>">
				<input type="text" name="districtname" id="dname" class="form-control" value="<?php echo $row1['district_name']; ?>">
				<i id="distErr"></i>
			</div>
					

					<div class="form-group">
						<label>district Code</label>
						<input type="text" name="code" id="code" class="form-control" value="<?php echo $row1['district_code'];?>">
						<i id="codeErr"></i>
					</div>

					<div class="form-group">
						<label>Population</label>
						<input type="text" name="num" id="population" class="form-control" value="<?php echo $row1['population']; ?>">
						<i id="populationErr"></i>
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


<?php
include ("footer.php");
?>
