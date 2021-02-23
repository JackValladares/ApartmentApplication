<!DOCTYPE html>
<html>
	<head>
		<title>TEST</title>
	</head>
	<body>
		<?php
			require_once("sqlFunctions.php");

			$conn = connectDB();
			if(!$conn)
			{
				echo "database connection failure";
				die("failed on DB connection");
			}
			$email = $_GET["email"];
			$password = $_GET["password"];
			$f_name = $_GET["f-name"];
			$l_name = $_GET["l-name"];
			$user_name = $f_name ." ". $l_name;

			insertAccount($conn,$email,$user_name,$password);
		  
		?>
	</body>
</html>