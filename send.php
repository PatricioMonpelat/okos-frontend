<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$to = "info@okos.com.ar"; 

$nombre = $_POST['name'];
$email = $_POST['email'];
$mensaje = nl2br($_POST['message']);

if($nombre == '' || $email == '' || $mensaje == ''):
	header("Location:index.html");
else:
$mail->From= $email;
$mail->FromName= $nombre;
$mail->addAddress($to);
$mail->isHtml(true);
$mail->Subject= 'Contacto desde web';
$mail->Body = '<strong>'.$nombre.'</strong> envió el siguiente mensaje: <br><p>'.$mensaje.'</p>';

$mail->CharSet = 'UTF-8';
$mail->send();
header("Location:index.html");

endif;
?>