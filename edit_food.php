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
    <title> Edit food | Foodie </title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="./css/partner_profile.css">
     <link rel="stylesheet" type="text/css" href="./css/edit_food.css">
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
  <li><a  href="add_food.php">Add Food Items</a></li>
  <li><a class="active" href="edit_food.php">Edit Food Items</a></li>
  <li><a href="delete_food.php">Delete Food Items</a></li>
  <li><a href="view_order_details.php">View Order Details</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;">
  <?php
  if(isset($_SESSION['edit_msg'])){
  echo "<span style='text-align:center;  color: #6D7781; cursive;font-size: 15px;font-weight: bold;'>".$_SESSION['edit_msg']."</span>";
      unset($_SESSION['edit_msg']);
}
  
  ?>
<div class="col-xs-3 card">

  <div class="form-area" style="padding: 10px 10px 110px 10px; ">
  
    <div style="text-align: center;">
      <h3>Click On Menu <br><br></h3>
    </div>
    <?php
   
   $query = mysqli_query($connection, "SELECT * FROM food WHERE partner_id='$email' Order by food_id");
    while ($row = mysqli_fetch_array($query)) {

      ?>

      <div class="list-group" style="text-align: center;">
        <?php
      echo "<b><a href='edit_food.php?update= {$row['food_id']}'>{$row['Name']}</a></b>";  
        ?>
      </div>


    <?php
    }
    ?>
    

    <?php
    if (isset($_GET['update'])) {
    $update = $_GET['update'];
    $query1 = mysqli_query($connection, "SELECT * FROM food WHERE food_id=$update");
    while ($row1 = mysqli_fetch_array($query1)) {
          $name = $row1['Name'] ;
          $price = $row1['Price'] ;
          $desc = $row1['Description'];
          $img = $row1['Image'];
          
    ?>
</div>
</div>



<div class="container card card2">
<div >
 <div class="form-area">
        <form action="edit_food1.php" method="POST">
        <br >
          <h3 style="text-align: center;"> EDIT YOUR FOOD ITEMS HERE </h3>

          <div class="form-group">
            <input class='input' type='hidden' name="food_id" value="<?php echo $row1['food_id'];  ?>" />
          </div>

          <div class="form-group">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Food Name: </label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$name?>" placeholder="Your Food name" required="">
          </div>     

          <div class="form-group">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Food Price: </label>
            <input type="text" class="form-control" id="price" name="price" value="<?php echo $price;  ?>" placeholder="Your Food Price (INR)" required="">
          </div>

          <div class="form-group">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Food Description: </label>
            <input type="text" class="form-control" id="description" name="description" value="<?=$desc?>" placeholder="Your Food Description" required="">
          </div>
          
          <div class="form-group">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Food Image: </label>
            <input type="text" class="form-control" id="image" name="images_path" value="<?php echo $img;  ?> "placeholder="Your Food Image path" required="">
          </div>

          <div class="form-group">
          <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right"> Update </button>    
      </div>
        </form>


    <?php
}
}


  ?>
      
  </div>




</div>


<?php

?>
</div>
</div>


    </body>
</html>