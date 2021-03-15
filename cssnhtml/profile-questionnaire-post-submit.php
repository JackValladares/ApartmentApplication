<?php
    require_once('../php/sqlFunctions.php');

    $gender = $_POST['gender'];
    $DOB = $_POST['date-of-birth'];
    
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
    $user_id = get_user_id($conn, $_SESSION['email']);
    $query = "INSERT INTO Profile(property_id, dob, temp_preference, bedtime, cleaning_sched, 
    smoker, drinker, visitor_acceptance, party_often, bio_paragraph, age, user_id)
     VALUES (NULL,'$DOB','$prefTemp','$bedTime','$cleaning','$smoker','$drinker','$peopleOver','$party','$bio','$age','$user_id')";

    
    insert_profile($conn, $query);
    header("Location: AHHHHH.php");

?>