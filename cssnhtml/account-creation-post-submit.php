<?php
			session_start();
			require_once("../php/sqlFunctions.php");

			$conn = connectDB();
			if(!$conn)
			{
				echo "database connection failure";
				die("failed on DB connection");
			}
			$email = $_POST["email"];
			$password = $_POST["password"];
			$f_name = $_POST["f-name"];
			$l_name = $_POST["l-name"];
			$user_name = $f_name ." ". $l_name;
			$_SESSION['email'] = $email;
			$_SESSION['f_name'] = $f_name;
			$_SESSION['l_name'] = $l_name;

			insertAccount($conn,$email,$user_name,$password);
			$questionAIR = $_POST['profile_setup'];
			if($questionAIR == "PLS")
				header("Location: profile_questionnaire.php");
			else
				header("Location: index.php");

?>