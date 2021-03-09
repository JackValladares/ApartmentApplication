<html>
    <head>
        <title>Reset Your Password</title>
    </head>
    <body>
        <?php
            require_once 'sqlFunctions.php';
            if($_GET['key'] && $_GET['reset'])
            {
                $email = $_GET['key'];
                $password = $_GET['reset'];
                //TODO: connect with sqli
                $conn = connectDB();
                $verify = "SELECT * FROM account WHERE md5(email) = $email AND md5(password) = $password";
                
                if(mysqli_num_rows($conn->query($verify) == 1)
                {
                    ?>
                    <form method="post" action="submit_new.php">
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <p>Enter new password: </p>
                    <input type="password" name='password'>
                    <input type="submit" name="submit_password">
                    </form>
                    <?php
                }
            }
        ?>
    </body>
</html>