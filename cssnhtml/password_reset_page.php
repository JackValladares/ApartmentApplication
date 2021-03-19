<!DOCTYPE html>
<html>
	<head>
		<title>Password Reset</title>
	</head>
	<body>
		<?php
			if(isset($_GET['PDM']))
			{
				echo "<h1>Passwords don't match! Try again!</h1>";
			}
			if(isset($_GET['KNR']))
			{
				echo "<h1>The key you entered is not correct!</h1>";
			}
			if(isset($_GET['EE']) and isset($_GET['email']))
			{
				$temp = $_GET['email'];
				echo "<h1>Email $temp not in system</h1>";
			}
			if(isset($_GET['RCE']) and isset($_GET['email']))
			{
				$temp = $_GET['email'];
				echo "<h1>Email $temp is not in the system</h1>";
			}
		?>
		<form class = "password-reset-form" action = "password-reset-post-submit.php" method="POST">
			<ul>
                <li>
                    <label for = "reset_code">Password Reset Code:</label>
                    <input type="text" name = "reset_code" pattern = "\d{8}" title = "Enter the 8 digit code that was sent to you email"></input>
                </li>

				<li>
					<label for="email-input">Email</label>
					<input type="email" id = "email-input" name="email">
				</li>

				<li>					
					<label for="password-input1">New Password</label>
					<input type="password" id="password-input1" name = "password1" minlength="8"
					title = "Enter a password that is at least 8 characters long and contains at least one number, one Uppercase letter, and one lowercase letter" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
				</li>

                <li>					
					<label for="password-input2">Re-enter Password:</label>
					<input type="password" id="password-input2" name = "password2" minlength="8"
					title = "Enter a password that is at least 8 characters long and contains at least one number, one Uppercase letter, and one lowercase letter" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
				</li>


				<li>
					<input type="submit" id="submit-button" value="Reset Password">
				</li>
			</ul>
		</form>
	</body>
</html>