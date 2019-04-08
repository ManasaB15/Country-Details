<?php
  include("dbconfig.php");
 include("header.php");

  $country=$_POST['cname'];
  $state=$_POST['sname'];


  $districtid="SELECT district_id from dist_state_count where country_id='".$country."' AND state_id='".$state."'" ;
   $resultid=mysqli_query($conn,$districtid); 
?>
   <table class="table table-bordered" id="myTable">
    <h4 class="text-center">District List</h4>
        <tr class="bg-primary">
          <th>District Name </th>
          <th>District Code</th>
          <th>Population</th>
          <th>Area</th>
       </tr> 
  <?php
  
   while($rowdistrictid = $resultid->fetch_assoc()){
    $count=mysqli_num_rows($resultid);
 
   if($count>0){
  
  $district="SELECT * from district where district_id='".$rowdistrictid['district_id']."'" ; 
   $resultdistrict=mysqli_query($conn,$district); 
   $rowdistrict=mysqli_fetch_assoc($resultdistrict); 
 
 
    echo"<td>".$rowdistrict['district_name']."</td>";
    echo"<td>".$rowdistrict['district_code']."</td>";
    echo"<td>".$rowdistrict['population']."</td>";
    echo"<td>".$rowdistrict['area']."</td>";
    echo"</tr>";
                  
}

else{ ?>
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
        <p>No district for this state...</p>
        </div>
    <div class="modal-footer">
     <a href="dashboard.php" role="button" class="btn btn-secondary">OK</a>
     </div>
    </div>
    </div>
    </div>

<?php }
    }
?>

