<?php
    session_start();
    require_once('../php/sqlFunctions.php');

    $gender = $_POST['gender'];
    $DOB = $_POST['date-of-birth'];
    $DOB = date("Y-m-d", strtotime($DOB));
    
    $age = floor((time() - strtotime($DOB))/31556926);

    $prefTemp = $_POST['prefTempVal'];
    $bedTime = $_POST['bedTimeVal'];
    $cleaning = $_POST['cleanTime'];
    $drinker = $_POST['drinker'];
    $smoker = $_POST['smoker'];
    $peopleOver = $_POST['peopleOver'];
    $party = $_POST['party'];
    $bio = $_POST['bioVal'];
    $gender = $_POST['gender'];


    $conn = connectDB();
    $email = $_SESSION['email'];
    $user_id = (int) get_user_id($conn, $email);
    $fName = $_SESSION['f_name'];
    $lName = $_SESSION['l_name'];
    /*$query = "INSERT INTO Profile(dob, temp_preference, bedtime, cleaning_sched, 
    smoker, drinker, visitor_acceptance, party_often, bio_paragraph, age, user_id)
     VALUES ('.$DOB','.$prefTemp','.$bedTime','.$cleaning','.$smoker','.$drinker','.$peopleOver','.$party','.$bio','.$age','.$user_id')";
    */

    /*
    Good Children:
        user_id
        temp_pref
        bedTime
        Smoker
        drinker
        visitor_acceptance
        party_often
        bio
        age
        DOB
        cleaning schedule


    Problem Children:

    */

    $ahh = "INSERT INTO Profile(`user_id`, `cleaning_sched`) VALUES ('$user_id', '$cleaning')";
    $please = "INSERT INTO `Profile` (`dob`, `fName`, `lName`,`temp_preference`, `bedtime`, `cleaning_sched`, `smoker`, `drinker`, `visitor_acceptance`, `party_often`, `bio_paragraph`, `age`, `user_id`, `gender`) VALUES ('$DOB', '$fName', '$lName', '$prefTemp', '$bedTime', '$cleaning', '$smoker', '$drinker', '$peopleOver', '$party', '$bio', '$age', '$user_id', '$gender')"; 

    
    insert_profile($conn, $please);
    header("Location: ../webpages/Homepage.php");

?>