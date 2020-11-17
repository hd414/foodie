<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: user_signin.php"); // Redirecting To Home Page
}
?>