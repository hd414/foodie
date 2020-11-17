<?php




if(!isset($_SESSION['partner'])){
 header('location:partner_signin.php');
}


$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "foodie";
$email = $_SESSION['partner'];
$connection = mysqli_connect($db_host,$db_user,$db_password,$db_name);



$cheks = implode("','", $_POST['checkbox']);
$sql = "DELETE FROM food  WHERE food_id in ('$cheks')";

$delete = mysqli_query($connection,$sql);
if($delete)
{
    mysqli_close($connection); // Close connection
    header('location:delete_food.php');
    exit; 
}
else
{
    die("Couldnt enter data: ".$connection->error); // display error message if not delete
}


?>