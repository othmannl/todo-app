<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendEmail($to, $subject, $body){

    $mail = new PHPMailer(true);

    try{
        $mail->isSMTP();
        $mail->Host       = 'smtp.domain.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'YOUR EMAIL';
        $mail->Password   = 'YOUR PASSWORD';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('othman.boulal@gmail.com', 'To-Do List');
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