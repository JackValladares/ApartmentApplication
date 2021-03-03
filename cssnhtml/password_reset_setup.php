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

<!--

How it works:
	The passowrd reset request page harris is making redirects to this one which goes and gets
	the reset code associated with the email they supplied on the requet page. If that email exists
	then it gets the code and stores it in the session. if not then it redirects back to harris's page
	with an error message

	Also instead of just using post variable array we could just store the email in the 
	$_SESSION array that way it's widespread arround all pages and we don't have to keep
	passing it in the header!

!-->