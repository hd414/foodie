<?php

session_start();

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "foodie";
$email = $_SESSION['user'];
$connection = mysqli_connect($db_host,$db_user,$db_password,$db_name);


$name = $_POST['hidden_name'];
$quantity = $_POST['quantity'] ;
$price = $_POST['hidden_price'];
$food_id = $_POST['hidden_FID'];
$partner_id = $_POST['hidden_RID'];
$username = $_SESSION['user'];

$food_check_query = "SELECT * FROM cart where username='$username' and partner_id='$partner_id' and food_id = '$food_id' ";
$result = mysqli_query($connection, $food_check_query);
  $food_exist = mysqli_fetch_assoc($result);
 
if($food_exist){
	
	$quantity+=$food_exist['Quantity'];
	
     $update = "UPDATE cart set quantity = '$quantity' WHERE  username='$username' and partner_id='$partner_id' and food_id = '$food_id'";
    $result = mysqli_query($connection, $update);
   if($result)
{
    mysqli_close($connection); // Close connection
    header('location:food_menu.php');
   
}
else
{
   echo "string";
}

}

else{

$insert_query = "INSERT into cart(food_id,Name,Price,Quantity,username,partner_id) values('$food_id','$name','$price','$quantity','$username','$partner_id')";
$insert = mysqli_query($connection,$insert_query);
if($insert)
{
    mysqli_close($connection); // Close connection
    $_SESSION['count']++;
    header('location:food_menu.php');
   
}
else
{
   echo "string";
}


}



?>