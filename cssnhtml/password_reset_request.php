<?php
use PHPMailer\PHPMailer\PHPMailer;
if(isset($_POST['submit_email']) && $_POST['email'])
{
    require_once '../php/sqlFunctions.php';
    $conn = connectDB();
    $email = $_POST['email'];
    $select = "SELECT email FROM Account WHERE email='$email'";
    $result = $conn->query($select);
    $rows = $result->num_rows;
    if($rows == 1)
    {
        $link="<a href='www.websitename.com/password_reset_setup.php?email=".$email."'>Reset your password here!</a>";
        require_once("../vendor/autoload.php");
        $mail = new PHPMailer();
        $mail->CharSet =  "utf-8";
        $mail->IsSMTP();
        $mail->SMTPAuth = true;     
        $mail->Username = "milledgevilleflatmates@gmail.com";
        $mail->Password = "MillyRock1";
        $mail->SMTPSecure = "ssl";  
        $mail->Host = "ssl://smtp.gmail.com";
        $mail->Port = "465";
        $mail->From='milledgevilleflatmates@gmail.com';
        $mail->FromName='your_name';
        $mail->AddAddress("$email", 'reciever_name');
        $mail->Subject  =  'Reset Password';
        $mail->IsHTML(true);
        $mail->Body    = 'Click here to reset your password: '.$link.'';
        if($mail->Send())
        {
            echo "Check your email for the link to reset your password.";
            header("Location: password_reset_setup.php?email=$email");
        }
        else
        {
            echo "Mail error: ".$mail->ErrorInfo;
        }
    }	
}
?>