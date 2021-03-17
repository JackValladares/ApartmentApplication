<?php

session_start();

require_once("../php/sqlFunctions.php");

$conn = connectDB();

$user_id = $_GET['user_id'];
$results = get_profile_data($conn, $user_id);

print_r($results);

echo "AGE: " . $results['age'];

?>