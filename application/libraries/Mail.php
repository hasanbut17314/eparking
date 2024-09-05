<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail
{
    public function sendMail($to, $subject, $message, $from = 'elurishruthi1999@gmail.com')
    {
        require_once APPPATH . 'third_party/PHPMailer/src/Exception.php';
        require_once APPPATH . 'third_party/PHPMailer/src/PHPMailer.php';
        require_once APPPATH . 'third_party/PHPMailer/src/SMTP.php';

        $mail = new PHPMailer(true);

        try {
            // SMTP Configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Google's SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'elurishruthi1999@gmail.com'; // Your Gmail address
            $mail->Password = 'vdki ifvz ilts kttj'; // Your Gmail password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption
            $mail->Port = 587; // TCP port to connect

            // Email Settings
            $mail->setFrom($from, 'Eparking');
            $mail->addAddress($to); // Recipient
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;

            // Send the email
            if ($mail->send()) {
                return true;
            }
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        return false;
    }
}
