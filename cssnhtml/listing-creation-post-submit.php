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
    $email = $_GET['email'];
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

    $please = "INSERT INTO `Listing` (`address`, `apt_no`, `city`, `state`, `room_size`, `bath_type`, `price`, `user_id`) VALUES ('$address', '$apptNum', '$city', '$state', '$roomSize', '$bathType', '$price', '$user_id')"; 
    $ahh = "INSERT INTO `Listing` (`user_id`) VALUES ('$user_id')";
    
    insert_listing($conn, $ahh);
    header("Location: gottem.php");

?>