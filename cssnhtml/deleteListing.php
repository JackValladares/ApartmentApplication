<?php

    session_start();

    require_once("../php/sqlFunctions.php");

    $listing_id = $_GET['listing_id'];
    $conn = connectDB();
    $sql = "DELETE FROM Listing WHERE listing_id = $listing_id";

    $conn -> query($sql);

    header("Location: ../webpages/profile.php");


?>