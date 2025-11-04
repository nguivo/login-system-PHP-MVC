<?php

namespace framework\app\controllers;

use framework\app\models\User;
use framework\core\Application;
use framework\core\Controller;
use framework\core\Token;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

/*
 * Check if a token was already saved for the same operation
 * else:
 * Generate a token
 * save the token in a database
 * */
class EmailController extends Controller
{
    private PHPMailer $mail;
    public static string $EMAIL_DIR;


    public function __construct()
    {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = $_ENV['SMTP_HOST'];

        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['MAIL_USERNAME'];
        $mail->Password = $_ENV['MAIL_PASS']; // Use Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $_ENV['MAIL_PORT'];

        // self::$EMAIL_DIR = Application::$ROOT_DIR."/app/views/emails";
        self::$EMAIL_DIR = $_ENV['EMAIL_TEMPLATE_DIR'];
        $this->mail = $mail;
    }


    public function sendEmailVerificationMail(int $receiver): bool
    {
        $token = Token::generate();
        $date = date('Y-m-d H:i:s');

        /* check verification code */
        // TODO: call a method from the User model which checks if the user's email has already been verified. if yes, exit
        $user  = new User();

        // TODO: call a method from the Confirmation Model which checks if the confirmation email has already been sent. If yes, get the details from the confirmation database and resend the email
        // TODO: if none of the above conditions is met, send the confirmation email and register the details

        try {
            $this->mail->setFrom($_ENV['MAIL_CONFIRMATION_FROM'], $_ENV['SITE_NAME']);
            $this->mail->addAddress($receiver);
            $this->mail->Subject = 'Confirm your new email address';
            $this->mail->Body = $this->getMailBody('email-verification');

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            echo "Mailer Error: {$this->mail->ErrorInfo}";
            return false;
        }
    }


    public function sendPasswordResetMail(int $receiver): bool
    {
        try {
            $this->mail->setFrom($_ENV['MAIL_PASSWORD_RESET_FROM'], $_ENV['SITE_NAME']);
            $this->mail->addAddress($receiver);
            $this->mail->Subject = 'Password Reset Request';
            $this->mail->Body = $this->getMailBody('password-reset');

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            echo "Mailer Error: {$this->mail->ErrorInfo}";
            return false;
        }
    }


    private function getMailBody($template): string
    {
        ob_start();
        include self::$EMAIL_DIR."/".$template.".php";
        return ob_get_clean();
    }

}