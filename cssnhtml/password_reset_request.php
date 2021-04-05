<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
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
        generate_insert_key($conn, $email);
        $emailquery = "SELECT passwd_reset_key FROM account WHERE email='$email'";
        $result = $conn->query($emailquery);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $codeString = $row["passwd_reset_key"];
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
        $mail->FromName='Milledgeville Flatmates';
        $mail->AddAddress("$email", 'reciever_name');
        $mail->Subject  =  'Reset Password Code';
        $mail->IsHTML(true);
        $mail->Body    = 'Your password reset code is '.$codeString.'.';
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