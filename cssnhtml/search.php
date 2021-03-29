<?php
    require_once "../php/sqlFunctions.php";

    $conn = connectDB();
    if(!$conn)
    {
        echo "database connection failure";
        die("failed on DB connection");
    }
?>