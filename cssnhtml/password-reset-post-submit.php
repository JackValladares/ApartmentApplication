<?php
    require_once("sqlFunctions.php");
    session_start();

    $conn = connectDB();
    if(!$conn)
    {
        echo "database connection failure";
        die("failed on DB connection");
    }
    $reset_code = $_GET['reset_code'];
    $email = $_GET["email"];
    $password1 = $_GET["password1"];
    $password2 = $_GET["password2"];

    if($_SESSION['key'] == $reset_code){
        if($password1 == $password2){
            updateAccount($conn, $password1, $email);
        }
        else{
            header("Location: password_rest_page.php?key=.$reset_code+msg=passwordsDontMatch");
        }
    }
    else{
        header("Location: password_rest_page.php?key=.$reset_code+msg=keyNotRight");
    }

?>