<!DOCTYPE html>

<html>

<link rel="stylesheet" href="stylesheet.css">
<head>

	<div class="header">
		<img src = "logo.png" />
	</div>
</head>

<body style = "background-color: #cbb26a">
	
	<script type = "text/javascript" src="LoginFunctions.js"></script>
	<?php
	if(isset($_SESSION['regS']))
	{
		echo "<h1>AHHHHH</h1>";
		echo '<script type = "text/Javascript">alert("Registration Successful! Please Login");</script>';
		unset($_SESSION['regS']);
	}
?>

	
	
	
	<br>
	
	<div class="banner" style="background-image: url(MillyBanner.png);" >
	</div>
	
	
	
	<div class = "buttonHolder">
		<button class="loginButton" onClick="openLoginPage()"> Log In </button>
	</div>


	<form action="loginphp.php" method="post">
		<div class="imgcontainer">
	</div>


	<div id="loginInterface">

	<?php
	if(isset($_GET['msg'])){
		echo "Login Failed - Try Again <br>";
	}

	?>
		<label for="username"><b>Username</b></label>
		<input type="text" placeholder="Enter Username" name="username" required>

		<br><br>
		
		<label for="password"><b>Password</b></label>
		<input type="password" placeholder="Enter Password" name="password" required>

		<br><br>

		<button type="submit">Login</button>
		<label>
			<input type="checkbox" checked="checked" name="remember"> Remember me
		</label>
	
		<br>

		<span class="password"><a href="#">Forgot  password?</a></span>
		
		
		
	</div>
	</form>

</body>

</html>