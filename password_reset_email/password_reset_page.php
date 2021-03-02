<html>
    <head>
        <title>Reset Your Password</title>
    </head>
    <body>
        <?php
            if($_GET['key'] && $_GET['reset'])
            {
                $email = $_GET['key'];
                $password = $_GET['reset'];
                //TODO: connect with sqli
                $verify = "SELECT * FROM account WHERE md5(email) = $email AND md5(password) = $password";
                if(mysqli_num_rows($verify) == 1)
                {
                    ?>
                    <form method="post" action=""
                }
            }
        ?>
    </body>
</html>