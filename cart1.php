<?php
session_start();

$email = $_SESSION['user'];
$p_id = $_POST['partner_id'];
$f_id = $_POST['food_id']; 
$quantity = $_POST['quantity'];

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "foodie";

$connection = mysqli_connect($db_host,$db_user,$db_password,$db_name);

if($quantity==0){
    $delete_query = "Delete from cart where partner_id = '$p_id' AND food_id = '$f_id' and username = '$email'";
    $delete = mysqli_query($connection,$delete_query);
   mysqli_close($connection); // Close connection
    header('location:cart.php');
    exit;
}

$update_query = "update cart SET Quantity = '$quantity' where partner_id = '$p_id' AND food_id = '$f_id' and username = '$email'";

      $update = mysqli_query($connection,$update_query);
    




if($update)
{
    mysqli_close($connection); // Close connection
    header('location:cart.php');
    exit; 
}
else
{
    echo "Error";
}
   



?>