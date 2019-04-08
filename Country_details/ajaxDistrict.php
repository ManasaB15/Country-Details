<?php
include("dbconfig.php");
  $state="SELECT * from country_state WHERE country_id={$_POST['country_id']}";
            $resultquery=mysqli_query($conn,$state);
             while($staterow = $resultquery->fetch_assoc()){
           
    $sql="SELECT * FROM state where state_id='". $staterow['state_id']."'";  
           $res=mysqli_query($conn,$sql);
         while($rowstate= $res->fetch_assoc()){
            echo "<option value='{$rowstate["state_id"]}'> {$rowstate["state_name"]}</option>";
         }
     }
?>
