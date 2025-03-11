<?php 
require "PHPMailer/src/PHPMailer.php"; 
require "PHPMailer/src/SMTP.php"; 
require 'PHPMailer/src/Exception.php'; 

?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer {
    public function dathangmail($to, $subject, $body) {
        $mail = new PHPMailer(true); // Passing `true` enables exceptions
        $mail->CharSet ='UTF-8';
        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'buiphong22012004@gmail.com'; // Your Mailtrap username
            $mail->Password = 'nica exbm qqkn dawt'; // Your Mailtrap password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Sender and recipient settings
            $mail->setFrom('buiphong22012004@gmail.com', 'WEB');
            // $mail->addReplyTo('info@mailtrap.io', 'Mailtrap');
            $mail->addAddress($to, 'Thanh Phong');
            // CC and BCC
            // $mail->addCC('cc1@example.com', 'Elena');
            // $mail->addBCC('bcc1@example.com', 'Alex');
            // Adding more BCC recipients
            // $mail->addBCC('bcc2@example.com', 'Anna');
            // $mail->addBCC('bcc3@example.com', 'Mark');

            // Email content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body; // Example HTML body
            // $mail->AltBody = 'This is the plain text version of the email content';

            if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>