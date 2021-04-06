

<link rel="stylesheet" href="../Webpages/css/stylesheet.css">
<script type = "text/javascript" src="../Webpages/javascript/LoginFunctions.js"></script>


<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "apartmentapplication";
	

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	


	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}
	//echo "<h1>Database Connected successfully</h1>";


		//div with logo
		echo "<div class=\"header\">";

		echo "<a href=\"Homepage.php\"><img src = \"imgs/ui/logo.png\" id =\"logo\"/></a>";

		echo "</div>";
	
		echo "<br>";
	
	
		//Button that opens and closes login box
		echo "<div class = \"buttonHolder\">";
			echo "<button id=\"loginButton\"> <img src = \"../Webpages/imgs/ui/buttons/login.png\"  id=\"loginPNG\" \"/> </button>";
		echo "</div>";
	
		//login form
		echo "<form action=\"../cssnhtml/loginphp.php\" method=\"POST\">";
			
			//image
			echo "<div class=\"imgcontainer\">";
			echo "</div>";
			
			//div for formatting
			echo "<div id=\"loginInterface\">";
			
				//email field
				echo "<label for=\"email\"><b>Email </b></label>";
				echo "<input id = \"email\" type=\"text\" placeholder=\"Enter Username\" name=\"username\" required>";

				//spacing
				echo "<br>";
				echo "<br>";
		
				//password field
				echo "<label for=\"password\"><b>Password </b></label>";
				echo "<input type=\"password\" id = \"password\"placeholder=\"Enter Password\" name=\"password\" required>";

				//spacing
				echo "<br>";
				echo "<br>";

				//submit button
				echo "<button type=\"submit\" id=\"submitButton\">Login</button> ";
				echo "<label>";
				
				//remember me
				echo "<input type=\"checkbox\" checked=\"checked\" name=\"remember\"> Remember me";
				echo "</label>";
	
				//spacing
				echo "<br>";

				//forgot password link
				echo "<span class=\"password\"><a href=\"#\">Forgot password?</a></span>";
				//create account link
				echo "<span class=\"createaccount\"><a href=\"../cssnhtml/profile_questionnaire.php\"><br>Create Account</a></span>";


			echo "</div>";
		echo "</form>";
		
		
		
		/*function loginProcess()
		{
			
			$findPass = "SELECT passwd FROM account WHERE email = $email;";

			$result = $conn->query($findPass);
			
			echo $result;
			
			login($result);


		}*/
?>
