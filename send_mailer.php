<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendEmail($to, $subject, $body){

    $mail = new PHPMailer(true);

    try{
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Update to your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your-email@gmail.com'; // Your email address
        $mail->Password   = 'your-app-password';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('your-email@gmail.com', 'To-Do List');
        $mail->addAddress($to);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        echo 'Mail is sent';
        return true;
    }
    catch (Exception $e) {
        echo $mail->ErrorInfo;
        return false;
    }
}