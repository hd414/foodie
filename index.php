<?php
session_start();

 if(isset($_SESSION['partner'])){
 header('location:partner_profile.php');
}

 if(isset($_SESSION['user'])){
 header('location:food_menu.php');
}


?>

<html>

  <head>
    <title> Home | Foodie </title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="./css/index.css">
   
  </head>

 

  <body>

   
    

    
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Foodie</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
          <li class="active"><a href="index.php">Home</a></li>
            <li ><a href="aboutus.php">About</a></li>
            <li ><a href="contactus.php">Contact Us</a></li>
             <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Partner with us <span class="caret"></span> </a>
                <ul style="background-color: black; " class="dropdown-menu">
              <li> <a style="color: #9d9d9d" href="partner_register.php">Register</a></li>
              <li> <a style="color: #9d9d9d" href="partner_signin.php">Sign-in</a></li>
          
            </ul>
            </li>
      </ul>


<ul class="nav navbar-nav navbar-right">
        <li><a href="user_signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="user_signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<br>

    <img src="./images/food.png"></div>
    <img  class=' right ' src="https://media.istockphoto.com/photos/selection-of-american-food-picture-id931308812?k=6&m=931308812&s=612x612&w=0&h=bIbWqdW3LEc9Q5_WnqYG0blqrKp9zW7Qc36Gq35FTaE=">
   

    <br>
    <div class="block">
    <h2>Feeling Hungry?</h2>
    <a class="btn btn-success btn-lg" href="user_signup.php" role="button" > Order Now </a>
   </div>
    
<br>
   

  
</body>
</html>