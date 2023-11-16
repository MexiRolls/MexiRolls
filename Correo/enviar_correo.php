<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mailer/Exception.php';
require 'mailer/PHPMailer.php';
require 'mailer/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $Name = $_POST['Nombre'];
  $Name2 = $_POST['Nombre'];
  $message = $_POST['Mensaje'];

  $mail = new PHPMailer(true);

  try {
    //Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp-mail.outlook.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'crr090506@hotmail.com';
    $mail->Password = 'carlosrr17A';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('crr090506@hotmail.com', $Name);
    $mail->addAddress('carlosrr17A');

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Comentario';
    $mail->Body = $message;

    $mail->send();
    echo '<script>alert("El mensaje se envió correctamente")</script>';
  } catch (Exception $e) {
    echo "<script>alert('Hubo un error al enviar el mensaje: {$mail->ErrorInfo}')</script>";
  }
}
?>