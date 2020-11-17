<?php
 session_start();
 
 if(!isset($_SESSION['user'])){
 header('location:user_signin.php');
}



$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "foodie";
$email = $_SESSION['user'];
$connection = mysqli_connect($db_host,$db_user,$db_password,$db_name);

$user_check_query = "SELECT * FROM user WHERE Email='$email'  LIMIT 1";
  $result = mysqli_query($connection, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  $Name = $user['Name'];


  


   
  if(isset($_POST['submit'])){
     $id = $_POST['id'];
     $name = $_POST['name'];
     $Email = $_POST['Email'];
     $password = $_POST['password'];
     $phone = $_POST['phone'];

     $sql = "UPDATE user set Name = '$name', Email = '$Email', Password = '$password', Phone = '$phone' where user_id = $id";
     $update = mysqli_query($connection,$sql);
     if($update)
      {
         $_SESSION['user_edit_msg']='YOUR info is updated';
         header('location:user_profile.php');
      }
      else
        {
            die("Couldnt enter data: ".$connection->error); // display error message if not delete
        }
  }

?>


<html>

  <head>
    <title> Food Menu | Foodie </title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   

 <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="./css/user_profile.css">

<style type="text/css">
  
   .fa-user:before {
    padding: 15px;
    padding-right: 0;
    color: white;
}

.fa-shopping-cart:before {
    padding: 10px;
    color: #9D9D9D;
   
}
</style>

  </head>
  
 

  <body style="background-color: #2E3740;">

  
    
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="food_menu.php">Foodie</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
          <li><a href="food_menu.php">Home</a></li>
            <li ><a href="aboutus.php">About</a></li>
            <li ><a href="contactus.php">Contact Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li ><a href="#">Welcome <?php echo $Name ?>  </a></li>
        <a href="cart.php" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" style="font-size:36px; background-color: black; height: 50px; padding-right: 10px;"></i><span ></span><span class="caret"></span> </a>
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
        
      </ul>
    </div>
  </div>
</nav>




<?php



$sql = "SELECT * FROM user WHERE Email='$email'  LIMIT 1";
  $result = mysqli_query($connection, $sql);
  $user = mysqli_fetch_assoc($result);
  $id = $user['user_id'];
  $name = $user['Name'];
  $Email  = $user['Email'];
  $password = $user['Password'];
  $phone = $user['Phone'];
  $address = $user['Address'];
  ?>

<img src="https://i.pinimg.com/originals/51/f6/fb/51f6fb256629fc755b8870c801092942.png" style="float: right; padding: 20px; width: 30%;">

<div class="container" >
<div  >
 <div class="form-area card card2" style=" color: #435160;">
        <form  action="user_profile.php" method="POST">
        <br >
          <div class="form-group">
            <label for="id"><span class="text-danger" style="margin-right: 5px;"></span> </label>
            <input type="hidden" class="form-control" id="id" name="id" value="<?=$id?>" placeholder="" required="">
          </div>     


          <div class="form-group">
            <label for="name"><span class="text-danger" style="margin-right: 5px;">*</span> Name: </label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$name?>" placeholder="Your name" required="">
          </div>     

          <div class="form-group">
            <label for="phone"><span class="text-danger" style="margin-right: 5px;">*</span> Mobile No. : </label>
            <input type="tel" class="form-control" id="phone" name="phone" value=<?php echo $phone;  ?> placeholder="Your Phone number " required="">
          </div>

          <div class="form-group">
            <label for="email"><span class="text-danger" style="margin-right: 5px;">*</span> Email: </label>
            <input type="email" class="form-control" id="email" name="Email" value="<?=$Email?>" placeholder="Your Email Address" required="">
          </div>
          
          <div class="form-group">
            <label for="password"><span class="text-danger" style="margin-right: 5px;">*</span> Your password: </label>
            <input type="text" class="form-control" id="password" name="password" value="<?php echo $password;  ?> "placeholder= "Your Password" required="">
          </div>

          <div class="form-group">
          <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right"> Update </button>    
      </div>
        </form>


  
      
  </div>




</div>


<?php

?>
</div>
</div>




 </body>
</html>