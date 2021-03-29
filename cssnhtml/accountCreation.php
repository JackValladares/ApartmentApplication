<?php session_start();?>

<!DOCTYPE html>
<html>
	<head>
		<title>Account Creation</title>
	</head>
	<body>
		<form class = "account-creation-form" action = "account-creation-post-submit.php" method="POST">
			<ul>
				<li>
					<label for="email-input">Email</label>
					<input type="email" id = "email-input" name="email">
				</li>

				<li>					
					<label for="password-input">Password</label>
					<input type="password" id="password-input" name = "password" minlength="8"
					title = "Enter a password that is at least 8 characters long and contains at least one number, one Uppercase letter, and one lowercase letter" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
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
					<input type="submit" id="submit-button" value="Create Account">
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