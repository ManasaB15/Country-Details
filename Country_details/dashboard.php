<?php
  include("header.php");
  include('dbconfig.php');
  include("session.php");
?>
<style>
   i{color:grey;}
   .fa{color:grey;}
   .div1{width: 150px;height: 150px;background-color: white;margin-bottom: 100px;border:1px solid navy;box-shadow: 5px 10px navy;}  
   .fontsize{font-size:30px;color:orange;}
   .fontColor{color:orange;}
   .carousel{margin:-15px;}
   .p1{margin-top:-300px;}
   .world{background-image:url('Images/world.jpg');
        margin-top:-50px;object-fit:cover;
      display: block;
  margin-left: -75px;
  margin-top: -110px;
  width: auto;}
    .distDetails{margin:70px}
    .district{margin-left:-20px;}
    .select{background-color: #337ab7;padding: 15px;}
    .selectcolor{color:white;}
    .center{margin-top:-200px;}
</style>

<?php
      $result  = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `country`");
      $row     = mysqli_fetch_array($result);
      $count   = $row['count'];
      $result1 = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `state`");
      $row1    = mysqli_fetch_array($result1);
      $count1  = $row1['count'];
      $result2 = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `district`");
      $row2    = mysqli_fetch_array($result2);
      $count2  = $row2['count'];
?>

<!-- <div class="container-fluid carousel">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol> -->

    <!-- Wrapper for slides -->
    <!-- <div class="carousel-inner" style="height:400px;">

      <div class="item active">
        <img src="Images/c3.jpg" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
          <h3 class="p1">Total Countries</h3>
          <p><i class="fontsize"><?php echo $count;?> </i></p>
        </div>
      </div>

      <div class="item">
        <img src="Images/c2.jpg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
          <h3 class="p1"  style="margin-top:-400px;">Total States</h3>
          <p class="p2"><i class="fontsize"><?php echo $count;?> </i></p>
        </div>
      </div>
    
      <div class="item">
        <img src="Images/c1.jpg" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h3 class="p1" style="margin-top:-300px;">Total Districts</h3>
          <p><i class="fontsize"><?php echo $count2;?> </i></p>
        </div>
      </div>
  
    </div> -->

    <!-- Left and right controls -->
    <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div> --> 
   
 
   
     <!-- <h3 class="text-center">Dashboard</h3> -->
  
  
  
   <br>
   <div class="row world">
    <div class="col-sm-12 distDetails">
        <form action="displayDistrict.php" method="POST" >
            
            <div class="col-sm-3"></div>
            <div class="col-sm-6 district">
              <h3 class="text-center ">District Details</h3>
              <div class="form-group select" >
                <label class="selectcolor">Country Name</label>
                <select class="form-control" id="country" name="cname">
                  <option value="">Select a country</option>
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

            <div class=" form-group select">
              <label class="selectcolor">State Name</label>
              <select id="state" class="form-control" name="sname">
                <option value="" >Select country first</option>
              </select>
              <i id="stateErr"></i>
            </div>

            <div class=" form-group text-center">
                <br>
               <button type="submit" class="btn btn-warning btn-md" id="listdistrict">Show District</button>
                <i id="distErr"></i>
            </div>
          </div>
          <div class="col-sm-4"></div>
           </div>

        
         <!--  <div class="form-group text-center">
            <button type="submit"  class="btn btn-danger btn-sm"  id="btnsubmit">Submit</button>
            <button type="reset" class="btn btn-success btn-sm">Clear</button>
          </div> -->
        </form>
     </div>


       <center style="margin-top:20px;">
      
      <!-- div class="col-sm-4">
         <a href="country_list.php" class="fontColor">
            <div class="div1">
               <h4 class="text-center">Total Countries</h4>

               <center><i class="fa fa-users fa-4x"></i></center>
               <center><i class="fontsize"><?php echo $count;?> </i></center>
            </div>
         </a>
      </div> -->
    
      <div class="col-sm-4">
                <a href="state_list.php" class="fontColor" >
                  <img src="Images/2.jpg" class="img-rounded" alt="Cinque Terre" width="200" height="236">
              <center class="center">
               <h4 class="text-center">Total Countries</h4>
              <i class="fontsize""><?php echo $count;?> </i>
            </center>
            
             </a>
         </div>
  
         <div class="col-sm-4">
                <a href="state_list.php" class="fontColor">
           <img src="Images/2.jpg" class="img-rounded" alt="Cinque Terre" width="200" height="236">
              <center class="center">
               <h4 class="text-center">Total States</h4>
              <i class="fontsize""><?php echo $count1;?> </i>
            </center>
             </a>
         </div>
     
     
         <div class="col-sm-4">
             <a href="district_list.php" class="fontColor">
            <img src="Images/2.jpg" class="img-rounded" alt="Cinque Terre" width="200" height="236">
              <center class="center">
               <h4 class="text-center">Total Districts</h4>
              <i class="fontsize""><?php echo $count2;?> </i>
            </center>
             </a>
         </div>
     
   </center>
   
  
 </div>
   <script src="JS/district_list.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxDistrict.php',
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


   

