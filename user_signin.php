<?php
session_start();
 if(isset($_SESSION['partner'])){
 header('location:partner_profile.php');
}

?>

<html>

  <head>
    <title> Signup user | Foodie </title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="./css/user_signup.css">

 <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
   
  </head>

 

  <body style="text-align: center;line-height: 1.8; margin: 0">

   
    

    
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
        
          <li ><a href="index.php">Home</a></li>
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
        <li ><a href="user_signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li class="active"><a href="user_signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<?php
if(isset($_SESSION['msg']))
    {
      echo "<span style='text-align:left;  color: #6D7781;font-family: Sofia, cursive;font-size: 15px;font-weight: bold;'>".$_SESSION['msg']."</span>";
      unset($_SESSION['msg']);
      
    }

?>
<br>
<div class='tag' >Hurry! Tasty Food is one click away </div>
<img src="https://image.freepik.com/free-vector/man-delivering-food-while-wearing-medical-mask_52683-39764.jpg">
<div class='login'>
  <h2>Login</h2>
  <form action="user_signin_working.php" method="post">
  <input name='email' placeholder='E-Mail Address' type='email' required autocomplete="off">
  <input id='pw' name='password' minlength="8" placeholder='Password' type='password' required autocomplete="off">
  
  <div class="member">
     New here?<a href="user_signup.php"> Register </a>
  </div>
 
  <div class='agree'>
    <input type="submit" name="submit">

  </div>
</form>
</div>

  
  
</body>
</html>