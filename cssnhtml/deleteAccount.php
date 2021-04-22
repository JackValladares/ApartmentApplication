<?php 

require_once("./php/sqlFunctions.php");
$conn = connectDB();
$email = $_SESSION['email'];
session_start();
    session_destroy();
    setcookie("email", "", time() - 3600);
    setcookie("password", "", time() - 3600);
$userID = get_user_id($conn, $email);
deleteAccount($conn, $userID);
header("Location: ../webpages/homepage.php");

?>