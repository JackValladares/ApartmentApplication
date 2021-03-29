<html>
    <head>
        <title>Password Reset Request</title>
    </head>
    <body>
        <?php
            if(isset($_GET['RCE']) and isset($_GET['email']))
			{
				$temp = $_GET['email'];
				echo "<h1>Email $temp is not in the system</h1>";
			}
        ?>
        <form method="post" action="password_reset_request.php">
        <p>Enter Email Address To Send Password Link</p>
        <input type="text" name="email">
        <input type="submit" name="submit_email" value = "Submit">
        </form>
    </body>
</html>