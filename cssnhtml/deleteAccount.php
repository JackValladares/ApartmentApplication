<?php 

require_once("../php/sqlFunctions.php");
$conn = connectDB();
$email = $_SESSION['email'];
$userID = $_SESSION['user_id'];
session_start();
    session_destroy();
    setcookie("email", "", time() - 3600);
    setcookie("password", "", time() - 3600);
deleteAccount($conn, $userID);
header("Location: ../webpages/homepage.php");

?>