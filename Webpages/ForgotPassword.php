<html>

<head>

	<link rel="stylesheet" href="stylesheet.css" />
	<script type = "text/javascript" src="LoginFunctions.js"></script>

</head>

	<?php include 'header.php'; ?>


<body>

	
	<h2> Forgot your Password? </h2>
	<h3> Enter your email to have a password reset link sent to you </h3>
	<form action = "#" id = "ForgotPassword" onSubmit = "submit(); return false">
		<input type = "text" id = "email" placeholder = "Email Address"></input>
		<input type = "submit"></input>
	</form>

</body>

<?php
	function submit()
	{
		if($email
		echo "<p>An email has been sent to the given addres with a password reset link</p>";
	}
	
?>

</html>