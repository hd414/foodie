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

$user_check_query = "SELECT Name FROM user WHERE Email='$email'  LIMIT 1";
  $result = mysqli_query($connection, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  $Name = $user['Name'];


  $sql = "SELECT count(Quantity) as total from cart where username = '$email'";
  $result =  mysqli_query($connection, $sql);
  $user = mysqli_fetch_assoc($result);
  $_SESSION['count'] = $user['total'];

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
   <link rel="stylesheet" type="text/css" href="./css/food_menu.css">

 <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>


<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>


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
      <a class="navbar-brand" href="food_menu.php">Foodie</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
          <li class="active"><a href="food_menu.php">Home</a></li>
            <li ><a href="aboutus.php">About</a></li>
            <li ><a href="contactus.php">Contact Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li ><a href="#">Welcome <?php echo $Name ?>  </a></li>
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
        
      </ul>
    </div>
  </div>
</nav>

   

<div class="container" style="width: 100%; height: 80%; padding: 0;">
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="https://images2.minutemediacdn.com/image/upload/c_crop,h_1126,w_2000,x_0,y_181/f_auto,q_auto,w_1100/v1554932288/shape/mentalfloss/12531-istock-637790866.jpg" alt="Los Angeles" style="width:100%; height: 100%">
      </div>

      <div class="item">
        <img src="./images/slide001.jpg" style="width:100%; height: 100%">
      </div>
    
      <div class="item">
        <img src="./images/Baahubali_Thali.jpg" style="width:100%; height: 100%">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

 








<div class="container" style="width: 100%">

<!-- Display all Food from food table -->
<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "foodie";

$connection = mysqli_connect($db_host,$db_user,$db_password,$db_name);

$sql = "SELECT * FROM food ORDER BY Name";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0)
{
  $count=0;

  while($row = mysqli_fetch_assoc($result)){
    if ($count == 0)
      echo "<div class='row'>";

?>
 <div class="column">
    <div class="card">

<form method="post" action="user_order.php">
<div class="mypanel" align="center";>
<img class="image" src="<?php echo $row["Image"]; ?>" class="img-responsive">
<h4 class="text-dark"><?php echo $row["Name"]; ?></h4>
<h5 class="text-info" data-toggle="tooltip" title="<?php echo $row["Description"] ;?>"><?php echo substr($row["Description"] ,0,30);?></h5>
<h5 class="text-danger">&#8377; <?php echo $row["Price"]; ?>/-</h5>
<h5 class="text-info">Quantity: <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px;"> </h5>
<input type="hidden" name="hidden_name" value="<?php echo $row["Name"]; ?>">
<input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>">
<input type="hidden" name="hidden_RID" value="<?php echo $row["partner_id"]; ?>">
<input type="hidden" name="hidden_FID" value="<?php echo $row["food_id"]; ?>">
<input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
</div>
</form>
      
</div>
</div>

<?php
$count++;
if($count==4)
{
  echo "</div>";
  $count=0;
}
}
?>

</div>
</div>
<?php
}
else
{
  ?>

  <div class="container">
    <div class="jumbotron">
      <center>
         <label style="margin-left: 5px;color: red;"> <h1>Oops! No food is available.</h1> </label>
        <p>Stay Hungry...! :P</p>
      </center>
       
    </div>
  </div>

  <?php

}

?>



</body>
</html>
