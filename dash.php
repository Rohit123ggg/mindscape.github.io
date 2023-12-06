<?php
	require('database.php');	
	
	$ref=@$_GET['q'];		
	if(isset($_POST['submit']))
	{	
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$user = stripslashes($user);
		$user = addslashes($user);
		$pass = stripslashes($pass); 
		$pass = addslashes($pass);
		$user = mysqli_real_escape_string($con,$user);
		$pass = mysqli_real_escape_string($con,$pass);					
		$str = "SELECT * FROM admin WHERE user='$user' and password='$pass'";
		$result = mysqli_query($con,$str);
		if((mysqli_num_rows($result))!=1) 
		{
			echo "<center><h3><script>alert('Sorry.. Wrong Username (or) Password');</script></h3></center>";
			header("refresh:0;url=dash.php");
		}
		else
		{
			$_SESSION['logged']=$user;
			$row=mysqli_fetch_array($result);
			$_SESSION['id']=$row[0];
			$_SESSION['user']=$row[2];
			$_SESSION['password']=$row[3];
			header('location: ahome.php'); 					
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="css/style.css"> 
  <link rel="stylesheet" type="text/css" href="css/nav.css"> 

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="/images/icon.ico">
  
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
          <a class="nav-link active text-white" aria-current="page" href="index.php"style="text-align:center">User Login</a>
        </li>
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


<script>
  const authorSearch = document.getElementById('authorSearch');
  authorSearch.addEventListener('keyup', e => {
    let currentValue = e.target.value.toLowerCase();
    let authors = document.querySelectorAll('h5.card-title');
    authors.forEach(author => {
      if (author.textContent.toLowerCase().includes(currentValue)) {
        author.parentNode.parentNode.parentNode.style.display = 'block';
        
      }else{
        author.parentNode.parentNode.parentNode.style.display = 'none';
      }
    })
  });
  
  
  </script>
<script>
  function myFunction() {
    var x = document.getElementById("navbarSupportedContent");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
  </script>
<script>
    document.addEventListener("DOMContentLoaded", function(){
window.addEventListener('scroll', function() {
    if (window.scrollY > 50) {
      document.getElementById('navbar_top').classList.add('fixed-top');
      // add padding top to show content behind navbar
      navbar_height = document.querySelector('.navbar').offsetHeight;
      document.body.style.paddingTop = navbar_height + 'px';
    } else {
      document.getElementById('navbar_top').classList.remove('fixed-top');
       // remove padding top from body
      document.body.style.paddingTop = '0';
    } 
});
}); 
</script>




    <div class="container" >
    <div class="row px-3 mt-4">
      <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0" >

        <div class="card-body">
          <h4 class="title text-center">
           Admin Login 
          </h4>
		  <form method="post" action="dash.php" class="form-box" enctype="multipart/form-data">
            <div class="form-input">
              <span><i class="fa fa-user-shield"></i></span>
              <input type="text" name="user" placeholder="User Id " tabindex="10" required>
            </div>
            <div class="form-input">
              <span><i class="fa fa-key"></i></span>
              <input type="password" name="pass" placeholder="Password" required>
            </div>

            <div class="mb-3">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="cb1" name="">
                <label class="custom-control-label" for="cb1">Remember me</label>
              </div>
            </div>

            <div class="mb-3">
              <button type="submit" name="submit" class="btn btn-block text-uppercase">
                Login
              </button>
            </div>
            </form>
           
         
        </div>
      </div>
    </div>
  </div> 
</body>
</html>