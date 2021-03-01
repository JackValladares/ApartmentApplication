<html>
    <head>
        <title>Reset Password </title>
    </head>
    <body>
        <form method="post" action="sendlink.php">
            <p>Reset Password</p>
            <label for="email">E-mail</label><br>
            <input type="text" id="email" name="email">
            <input type="submit" name="submit_email">
        </form>

        <?php
            require_once('phpmail/PHPMailerAutoload.php');
            if(isset($_POST['submit_email']) && $_POST['email'])
            {
                //TODO: implement connection with sqli
                $emailquery = "SELECT * FROM account WHERE email = $email";
                if(mysqli_num_rows($emailquery) == 1)
                {
                    while($row=mysqli_fetch_array($emailquery))
                    {
                        $email = md5($row['email']);
                        $password = md5($row['password']);
                    }
                    $link = "<a href='domain.com/changepassword.php?key=".$email."&reset=".$password."'>Reset your password here!</a>";

                    $mail = new PHPMailer();
                    $mail->CharSet = "utf-8";
                    mail->IsSMTP();
                    $mail->SMTPAuth = true;
                    $mail->Username = "our_username@gmail.com";
                    $mail->Password = "gmailpassword";
                    $mail->SMTPSecure = "ssl";
                    $mail->Host = "smtp.gmail.com";
                    $mail->Port = "465";
                    $mail->From = 'our_username@gmail.com';
                    $mail->FromName = 'name?';
                    $mail->AddAddress('receiver_email_id', 'receiver_name');
                    $mail->Subject = 'Reset Your Password - BrandName';
                    $mail->IsHTML(true);
                    $mail->Body = 'We recently received a notification to reset your password. '.$link.<br>.' If you did not intend for this to occur, please disregard this email.';
                    if($mail->Send())
                    {
                        echo "Reset email sent! Please check your email."
                    }
                    else
                    {
                        echo "Mail Error: ".$mail->ErrorInfo;
                    }
                }
                else
                {
                    echo 'Email not found in database.';
                }
            }
        ?>
    </body>
</html>