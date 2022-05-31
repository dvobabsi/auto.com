<?php
/* Осуществляем проверку вводимых данных и их защиту от враждебных 
скриптов */
$your_name = htmlspecialchars($_POST["your_name"]);
$email = htmlspecialchars($_POST["tel"]);
//$tema = htmlspecialchars($_POST["address"]);
//$message = htmlspecialchars($_POST["message"]);
/* Устанавливаем e-mail адресата */
$myemail = "test@test.ru";
/* Проверяем заполнены ли обязательные поля ввода, используя check_input 
функцию */
$your_name = check_input($_POST["your_name"], "Написати своє ім'я.!");
$email = check_input($_POST["tel"], "Напишіть свій номер телефону.!");
//$tema = check_input($_POST["address"], "Напишіть свою адресу.!");
//$message = check_input($_POST["message"], "Ви забули написати повідомлення.!");
/* Проверяем правильно ли записан e-mail */
/*if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("<br /> Е-mail адрес не существует");
}*/
/* Создаем новую переменную, присвоив ей значение */
$message_to_myemail = "Здравствуйте! 
Вашей контактной формой было отправлено сообщение! 
Имя отправителя: $your_name 
Номер телефона: $email 
Конец";
/* Отправляем сообщение, используя mail() функцию */
$from  = "From: $yourname <$email> \r\n Reply-To: $email \r\n"; 
mail($myemail, $tema, $message_to_myemail, $from);
?>
<p>Ваше повідомлення успішно надіслано!</p>
<p>На <a href="index.html">головну сторінку >>></a></p>
<?php
/* Если при заполнении формы были допущены ошибки сработает 
следующий код: */
function check_input($data, $problem = "")
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}
function show_error($myError)
{
?>
<html>
<body>
    <style>
        .container_window {
            margin: 0 auto;
            width: 50%;
        }
    </style>
<div class="wrapper">
    <div class="container_window">
        <div class="window">
            <h1>Помилка:</h1>
            <?php echo $myError; ?>

            <p>На <a href="index.html">головну сторінку >>></a></p>
        </div>
    </div>
</div>

</body>
</html>
<?php
exit();
}
?>