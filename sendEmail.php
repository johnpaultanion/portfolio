<?php

  use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['name']) && isset($_POST['email'])){
        $email = $_POST['email'];
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $body = $_POST['body'];

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();
        //STMP SETTINGS

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username ="johnpaultanion001@gmail.com";
        $mail->Password = 'johnpaultanion!123';
        $mail->Port = 465; //587 465
        $mail->SMTPSecure = "ssl"; //tls

        //Email Settings

        $mail->isHTML(true);
        $mail->setFrom($email , $name);
        $mail->addAddress("johnpaultanion003@gmail.com");
        $mail->Subject = $subject;
        $mail->Body = $body;
    
        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent!";
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));
    }

?>