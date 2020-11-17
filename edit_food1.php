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

$id = $_POST['food_id'];
$name = $_POST['name'];
$price = $_POST['price'];
$desc = $_POST['description'];
$img = $_POST['images_path'];



$connection = mysqli_connect($db_host,$db_user,$db_password,$db_name);







$update_query = "update food SET Name = '$name', Price = '$price', Description = '$desc',Image = '$img'where partner_id = '$email' AND food_id = '$id'";

      $update = mysqli_query($connection,$update_query);
    




if($update)
{
    mysqli_close($connection); // Close connection
    $_SESSION['edit_msg'] = 'One item Edited in Menu';
    header('location:edit_food.php');
    exit; 
}
else
{
    die("Couldnt enter data: ".$connection->error); // display error message if not delete
}
   




?>

