<?php
namespace App\registration;
use  App\registration\dbConnect;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

class User{
    public $uname;
    public $pass;
    public $email;
    
    public function chk_user($uname,$pass,$conn)
    {
            
        $sql="select * from user where uname='$uname' and pass='$pass' and active=1";
        $result= mysqli_query($conn,$sql);

        if($result->num_rows>0)
        {
            header('location: welcome.php');
         }
          else
        {
            return false;
         }
        
    }

    public function insert($uname,$email,$pass,$conn)
        {
            $hash=md5($pass);
            //print_r($hash);
            $sql="insert into user(uname,email,pass,active) values('$uname','$email','$hash',0)";
            $result=mysqli_query($conn,$sql);
           // print_r($result);
        }

    

    public function chk_email($email,$conn)
    {
            
        $sql="select * from user where email='$email'";
        $result= mysqli_query($conn,$sql);

        if($result->num_rows>0)
        {
            return true;
         }
          else
        {
            return FALSE;
         }
     
        }

        public function sendemail($uname,$email,$pass)
        {
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
            $mail->addAddress($email, $uname);     // Add a recipient
                        // Name is optional
            
            
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'email verfication';
            $mail->Body    = 'please click on link to activate your account:<br>http://localhost:8888/registration/verify.php?email='.$email.'';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent!!!!<br>please click on link to activate your account';
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }
        }

        public function activateuser($email,$conn)
        {
            $sql="update user set active=1 where email='$email'";
            $result= mysqli_query($conn,$sql);
        }
    }
?>