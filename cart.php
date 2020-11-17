<?php
session_start();
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "foodie";

$connection = mysqli_connect($db_host,$db_user,$db_password,$db_name);

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



  if(isset($_GET["action"]))
    {
      if($_GET["action"] == "empty")
        {
          $sql = "Delete from cart where username = '$email'";
          $result =  mysqli_query($connection, $sql);
          
          header('location:cart.php');

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
   <link rel="stylesheet" type="text/css" href="./css/cart.css">
   

 <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>


 


  </head>

 

  <body>

 <nav class="navbar navbar-inverse sticky-top">
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
        
          <li ><a href="food_menu.php">Home</a></li>
            <li ><a href="aboutus.php">About</a></li>
            <li ><a href="contactus.php">Contact Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li ><a href="#">Welcome <?php echo $Name ?>  </a></li>
        <a href="cart.php" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" style="font-size:36px"></i><span ></span><span class="caret"></span> </a>
                <ul style="background-color: black; " class="dropdown-menu">
              <li> <a style="color: #9d9d9d" href="user_profile.php">Profile</a></li>
              <li> <a style="color: #9d9d9d" href="past_orders.php">Past orders</a></li>
              <li ><a style="color: #9d9d9d" href="user_logout.php"><span class="glyphicon glyphicon-log-out "></span> Logout</a></li>
            </ul>
        <a href="cart.php" style="background-color: black;font-size:20px; color:white"> <i class="fa fa-shopping-cart" style="background-color: black;font-size:36px; height: 50px; color:white" ></i><span ></span>(<?php
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

if($_SESSION["count"]==0)
{
  ?>
  <div class="container">
      <div class="jumbotron">
        <h1>Your Shopping Cart</h1>
        <p>Oops! We can't smell any food here. Go back and <a href="food_menu.php">order now.</a></p>
        
      </div>
      
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php
}
else{

    $sql = "SELECT * from cart where username = '$email'";
    $result =  mysqli_query($connection, $sql);
    ?>

    <div class="card">
      <table>
        <tr><th width="60%">Dish</th>
          <th width="30%">Quantity</th>
          <th width="10%">Cost</th>
        </tr>
        <?php
        $total = 0;
   while($row = mysqli_fetch_assoc($result)){
    $total += $row["Quantity"]*$row["Price"];
  ?>
    
        <tr>
         <h6>
          <td width="60%"><span class="text-dark" ><?php echo $row["Name"]; ?></span></td>
          <form action="cart1.php" method="post">
         <td><span class="text-info"> <input  type="number" min="0" max="25" name="quantity"  value="<?php echo $row["Quantity"]; ?>" style="width: 60px; display: inline;"> </span></td>
         <input type="hidden" name="food_id" value="<?php echo $row['food_id']; ?>">
         <input type="hidden" name="partner_id" value="<?php echo $row['partner_id']; ?>">
       </form>
        <td><span class="text-danger"><?php echo $row["Quantity"]*$row["Price"]; ?>/-</span></td></h6>
        
       

  <?php
}
?>

  </table>
   
    <div> Total Pay :  &#8377;<?php echo $total;  ?></div>


     <div >
      <a href="cart.php?action=empty"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Empty Cart</button></a>
    <a href="food_menu.php"> <button  class="btn btn-warning"> <i class="fa fa-shopping-cart fa-1.5x" ></i>Continue Shopping</button></a>
    
     </div>

     </div>

<div class="container card card2" style="position: absolute; top: 8%; right: 3%; font-size: 1.5rem" >

 <div class="form-area">
        <form action="order_placed.php" method="POST">
        <br >
          <h3 style="text-align: center;"> FILL DELIEVERY ADDRESS HERE </h3>

          <div class="form-group">
           <textarea  class='input' type='text' name="food_id" placeholder="ADDRESS" rows="10" cols="60" required></textarea> 
          </div>
           <div class="form-group">
           Cash On Delievery: <input onclick="hide()" type="radio" name="method" value="Cash on Delievery" placeholder="COD" required> 
          </div>
           <div class="form-group">
           Pay Online: <input onclick="show()" type="radio" name="method" value="pay online" placeholder="COD"> 
          </div>

           


<div class="container hidden" id="creditcard">
   
        <div >
            <div class="credit-card-div">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h5 class="text-muted"> Credit Card Number</h5>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <input type="text" class="form-control" placeholder="0000" required="" />
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <input type="text" class="form-control" placeholder="0000" required="" />
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <input type="text" class="form-control" placeholder="0000" required="" />
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <input type="text" class="form-control" placeholder="0000" required="" />
                            </div>
                        </div>
                        <br>
                        <div class="row ">
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <span class="help-block text-muted small-font"> Expiry Month</span>
                                <input type="text" class="form-control" placeholder="MM" required="" />
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <span class="help-block text-muted small-font">  Expiry Year</span>
                                <input type="text" class="form-control" placeholder="YY" required="" />
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <span class="help-block text-muted small-font">  CCV</span>
                                <input type="text" class="form-control" placeholder="CCV" required="" />
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3"><br>
                                <img src="images/creditcard.png" class="img-rounded" required="" />
                            </div>
                        </div>
                        <br>
                        <div class="row ">
                            <div class="col-md-12 pad-adjust">

                                <input type="text" class="form-control" placeholder="Name On The Card" required="" />
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 pad-adjust">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked class="text-muted" required=""> Save details for fast payments. <a href="#">Learn More</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                             <a href="payment.php"><input type="submit" class="btn btn-danger btn-block" value="CANCEL" required="" /></a>   
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                              <input onclick="submit()" type="submit" class="btn btn-success btn-block" value="PAY NOW" required="" />  
                            </div>
                        </div>

                    </div>
                </div>
            </div>
          
        </div>
    
</div>





         <button type="submit" onclick="submit()" class="btn btn-success" id="checkout"><span class="glyphicon glyphicon-share-alt"></span> Check Out</button>
        </form>



      
  </div>




</div>


    <?php
}
?>


    </body>
</html>

<script type="text/javascript" src="./js/cart.js"></script>