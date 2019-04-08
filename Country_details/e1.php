
<!-- <?php
	include("header.php");
	include("dbconfig.php");
	include("session.php");
?>
<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8 bg-info">

	<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#country"><span class="glyphicon glyphicon-plus" ></span>&nbsp;Add Country</button>

		
	<form action="updateCountry.php" method="post" id="updateCountry">
		<h3 class="text-center">Edit Country</h3>
							
		
		<?php
			$id=$_GET['country_id'];

			 $sql="select * from country where country_id='$id'";
			 //print_r($sql); exit;
			$res=mysqli_query($conn,$sql);
			$row=mysqli_fetch_object($res);
		?>


		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<label>Country Name</label>
			<input type="text" name="cname" id="cname" value="<?php echo $row->country_name;?>" class="form-control">
			<i id="countryErr"></i>
		</div>
		<div class="form-group">
						<label>Code</label>
						<input type="text" name="code" id="code" class="form-control" value="<?php echo $row->country_code; ?>">
						<i id="codeErr"></i>
					</div>
		<div class="form-group">
						<label>Capital</label>
						<input type="text" name="capital" id="capital" class="form-control" value="<?php echo $row->capital; ?>">
						<i id="capitalErr"></i>
					</div>

					<div class="form-group">
						<label>Official Language</label>
						<input type="text" name="lang" id="lang" class="form-control" value="<?php echo $row->official_language; ?>">
						<i id="langErr"></i>
					</div>

					<div class="form-group">
						<label>Currency</label>
						<input type="text" class="form-control" id="currency" name="currency" value="<?php echo $row->currency; ?>">
						<i id="currencyErr"></i>
					</div>

					<div class="form-group">
						<label>Calling Code</label>
						<input type="text" name="call" id="call" class="form-control" value="<?php echo $row->calling_code; ?>">
						<i id="callErr"></i>
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

 -->