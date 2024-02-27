<?php

// Enable error reporting for debugging
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp-relay.brevo.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "gabrielangelopuedan4@gmail.com";
$mail->Password = "ILKCRU0tEknO27TM";

$mail->setFrom($email, $name);
$mail->addAddress("gabrielangelopuedan4@gmail.com", "Gabriel Angelo");

$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();

try {
    $mail->send();
    header("Location: ".$_SERVER['HTTP_REFERER']."?success=1"); // Redirect to the previous page with a success parameter
    exit(); // Ensure that no further code is executed after the header
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
