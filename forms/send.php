<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require __DIR__ . "/PHPMailer/src/PHPMailer.php";
// require __DIR__  '/PHPMailer/PHPMailerAutoload.php';

require __DIR__ . "/PHPMailer/PHPMailer/Exception.php";
require __DIR__ . "/PHPMailer/PHPMailer/PHPMailer.php";
require __DIR__ . "/PHPMailer/PHPMailer/SMTP.php";

// use PHPMailer\src\PHPMailer;
// use PHPMailer\src\Exception;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';

$to = "info@okos.com.ar"; // Change this to the recipient email address

$nombre = $_POST['name'];
$email = $_POST['email'];
$mensaje = nl2br($_POST['message']);

if ($nombre == '' || $email == '' || $mensaje == '') {
    header("Location: index.html"); // Redirect if any required field is missing
} else {
    //Recipients
    $mail->setFrom($email, $nombre);
    $mail->addAddress($to);
    
    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Contacto desde web';
    $mail->Body = '<strong>' . $nombre . '</strong> envió el siguiente mensaje: <br><p>' . $mensaje . '</p>';
    
    try {
        $mail->send();
        echo 'Message sent successfully.';
    } catch (Exception $e) {
        echo 'Message could not be sent. Error: ' . $mail->ErrorInfo;
    }
}

?>