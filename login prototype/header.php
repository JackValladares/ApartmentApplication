

<link rel="stylesheet" href="stylesheet.css">
<script type = "text/javascript" src="LoginFunctions.js"></script>


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
	echo "<h1>Database Connected successfully</h1>";



		echo "<div class=\"header\">";
			echo "<img src = \"logo.png\" />";
		echo "</div>";
	
		echo "<br>";
	
	
	
		echo "<div class = \"buttonHolder\">";
			echo "<button id=\"loginButton\"> Log In </button>";
		echo "</div>";
	
		echo "<form action=\"javascript:login()\">";
			echo "<div class=\"imgcontainer\">";
		echo "</div>";




		echo "<div id=\"loginInterface\">";
		echo "<label for=\"email\"><b>Email </b></label>";
			echo "<input id = \"email\" type=\"text\" placeholder=\"Enter Username\" name=\"username\" required>";

			echo "<br>";
			echo "<br>";
		
			echo "<label for=\"password\"><b>Password </b></label>";
			echo "<input type=\"password\" id = \"password\"placeholder=\"Enter Password\" name=\"password\" required>";

			echo "<br>";
			echo "<br>";

			echo "<button type=\"submit\" id=\"submitButton\" onClick=\"login()\">Login</button> ";
			echo "<label>";
				echo "<input type=\"checkbox\" checked=\"checked\" name=\"remember\"> Remember me";
			echo "</label>";
	
			echo "<br>";

			echo "<span class=\"password\"><a href=\"#\">Forgot password?</a></span>";

		echo "</div>";
		echo "</form>";
?>