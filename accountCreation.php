<!DOCTYPE html>
<html>
	<head>
		<title>Account Creation</title>
		<script type="text/javascript" src = "myFunctions.js"></script>
	</head>
	<body>
		<!--<form class = "account-creation-form" action = "account-creation-functions.php" method="get">!-->
			<ul>
				<li>
					<label for="email-input">Email</label>
					<input type="email" id = "email-input" name="email">
				</li>

				<li>					
					<label for="password-input">Password</label>
					<input type="password" id="password-input" name = "password" minlength="8" required
					title = "Enter a password of at least 8 length">
				</li>

				<li>
					<label for="f-name-input">First Name</label>
					<input type="text" id="f-name-input" name = "f-name">
				</li>

				<li>
					<label for="l-name-input">Last Name</label>
					<input type="text" id="l-name-input" name = "l-name">
				</li>

				<li>
					<input type="submit" id="submit-button" value="Create Account" onclick="getAccountCreationInfo()">
				</li>
			</ul>
		<h1 id = "test"></h1>
	</body>
</html>