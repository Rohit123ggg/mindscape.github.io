<?php
          include_once 'database.php';
          $sql = "SELECT * FROM notice";
$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MindScape</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  .marq{
  background-image: linear-gradient( 111.4deg,  rgba(7,7,9,1) 6.5%, rgba(27,24,113,1) 93.2% ); 
  font-size: 20px;
  font-weight: bold;  
  font-style: italic;
  color: orange;
  margin-bottom:20px; 
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
        <a class="nav-link active text-white" aria-current="page" href="#" style="text-align:center">Home</a>
      </li>
  

      <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="#">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="#">FeedBack</a>

        </li>
      

      <li class="nav-item">
        <a class="nav-link active text-white" aria-current="page" href="logout.php"style="text-align:center">LogOut</a>
      </li>
    </ul>
   

    </form>
  </div>
</div>
</nav>
<div class="marq"> 
                                <h3 style="text-align:center;color:white;">
                                  Important Notice
                                </h3>
<?php

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

?>
                              
                            <marquee style="padding-top:10px;color: orange;"> <?php echo $row['note'];?> </marquee>


                            <?php
                            }
          }
?>                            </div>

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

  </body>
</html>