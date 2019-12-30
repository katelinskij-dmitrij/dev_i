<?php
session_start();
// Страница авторизации

// Функция для генерации случайной строки
function generateCode($length = 6)
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0, $clen)];
    }
    return $code;
}
function isAuth() {
    if (isset($_SESSION["is_auth"])) { //Если сессия существует
        return $_SESSION["is_auth"]; //Возвращаем значение переменной сессии is_auth (хранит true если авторизован, false если не авторизован)
    }
    else return false; //Пользователь не авторизован, т.к. переменная is_auth не создана
}

require_once '../DB/connection.php'; // подключаем скрипт

// подключаемся к серверу
$link = mysqli_connect($localhost, $username, $password, $database);

if (isset($_POST['submit'])) {

    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysqli_query($link, "SELECT user_id, password FROM PrivatePerson WHERE login='" . mysqli_real_escape_string($link, $_POST['login']) . "' LIMIT 1");

    $data = mysqli_fetch_assoc($query);


    // Сравниваем пароли
    if ($data['password'] == md5(md5($_POST['password']))) {

        // Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));
        echo $_POST['not_attach_ip'];


        if ($_POST['not_attach_ip'] !== '') {

            // Если пользователя выбрал привязку к IP
            // Переводим IP в строку
            $insip = ", user_ip=INET_ATON('" . $_SERVER['REMOTE_ADDR'] . "')";
        }

        // Записываем в БД новый хеш авторизации и IP
        mysqli_query($link, "UPDATE PrivatePerson SET user_hash='" . $hash . "' " . $insip . " WHERE user_id='" . $data['user_id'] . "'");

        // Ставим куки
        setcookie("id", $data['user_id'], time() + 60 * 60 * 24 * 30);
        setcookie("hash", $hash, time() + 60 * 60 * 24 * 30, null, null, null, true); // httponly !!!


        header('Location: check.php');
        exit();

    } else {
        print "Вы ввели неправильный логин/пароль";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход в личный кабинет.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/bootstrap.css">
</head>
<body>
<form method="POST">
    Логин <input name="login" type="text" required><br>
    Пароль <input name="password" type="password" required><br>
    Не прикреплять к IP(не безопасно) <input type="checkbox" name="not_attach_ip"><br>
    <input name="submit" type="submit" value="Войти">
</form>
</body>
</html>