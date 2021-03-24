<?php
    session_start();
    require_once('../php/sqlFunctions.php');

    $address = $_POST['address'];
    $city = $_POST['city'];
    
    $state = $_POST['state'];
    $apptNum = $_POST['apptNum'];
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
    $listing_id = $_POST['listing_id'];
    

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

    if($apptNum == "")
        {
            $please = "UPDATE `Listing` SET (`address` = $address, `city` = $city, `state` = $state, `room_size` = $roomSize, `bath_type` = $bathType, `price` = $price) WHERE listing_id = '$listing_id";
        }
    else
        $please = "UPDATE `Listing` SET (`apt_no` = $apptNum ,`address` = $address, `city` = $city, `state` = $state, `room_size` = $roomSize, `bath_type` = $bathType, `price` = $price) WHERE listing_id = '$listing_id";

    $ahh = "INSERT INTO `Listing` (`user_id`) VALUES ('$user_id')";
    //echo $email;
    insert_listing($conn, $please);
    header("Location: gottem.php");

?>