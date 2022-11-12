<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet"> 
</head>
<body style="margin:0">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (!empty($_POST['name']) && !empty($_POST['phone'])){
  if (isset($_POST['name'])) {
    if (!empty($_POST['name'])){
  $name = strip_tags($_POST['name']);
  $nameFieldset = "Ім`я: ";
  }
}
 
if (isset($_POST['phone'])) {
  if (!empty($_POST['phone'])){
  $phone = strip_tags($_POST['phone']);
  $phoneFieldset = "Телефон: ";
  }
}
if (isset($_POST['theme'])) {
  if (!empty($_POST['theme'])){
  $theme = strip_tags($_POST['theme']);
  $themeFieldset = "Тема: ";
  }
}
$token = "842828456:AAGALhk3ndcHwVJjiZ9JYBqv9WsK8byEm0g";
$chat_id = "-344414047";
$arr = array(
  $nameFieldset => $name,
  $phoneFieldset => $phone,
  $themeFieldset => $theme
);
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
if ($sendToTelegram) {
  
  echo "
      <div class='thanks' style='
          font-family: PT Sans, sans-serif;
          width: 100%;
          height: 100vh;
          background-image: url(./images/about.jpg);
          background-size: cover;
          background-repeat: no-repeat;
          text-align: center;'>
        <div class='overlay' style='
            background: rgba(0,0,0,0.6);
            width: 100%;
            height: 100vh;
            display: flex;'>
          <div class='content' style='
              margin: auto;
              border: 1px solid #fff;
              padding: 20px;
              background-color: #ffffff4d;
              color: #fff;
              box-shadow: 0px 3px 18px #d5ceceb8'>
                <p style='font-size:40px;font-weight:bold;'>Дякуємо за заявку!</p>
                <p style='font-size:30px'>Найближчим часом ми зв`яжемося з Вами!</p>
            </div>
          </div>
        </div>
            ";
    return true;
} else {
  echo '<p class="fail"><b>Помилка. Повідомлення не було відправлено!</b></p>';
}
} else {
  echo '<p class="fail">Помилка. Ви не заповнили обов`язкові поля!</p>';
}
} else {
header ("Location: /");
}
 
?>

</body>
</html>