<?php
	session_start();
	if(isset($_GET['key']))
	{
		$_SESSION['password_reset_key'] = $_GET['key'];
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Password Reset</title>
	</head>
	<body>
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
					<input type="password" id="password-input2" name = "password" minlength="8"
					title = "Enter a password that is at least 8 characters long and contains at least one number, one Uppercase letter, and one lowercase letter" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
				</li>


				<li>
					<input type="submit" id="submit-button" value="Reset Password">
				</li>
			</ul>
			<?php 
			
				//if the $_SESSION['register_success] variable exists then that means that registration failed
				//we can update this to get the specific part that didn't work (email or pass or login) by creating
				//more specific $_SESSION variables 
				//POGGERS
				if(isset($_SESSION['register_success'])){
					echo "<h1>ERROR</h1>";
					$error = $_SESSION['registration_error'];
					echo "<h1>$error</h1>";
					unset($_SESSION['registration_error']);
					unset($_SESSION['register_success']);
				}

			?>
		</form>
			<h1 id = "test"></h1>
	</body>
</html>