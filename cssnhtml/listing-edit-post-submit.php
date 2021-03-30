<?php
    session_start();
    require_once('../php/sqlFunctions.php');

    $address = $_POST['address'];
    $city = $_POST['city'];
    
    $state = $_POST['state'];
    $apt_no = $_POST['apt_no'];
    $roomSize1 = $_POST['roomSize1'];
    $roomSize2 = $_POST['roomSize2'];

    $roomSize = $roomSize1 . ' x ' . $roomSize2;

    $bathType = $_POST['bathType'];
    $price = (string) $_POST['price'];
    $smokingAllowed = $_POST['smokingAllowed'];
    $petsAllowed = $_POST['petsAllowed'];
    $additionalInfo = $_POST['additionalInfo'];


    $conn = connectDB();
    $email = $_SESSION['email'];
    //$session_user_id = $_SESSION['user_id'];
    $user_id = (int) get_user_id($conn, $email);
    $listing_id = $_POST['listing_id'];
    $smoking_allowed = $_POST['smokingAllowed'];
    $petsAllowed = $_POST['petsAllowed'];
    $misc_info = $_POST['additionalInfo'];
    echo $misc_info;
    

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
        
    */

    if($apptNum == "")
        {
        $please = "UPDATE `Listing` SET `address` = '$address', `city` = '$city', `state` = '$state', `apt_no` = '$apt_no' , `room_size` = '$roomSize' , `bath_type` = '$bathType' , `price` = '$price', `smoking_allowed` = '$smoking_allowed', `pets_allowed` = '$petsAllowed', `misc_info` = '$misc_info' WHERE listing_id = '$listing_id'";
        }
    else
    $please = "UPDATE `Listing` SET `address` = '$address', `city` = '$city', `state` = '$state', `apt_no` = '$apt_no' , `room_size` = '$roomSize' , `bath_type` = '$bathType' , `price` = '$price', `smoking_allowed` = '$smoking_allowed', `pets_allowed` = '$petsAllowed', `misc_info` = '$misc_info' WHERE listing_id = '$listing_id'";

    $ahh = "UPDATE `Listing` SET `address` = '$address', `city` = '$city', `state` = '$state', `apt_no` = '$apt_no' , `room_size` = '$roomSize' , `bath_type` = '$bathType' , `price` = '$price', `misc_info` = '$misc_info' WHERE listing_id = '$listing_id'";
    //echo $email;
    insert_listing($conn, $please);
    header("Location: gottem.php");

?>