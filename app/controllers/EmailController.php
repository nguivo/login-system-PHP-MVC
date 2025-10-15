<?php

namespace framework\app\controllers;

use framework\core\Application;
use framework\core\Controller;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class EmailController extends Controller
{
    private PHPMailer $mail;
    public static string $EMAIL_DIR;


    public function __construct()
    {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = getenv('SMTP_HOST');

        $mail->SMTPAuth = true;
        $mail->Username = getenv('MAIL_USERNAME');
        $mail->Password = getenv('MAIL_PASS'); // Use Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = getenv('MAIL_PORT');

//        self::$EMAIL_DIR = Application::$ROOT_DIR."/app/views/emails";
        self::$EMAIL_DIR = $_ENV['EMAIL_TEMPLATE_DIR'];
        $this->mail = $mail;
    }


    public function sendEmailVerificationMail($receiver): bool
    {
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


    public function sendPasswordResetMail($receiver): bool
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