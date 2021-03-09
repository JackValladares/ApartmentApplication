<?php
    require_once("../php/sqlFunctions.php");

    $conn = connectDB();
    if(!$conn)
    {
        echo "database connection failure";
        die("failed on DB connection");
    }
    $reset_code = $_POST['reset_code'];
    $email = $_POST["email"];
    $password1 = htmlspecialchars($_POST["password1"]);
    $password2 = htmlspecialchars($_POST["password2"]);

    if($_SESSION['password_reset_key'] == $reset_code){
        if(strcmp($password1, $password2)==0){
            updateAccount($conn, $password1, $email);
        }
        else{
            header("Location: password_reset_page.php?PDM=1");
        }
    }
    else{
        header("Location: password_reset_page.php?KNR=1");
    }

?>