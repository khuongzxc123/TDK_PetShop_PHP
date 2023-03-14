<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailController
{
    function sendMail($email, $sb, $mes)
    {

        require 'PHPMailer-master/src/Exception.php';
        require 'PHPMailer-master/src/PHPMailer.php';
        require 'PHPMailer-master/src/SMTP.php';

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        //config mail
        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->Host = "smtp.gmail.com";
        $mail->Username = "khuongzxc123@gmail.com";
        $mail->Password = "pkvjuooimpifskzv"; //pkvjuooimpifskzv

        $form= "khuongzxc123@gmail.com" ;
        $formName = "TDK_PetShop";
        $to= $email;
        $name= $email ; 
        $subject = $sb;
        $message = $mes;


        $mail->IsHTML(true);
        $mail->AddAddress($to, $name);
        $mail->SetFrom($form, $formName);
        // $mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
        // $mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        if (!$mail->Send()) {
            echo "Error while sending Email.";
            var_dump($mail);
        } else {
            echo "Email sent successfully";
        }
    }
}
?>