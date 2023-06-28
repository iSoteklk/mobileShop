<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';



$mail = new PHPMailer\PHPMailer\PHPMailer();


$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'jeewa.education.mailer@gmail.com';
$mail->Password = 'dixaxpvjugopejal';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->SMTPDebug = true;




$mail->setFrom('jeewa.education.mailer@gmail.com', 'Mobile Shop');
$mail->addAddress('salitha.wijerathna@gmail.com', 'Salitha Wijerathna');
$mail->Subject = 'Your Order is Confirmed';
$mail->Body = 'Body of your email';



if ($mail->send()) {
    echo 'Email sent successfully!';
} else {
    echo 'Error sending email: ' . $mail->ErrorInfo;
}



?>