<?php
	session_start();


// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
//$con = mysqli_connect('localhost', 'root', '', 'sourcecodester_exam');
include_once 'database.php';

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $pass = mysqli_real_escape_string($con, $_POST['pass']);
  $cpass = mysqli_real_escape_string($con, $_POST['cpass']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }

  if (empty($pass)) { array_push($errors, "Password is required"); }
  if ($pass != $cpass) {
        array_push($errors, "The two passwords do not match");
		echo '<script>alert("The two passwords do not match")</script>'; 

  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
  $result = mysqli_query($con, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
	  echo '<script>alert("email already exists")</script>'; 

    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

        $query = "INSERT INTO user (name,email,password) 
                          VALUES('$name', '$email', '$pass')";
        mysqli_query($con, $query);
        $_SESSION['name'] = $name;
        $_SESSION['success'] = "You are now logged in";
		echo '<script>alert("email already exists")</script>'; 

        header('location: login.php');
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
           Create account
          </h4>
          <form class="form-box px-3" action="register.php" method="post">
            <div class="form-input">
                <div class="form-input"  >
                    <span><i class="fa fa-user"></i></span>
                    <input type="text" name="name" placeholder="User Name" tabindex="10" required>
                  </div>
                 
            <div class="form-input">
              <span><i class="fa fa-envelope-o"></i></span>
              <input type="email" name="email" placeholder="Email Address" tabindex="10" required>
            </div>
            <div class="form-input">
              <span><i class="fa fa-key"></i></span>
              <input type="password" name="pass" placeholder="Password" required>
            </div>
			<div class="form-input">
              <span><i class="fa fa-key"></i></span>
              <input type="password" name="cpass" placeholder="Conform Password" required>
            </div>
              
              
            <div class="mb-3">
              <button type="submit" name="submit" class="btn btn-block text-uppercase">
                Register
              </button>
            </div>
			
          </form>
		  <hr class="my-4">

<div class="text-center mb-2">
 Already have an account?
  <a href="index.php" class="register-link">
	Login here
  </a>
</div>        </div>
      </div>
    </div>
  </div>
</body>
</html>
