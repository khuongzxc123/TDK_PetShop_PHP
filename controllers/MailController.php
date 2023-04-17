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
        $mail->Username = "dangthanhle206@gmail.com";
        $mail->Password = "xnmlbpqdqdrwwceq";

        $form= "hugoloc1003@gmail.com" ;
        $formName = "TDK_PetShop";
        $to= $email;
        $name= $email ; 
        $subject = $sb;
        $message = $mes;


        $mail->IsHTML(true);
        $mail->AddAddress($to, $name);
        $mail->SetFrom($form, $formName);
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