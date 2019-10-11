<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$email = $_POST['user_email'];
$phone = $_POST['user_phone'];
$problem = $_POST['user_problem'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'kalispeller@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'Lesha_1614'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('kalispeller@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('kalispeller@yandex.ru');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с сайта';
$mail->Body    = 'Имя: ' . $name . '<br>Email: ' . $email . '<br>Номер телефона: ' . $phone . '<br><br>Текст заявки: ' . $problem;
$mail->AltBody = '';

session_start();
$_SESSION['user_name'] = $name;
$_SESSION['user_email'] = $email;
$_SESSION['user_phone'] = $phone;
$_SESSION['user_problem'] = $problem;

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: telegram.php');
}
?>