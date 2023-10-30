<?php

require __DIR__ . '/PHPMailer/src/PHPMailer.php';

use PHPMailer\src\PHPMailer;
use PHPMailer\src\Exception;

$mail = new PHPMailer;

$to = "info@okos.com.ar"; // Change this to the recipient email address

$nombre = $_POST['name'];
$email = $_POST['email'];
$mensaje = nl2br($_POST['message']);

if ($nombre == '' || $email == '' || $mensaje == '') {
    header("Location: index.html"); // Redirect if any required field is missing
} else {
    $mail->setFrom($email, $nombre);
    $mail->addAddress($to);
    $mail->isHTML(true);
    $mail->Subject = 'Contacto desde web';
    $mail->Body = '<strong>' . $nombre . '</strong> envió el siguiente mensaje: <br><p>' . $mensaje . '</p>';

    $mail->CharSet = 'UTF-8';

   try {
        $mail->send();
        echo 'Message sent successfully.';
    } catch (Exception $e) {
        echo 'Message could not be sent. Error: ' . $mail->ErrorInfo;;
    }
}

?>