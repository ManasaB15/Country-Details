<?php
include("dbconfig.php");
include("session.php");
  $count="SELECT * from country_state WHERE country_id={$_POST['country_id']}";
            $resultquery=mysqli_query($conn,$count);
             while($countrow = $resultquery->fetch_assoc()){
           
    $sql1="SELECT * FROM state where state_id='". $countrow['state_id']."'";  
           $res1=mysqli_query($conn,$sql1);
         while($countrow = $res1->fetch_assoc()){
            echo "<option value='{$countrow["state_id"]}'> {$countrow["state_name"]}</option>";
         }
     }
?>