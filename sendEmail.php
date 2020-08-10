<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$msg = $_POST['msg'];


    if (empty($name) || empty($email) || empty($subject) || empty($msg)){
            
        header("Location: index.php?error=emptyfield");
        exit();
        }

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.php?error=invalidemail");
        exit();

        }

    else{

     

    
        require_once 'PHPMailer/PHPMailerAutoload.php';
        require_once 'PHPMailer/Exception.php';
        require_once 'PHPMailer/PHPMailer.php';
        require_once 'PHPMailer/SMTP.php';
        
       $mail = new PHPMailer();
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username = 'johnpaultanion001@gmail.com';
        $mail->Password = 'johnpaultanion!123';

        $mail->setFrom($email, $name);
        $mail->addAddress('johnpaultanion003@gmail.com');
        $mail->addReplyTo($email, $name);


        $mail->isHTML(true);
        $mail->Subject='Form Submission: ' .$subject;
        $mail->Body='<h1 align=center> Name: '.$name. '<br>Email: '.$email. '<br
        >Message: '.$msg.'</h1>'; 

        if(!$mail->send()){
            
            header("location: index.php?error=emailerror");
            exit();
            
        }else{
            header("location: index.php?success=emailsuccess");
            exit();
            
        }
    
    }



}
