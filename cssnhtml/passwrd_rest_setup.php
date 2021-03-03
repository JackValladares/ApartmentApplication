<?php
	require_once("sqlFunctions.php");
	session_start();
	$conn = connectDB();
	if(!$conn)
	{
		echo "database connection failure";
		die("failed on DB connection");
	}

    $email = $_POST['email'];
    getResetCode($conn, $email);
?>