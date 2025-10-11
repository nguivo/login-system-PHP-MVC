<?php

namespace framework\app\controllers;

use framework\core\Controller;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class EmailController extends Controller
{

    public function sendEmailVerification($receiver): bool
    {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com'; // e.g., Mailtrap or SendGrid
            $mail->SMTPAuth = true;
            $mail->Username = 'your_username';
            $mail->Password = 'your_password';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('noreply@yourdomain.com', 'Your App');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Confirm Your Account';
            $mail->Body = "Click <a href='https://yourdomain.com/verify.php?token=$token'>here</a> to confirm your account.";

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}