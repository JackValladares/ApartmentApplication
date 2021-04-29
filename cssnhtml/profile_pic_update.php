<?php

require_once("../php/sqlFunctions.php");

$userid = $_POST['userid'];

if(isset($_FILES['upload']))
{
    $name = $_FILES['upload']['name'];
    $type = $_FILES['upload']['type'];
    $tmpName = $_FILES['upload']['tmp_name'];
    $size = $_FILES['upload']['size'];
    
    $target_dir = realpath(__DIR__ . '/..')."\\Webpages\\imgs\\example-profile";

    if(move_uploaded_file($tmpName, $target_dir.$name))
    {
        $conn = connectDB();

        $insertQuery = "INSERT INTO ProfileImages (profile_image, profile_id) VALUES (LOAD_FILE('$target_dir.$name'), '$userid')";
        $result = $conn->query($insertQuery);
        if(!$result)
        {
            echo "$conn->error";
        }
        else
        {
            echo "<p style='color:green'>File uploaded!</p>";
        }
    }
}

?>