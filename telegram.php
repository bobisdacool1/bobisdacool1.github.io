<?php

session_start();

$name = $_SESSION['user_name'];
$email = $_SESSION['user_email'];
$phone = $_SESSION['user_phone'];
$problem = $_SESSION['user_problem'];
$token = "945558352:AAFmGzejNxZT5mN1_G39w6guyplHDkpPzKk";
$chat_id = "-326203757";

$arr = array(
  'Имя пользователя: ' => $name,
  'Телефон: ' => $phone,
  'Email: ' => $email,
  'Текст заявки: ' => $problem
);

foreach($arr as $key => $value) {
  $txt .= "<b>" . $key."</b> " . $value . "%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
  header('Location: thank-you.html');
} else {
  echo "Error";
}
?>