<?php
if(isset($_POST['submit_email']) && $_POST['email'])
{
    require_once 'sqlFunctions.php';
    $conn = connectDB();
    $select = "SELECT email, passwd FROM Account WHERE email='$email'";
    $result = $conn->query($select);
    $rows = $result->num_rows;
    if($rows == 1)
    {
        $link="<a href='www.websitename.com/password_reset_setup.php?email=".$email."'>Reset your password here!</a>";
        require_once('phpmail/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $mail->CharSet =  "utf-8";
        $mail->IsSMTP();
        $mail->SMTPAuth = true;     
        $mail->Username = "millyflatmates@gmail.com";
        $mail->Password = "password";
        $mail->SMTPSecure = "ssl";  
        $mail->Host = "smtp.gmail.com";
        $mail->Port = "465";
        $mail->From='your_gmail_id@gmail.com';
        $mail->FromName='your_name';
        $mail->AddAddress('reciever_email_id', 'reciever_name');
        $mail->Subject  =  'Reset Password';
        $mail->IsHTML(true);
        $mail->Body    = 'Click here to reset your password: '.$link.'';
        if($mail->Send())
        {
            echo "Check your email for the link to reset your password.";
        }
        else
        {
            echo "Mail error: ".$mail->ErrorInfo;
        }
    }	
}
?>