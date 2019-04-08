 <html>
	<head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <style>
         i{color:red;}
		 .background{background-image:url("Images/colorWorld2.jpg");
      
  height: auto;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;}
      </style>
   </head>
   <body class="background">
      <br>
      <div class="container ">
         <div class="row ">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 bg-info" style="padding:20px;border-radius:1px solid grey;">
               <h3 class="text-center ">Login</h3>
               <hr>
               <form action="usercheck.php" method="post" id="login">
                  <div class="form-group">
                     <label>Email</label>
                     <input type="text" name="email" class="form-control" id="email" >
                     <i id="emailerror"></i>
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" class="form-control" id="password" title="Please enter atleast 8 characters">
                     <i id="passworderror"></i>
                  </div>
                  <div class="form-group text-center">
                     <button class="btn btn-primary btn-md" type="submit">Login</button>
                  </div>
               </form>
            </div>
            <div class="col-sm-4"></div>
         </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
     <script src="JS/login.js"></script>
   </body>
</html>
