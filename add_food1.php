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


$name = $_POST['name'];
$price = $_POST['price'];
$desc = $_POST['description'];
$img = $_POST['images_path'];



$connection = mysqli_connect($db_host,$db_user,$db_password,$db_name);



$user_check_query = "SELECT * FROM food WHERE partner_id='$email' AND Name='$name' ";
 echo $user_check_query;
  $result = mysqli_query($connection, $user_check_query);

  $food_exist = mysqli_fetch_assoc($result);
 

if($food_exist){
  $_SESSION['add_msg'] = 'This item is already exist in Menu ';
  header('location:add_food.php');
}
   
$insert_query = "insert into food(Name,Price,Description,Image,partner_id) values( '$name','$price','$desc','$img','$email')";
echo $insert_query;
$insert = mysqli_query($connection,$insert_query);
if($insert)
{
    mysqli_close($connection); // Close connection
    $_SESSION['add_msg'] = 'One item added to Menu';
    header('location:add_food.php');
   
}
else
{
     $_SESSION['add_msg'] = 'Something went wrong';
  die(mysqli_error($connection));

}




?>

