<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: partner_signin.php"); // Redirecting To Home Page
}
?>