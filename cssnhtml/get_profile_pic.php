<?php
    ini_set('display_errors', 1);
    session_start();
    require_once("../php/sqlFunctions.php");
    $userid = $_SESSION['user_id'];
    $conn = connectDB();

    $query = "SELECT profile_image 
                FROM profileimages 
                INNER JOIN profile 
                ON profileimages.profile_id = profile.profile_id
                WHERE profile.user_id = '$userid'";
    $result = $conn->query($query);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    header("Content-type: image/jpeg");
    echo $row['profile_image'];
?>