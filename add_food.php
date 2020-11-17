<?php
 session_start();
 
 if(!isset($_SESSION['partner'])){
 header('location:partner_signin.php');
}


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


<html>

  <head>
    <title> Add food | Foodie </title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="./css/partner_profile.css">

 <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
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
      <a class="navbar-brand" href="partner_profile.php">Foodie</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
          <li ><a href="partner_profile.php">Home</a></li>
            <li ><a href="aboutus.php">About</a></li>
            <li ><a href="contactus.php">Contact Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li ><a href="#"><span class="glyphicon glyphicon-user"></span>Welcome <?php echo $Name ?>  </a></li>
        <li class="active"><a href="partner_profile.php"><span class=""></span>Restaurants Profile </a></li>
        <li ><a href="partner_logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>


<ul class = 'vertical navbar navbar-inverse'>
  <li><a  href="partner_profile.php">View Food Items</a></li>
  <li><a class="active" href="add_food.php">Add Food Items</a></li>
  <li><a href="edit_food.php">Edit Food Items</a></li>
  <li><a href="delete_food.php">Delete Food Items</a></li>
  <li><a href="view_order_details.php">View Order Details</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;">
  <?php
  if(isset($_SESSION['add_msg'])){
  echo "<span style='text-align:center;  color: #6D7781; cursive;font-size: 15px;font-weight: bold;'>".$_SESSION['add_msg']."</span>";
      unset($_SESSION['add_msg']);
}
  
  ?>
  <div class="col-xs-9">
      <div class="form-area" style="padding: 0px 100px 100px 100px;">
        <form action="add_food1.php" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> ADD NEW FOOD ITEM HERE </h3>

          <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Your Food name" required="">
          </div>     

          <div class="form-group">
            <input type="text" class="form-control" id="price" name="price" placeholder="Your Food Price (INR)" required="">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="description" name="description" placeholder="Your Food Description" required="">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="images_path" name="images_path" placeholder="Your Food Image Path " required="">
          </div>

          <div class="form-group">
          <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right"> ADD FOOD </button>    
      </div>
        </form>

        
        </div>
      
    </div>


</div>









    </body>
</html>