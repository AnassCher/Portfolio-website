<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//require 'vendor/autoload.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    

    require 'vendor/autoload.php';
    $mail = new PHPMailer;
    //moexaqrfpdjjrxzq

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'anass.cherkawi.01@gmail.com';                     //SMTP username
        $mail->Password   = 'moexaqrfpdjjrxzq';                               //SMTP password
        $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
        $to = "Anass.cherkawi.01@gmail.com";
        $subject = "Contact from website";
        //Recipients
        //$mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress($to);     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "From : ".$email."<br> message :".$message;
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    // Display the submitted message
    /*echo "Received message from: $name<br>";
    echo "Email: $email<br>";
    echo "Message: $message<br>";
    $to = "Anass.cherkawi.01@gmail.com";
    $subject = "Contact from website";
    $headers = "From: $email"."\r\n";
    mail($to, $subject, $message, $headers);*/
    // Additional processing (e.g., sending emails, storing in a database) can be done here
}
?>
