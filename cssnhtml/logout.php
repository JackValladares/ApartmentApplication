<?php 

    session_start();
    session_destroy();
    setcookie("email", "", time() - 3600);
    setcookie("password", "", time() - 3600);
    header("Location: ../Webpages/Homepage.php");

?>