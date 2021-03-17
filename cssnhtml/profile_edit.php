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


    $conn = connectDB();
    $email = $_SESSION['email'];
    $user_id = (int) get_user_id($conn, $email);
    /*$query = "INSERT INTO Profile(dob, temp_preference, bedtime, cleaning_sched, 
    smoker, drinker, visitor_acceptance, party_often, bio_paragraph, age, user_id)
     VALUES ('.$DOB','.$prefTemp','.$bedTime','.$cleaning','.$smoker','.$drinker','.$peopleOver','.$party','.$bio','.$age','.$user_id')";
    */

    /*
    Good Children:
        user_id
        bio
        smoker
        drinker
        visitor_acceptance
        bedTime
        temp_pref
        party_often
        age
        dob
        cleaning schedule

    Problem Children:

    */
    $please = "UPDATE `Profile` SET cleaning_sched = '$cleaning', dob = '$DOB', age = '$age', party_often = '$party', temp_preference = '$prefTemp', bedtime = '$bedTime', smoker = '$smoker', drinker = '$drinker', visitor_acceptance = '$peopleOver', bio_paragraph = '$bio' WHERE user_id = $user_id"; 

    
    insert_profile($conn, $please);
    header("Location: gottem.php");

?>