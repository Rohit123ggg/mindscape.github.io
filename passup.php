<?php
include_once 'database.php';


if(isset($_POST['submit']))
{
    $email=$_POST['email'];
  $email=mysqli_real_escape_string($con,$email);
  $email=htmlentities($email);
  $n_password=$_POST['n_password'];
  $n_password=mysqli_real_escape_string($con,$n_password);
  $n_password=htmlentities($n_password);
  $c_password=$_POST['c_password'];
  $c_password=mysqli_real_escape_string($con,$c_password);
  $c_password=htmlentities($c_password);
if($c_password === $n_password)
  {
         $sql="update user set password='$n_password' WHERE email='$email'";
     $res=mysqli_query($con,$sql);
     if($res)
     {
         //Password Successfully Changed.

         echo "<script>alert('There are no fields to generate a report');</script>";

         header("Location: login.php");

     }
     else
     {
         //Sorry, Something went wrong, Please Try Again.
         echo 'Sorry, Something went wrong, Please Try Again.'; 

         header("Location: passup.php");

     }
  }
  else
  {
      //Password do not Match.

      echo 'Password do not Match'; 

      header("Location: passup.php");

}
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/nav.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<style>
  body{
    background-image: url('image/yell.jpeg');
  }
</style>
<body>
<nav class="navbar navbar-expand-lg " id="navbar_top" style="background-color:#f49d06;">
<div class="container-fluid">
  <a class="navbar-brand text-white" href="#" style="padding-left:10px;">MindScape</a>
  <button class="navbar-toggler" onclick="myFunction()" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
     
  

      <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="client.php"style="text-align:center">Client Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="dash.php"style="text-align:center">Admin Login</a>
        </li>
       
      

   
    </ul>
  
    </form>
  </div>
</div>
</nav>
  <div class="container">
    <div class="row px-3 mt-4">
      <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">

        <div class="card-body">
          <h4 class="title text-center mt-4">
Change Password          </h4>
		  <form action="passup.php" method="post"class="form-box" >
      
            <div class="form-input">
              <span><i class="fa fa-envelope-o"></i></span>
          
              <input class="form-control" type="email" name="email" placeholder="Enter Your Email" value="" required/>
              
            </div>
        
                           
            <div class="form-input">
              <span><i class="fa fa-key"></i></span>
              <input type="password" name="n_password" placeholder="Enter New Password" required>
            </div>
            <div class="form-input">
              <span><i class="fa fa-key"></i></span>
              <input type="password" name="c_password" placeholder="Conform New Password" required>
            </div>

            <div class="mb-3">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="cb1" name="">
                <label class="custom-control-label" for="cb1">Remember me</label>
              </div>
            </div>

            <div class="mb-3">
              <button type="submit" name="submit" class="btn btn-block text-uppercase">
                Update
              </button>
            </div>

            </form>

            
            <hr class="my-4">

            <div class="text-center mb-2">
              Don't have an account?
              <a href="register.php" class="register-link">
                Register here
              </a>
            </div>
         
        </div>
      </div>
    </div>
  </div>
</body>
</html>