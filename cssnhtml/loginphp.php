<?php

    require_once("../php/sqlFunctions.php");

    $conn = connectDB();
    if(!$conn)
    {
        echo "database connection failure";
        die("failed on DB connection");
    }
    $email = $_POST["username"];
    $password = $_POST["password"];
    $rememberMe = $_POST['remember'];
    

    userLogin($conn,$email,$password, $rememberMe, $hp = 1);
    

?>