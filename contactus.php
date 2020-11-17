<?php
session_start();
?>

<html>

  <head>
    <title> Contact Us | Foodie </title>

     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="./css/contactus.css">

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
     <?php

      if(isset($_SESSION['partner']))
         {
          $db_host = "localhost";
          $db_user = "root";
          $db_password = "";
          $db_name = "foodie";
          $email = $_SESSION['partner'];
          $connection = mysqli_connect($db_host,$db_user,$db_password,$db_name);

          $user_check_query = "SELECT Name FROM partner WHERE Email='$email'  LIMIT 1";
            $result = mysqli_query($connection, $user_check_query);
            $partner = mysqli_fetch_assoc($result);
            $Name = $partner['Name'];
          ?>
           <a class="navbar-brand" href="partner_profile.php">Foodie</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li><a href="partner_profile.php">Home</a></li>
            <li ><a href="aboutus.php">About</a></li>
            <li class="active"><a href="contactus.php">Contact Us</a></li>
       </ul>
      <ul class="nav navbar-nav navbar-right">
        <li ><a href="#"><span class="glyphicon glyphicon-user"></span>Welcome <?php echo $Name ?>  </a></li>
        <li ><a href="partner_profile.php"><span class=""></span>Restaurants Profile </a></li>
        <li ><a href="partner_logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>


          <?php
        }
     
     else if(isset($_SESSION['user'])){

       $db_host = "localhost";
          $db_user = "root";
          $db_password = "";
          $db_name = "foodie";
          $email = $_SESSION['user'];
          $connection = mysqli_connect($db_host,$db_user,$db_password,$db_name);

          $user_check_query = "SELECT Name FROM user WHERE Email='$email'  LIMIT 1";
            $result = mysqli_query($connection, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            $Name = $user['Name'];
          ?>
           <a class="navbar-brand" href="food_menu.php">Foodie</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li><a href="food_menu.php">Home</a></li>
            <li ><a href="aboutus.php">About</a></li>
            <li class="active"><a href="contactus.php">Contact Us</a></li>
       </ul>
      <ul class="nav navbar-nav navbar-right">
        <li ><a href="#"><span class="glyphicon glyphicon-user"></span>Welcome <?php echo $Name ?>  </a></li>
        <a href="cart.php" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" style="font-size:36px"></i><span ></span><span class="caret"></span> </a>
                <ul style="background-color: black; " class="dropdown-menu">
              <li> <a style="color: #9d9d9d" href="user_profile.php">Profile</a></li>
              <li> <a style="color: #9d9d9d" href="past_orders.php">Past Orders</a></li>
              <li ><a style="color: #9d9d9d" href="user_logout.php"><span class="glyphicon glyphicon-log-out "></span> Logout</a></li>
            </ul>
        <a href="cart.php"> <i class="fa fa-shopping-cart" style="font-size:36px"></i><span ></span>(<?php
              if(isset($_SESSION["count"])){
              $count = $_SESSION["count"]; 
              echo "$count"; 
            }
              else
                echo "0";
              ?>) </a>


          <?php
        }
           


    
    else{
    ?>
   <a class="navbar-brand" href="index.php">Foodie</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
            <li ><a href="aboutus.php">About</a></li>
            <li class="active"><a href="contactus.php">Contact Us</a></li>
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
      <?php
    }
    ?>
      </ul>
    </div>
  </div>
</nav>



   
    <br>


<div class="heading">
  <img src="https://b.zmtcdn.com/webFrontend/8015dbe54fd3659cc0366c1cc77f664c1601890512.jpeg?output-format=webp" width="100%" >
  <div class="centered">We would love to hear from you!</div>
</div>

   

    <div class="container" >
    <div class="col-md-5" style="float: none; margin: 0 auto;">
      <div class="form-area">
        <form method="post" action="">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Contact Form</h3>

          <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required autofocus="">
          </div>

          <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
          </div>     

          <div class="form-group">
            <input type="tel" pattern="[6-9]{1}[0-9]{9}" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
          </div>

          <div class="form-group">
           <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Message" maxlength="140" rows="7"></textarea>
           <span class="help-block"><p id="characterLeft" class="help-block">Max Character length : 140 </p></span>
          </div> 
          <input type="submit" name="submit" type="button" id="submit" name="submit" class="btn btn-primary pull-right"/>    
        </form>

        
      </div>
    </div>
      
    </div>

<?php
if (isset($_POST['submit'])){
echo "<script>alert('your respnse is submited')</script>";
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "foodie";

$connection = mysqli_connect($db_host,$db_user,$db_password,$db_name);

$name = $_POST['name'];
$email = $_POST["email"];
$mobno = $_POST["mobile"];
$subject = $_POST["subject"];
$msg = $_POST["message"];


$insert_query = "INSERT into contact(Name,Email,Mobile,Subject,Message) VALUES('$name','$email','$mobno','$subject','$msg')";

$insert = mysqli_query($connection,$insert_query);

if($insert)
{
    mysqli_close($connection); // Close connection
   
}
else
{
    die("Couldnt enter data: ".$connection->error); // display error message if not delete
}
  unset($_SESSION['submit']);
 }
?>



     </body>

  
</html>