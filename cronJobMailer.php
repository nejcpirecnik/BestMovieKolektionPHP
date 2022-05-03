<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->SMTPAuth = true;

//Source Gmail
$mail->Username = 'bestmoviekolektion@gmail.com';
$mail->Password = 'BestMoviePassword';

//Source Gmail and Subject
$mail->setFrom('bestmoviekolektion@gmail.com', 'Best Movie Kolektion');

//Receiver Email
$mail->addAddress('nejcpirecnik03@gmail.com', 'Nejc');

//Set the subject line
$mail->Subject = 'Cronjob test!';

//Body
$mail->Body = 'Cronjob test!';

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    $_SESSION['mail_sent'] = 1;
    header('location: index.php');
}
function save_mail($mail)
{
    $path = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}