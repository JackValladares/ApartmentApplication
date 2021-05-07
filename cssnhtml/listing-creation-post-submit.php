<?php
    session_start();
    require_once('../php/sqlFunctions.php');

    $address = $_POST['address'];
    $city = $_POST['city'];
    
    $state = $_POST['state'];
    $apptNum = $_POST['aptNum'];
    $roomSize1 = $_POST['roomSize1'];
    $roomSize2 = $_POST['roomSize2'];

    $roomSize = $roomSize1 . ' x ' . $roomSize2;

    $bathType = $_POST['bathType'];
    $price = $_POST['price'];
    $smokingAllowed = $_POST['smokingAllowed'];
    $petsAllowed = $_POST['petsAllowed'];
    $additionalInfo = $_POST['additionalInfo'];


    $conn = connectDB();
    $email = $_SESSION['email'];
    //$session_user_id = $_SESSION['user_id'];
    $user_id = (int) get_user_id($conn, $email);
    

    /*
    Good Children:
        Address
        apt_no
        city
        state
        room_size
        bath_type
        price
        


    Problem Children:
        user_id
    */

    /*if($apptNum == "")
        { $please = "INSERT INTO `Listing` (`address`, `city`, `state`, `room_size`, `bath_type`, `price`, `user_id`, `smoking_allowed`, `pets_allowed`,`misc_info`) VALUES ('$address', '$city', '$state', '$roomSize', '$bathType', '$price', '$user_id', '$smokingAllowed', '$petsAllowed', '$additionalInfo')";}
    else
    */

        $please = "INSERT INTO `Listing` (`address`, `apt_no`, `city`, `state`, `room_size`, `bath_type`, `price`, `user_id`, `smoking_allowed`, `pets_allowed`,`misc_info`) 
        VALUES ('$address', '$aptNum', '$city', '$state', '$roomSize', '$bathType', '$price', '$user_id', '$smokingAllowed', '$petsAllowed', '$additionalInfo')"; 


    $ahh = "INSERT INTO `Listing` (`user_id`) VALUES ('$user_id')";
    //echo $email;
    insert_listing($conn, $please);
    header("Location: ../webpages/profile.php");
    

?>