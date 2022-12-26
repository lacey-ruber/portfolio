<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTML(true);

// От кого письмо
$mail->setFrom('', '');

// Кому отправить
$mail->addAddress('');

// Тема письма
$mail->Subject = '';

// Тело письма
$body = '<h1></h1>';

if(trim(!empty($_POST['name']))){
  $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
}
if(trim(!empty($_POST['email']))) {
  $body.='<p><strong>Email:</strong> '.$_POST['email'].'</p>';
}
if(trim(!empty($_POST['message']))) {
  $body.='<p><strong>Сообщение:</strong> '.$_POST['message'].'</p>';
}

$mail->Body = $body;

// Отправка
if(!$mail->send()) {
  $message = 'Ошибка';
} else {
  $message = 'Сообщение отправлено';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>