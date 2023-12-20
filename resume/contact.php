<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'chemin/vers/PHPMailer/src/Exception.php';
require 'chemin/vers/PHPMailer/src/PHPMailer.php';
require 'chemin/vers/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Mettez à jour avec les détails de votre serveur SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'medelyes.abidi@gmail.com'; // Mettez à jour avec votre adresse e-mail
        $mail->Password = 'uadhsylplnwuoium'; // Mettez à jour avec votre mot de passe
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('medelyes.ab@gmail.com'); // Adresse e-mail de destination

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>
