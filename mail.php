<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use  App\registration\dbConnect;
use  App\registration\user;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);  
                          // Passing `true` enables exceptions
try {
   
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'alshayakapoor@gmail.com';                 // SMTP username
    $mail->Password = 'Vrushali@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;  
    $mail->Timeout = 3600;                                    // TCP port to connect to
    
    //Recipients
    $mail->setFrom('diwanitrupti@gmail.com', 'Mailer');
    $mail->addAddress('trupti.diwani@qed42.com', 'Joe ßßßß');     // Add a recipient
                 // Name is optional
    
    
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>