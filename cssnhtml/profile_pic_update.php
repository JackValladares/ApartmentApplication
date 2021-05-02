<?php

session_start();
require_once("../php/sqlFunctions.php");

$userid = $_SESSION['user_id'];

if(isset($_FILES['upload']))
{
    $name = $_FILES['upload']['name'];
    $tmpName = $_FILES['upload']['tmp_name'];
    
    $target_dir = realpath(__DIR__ . '/..')."\\Webpages\\imgs\\example-profile\\";
    $imgData = addslashes(file_get_contents($tmpName));

    if(move_uploaded_file($tmpName, $target_dir.$name))
    {
        $conn = connectDB();
        $checkQuery = "SELECT * FROM ProfileImages WHERE profile_id = '$userid'";
        $result = $conn->query($checkQuery);
        if(mysqli_num_rows($result) == 1) //change profile picture
        {
            $query = "UPDATE ProfileImages SET profile_image = '$imgData' WHERE profile_id = '$userid'";
        }
        else //add profile picture
        {
            $query = "INSERT INTO ProfileImages (profile_image, profile_id) VALUES '$imgData', '$userid')";
        }

        
        $result = $conn->query($query);
        if(!$result)
        {
            header("location:edit_profile.php?msg=Failure");
        }
        else
        {
            header("location:edit_profile.php?msg=Success");
        }
    }
}

?>