<?php 

require_once("../php/sqlFunctions.php");
$conn = connectDB();
session_start();
    setcookie("email", "", time() - 3600);
    setcookie("password", "", time() - 3600);
$email = $_SESSION['email'];
$userID = $_SESSION['user_id'];
session_destroy();
echo "UserID:" . $userID;
deleteAccount($conn, $userID);
header("Location: ../webpages/homepage.php");

?>