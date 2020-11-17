<html>

  <head>
    <title> User Login | Foodie </title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="./css/user_signup.css">

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
      <a class="navbar-brand" href="index.php">Foodie</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
          <li ><a href="index.php">Home</a></li>
            <li ><a href="aboutus.php">About</a></li>
            <li ><a href="contactus.php">Contact Us</a></li>
             <li ><a href="partner_register.php">Partner with us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="user_signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="user_signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>











<?php
 session_start();
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "foodie";

$connection = mysqli_connect($db_host,$db_user,$db_password,$db_name);


$name = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['email'];
$mob_no = $_POST['phone'];
$address = $_POST['address'];


$user_check_query = "SELECT * FROM user WHERE Email='$email' OR Phone='$mob_no' LIMIT 1";
  $result = mysqli_query($connection, $user_check_query);
  $user_exist = mysqli_fetch_assoc($result);
  
  if ($user_exist) { // if user exists
   
       $_SESSION['msg'] = "User already exist";
       header('location:user_signup.php');
    
  }
else{

$insert_query = "insert into user(Name,Email,Password,Phone,Address) values('$name','$email','$password','$mob_no','$address')";

$insert = mysqli_query($connection,$insert_query);
if($insert)
{
    mysqli_close($connection); // Close connection
    ?>
    <div class="container">
  <div class="jumbotron" style="text-align: center;">
    <h2> <?php echo "Welcome $name!" ?> </h2>
    <h1>Your account has been created.</h1>
    <p>Login Now from <a href="user_signin.php">HERE</a></p>
  </div>
</div>

<?php
   
}
else
{
    die("Couldnt enter data: ".$connection->error);
}


}
?>




    </body>
</html>