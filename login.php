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

function isAuth()
{
    if (isset($_SESSION["is_auth"])) { //Если сессия существует
        return $_SESSION["is_auth"]; //Возвращаем значение переменной сессии is_auth (хранит true если авторизован, false если не авторизован)
    } else return false; //Пользователь не авторизован, т.к. переменная is_auth не создана
}

require_once 'DB/connection.php'; // подключаем скрипт

// подключаемся к серверу
$link = mysqli_connect($localhost, $username, $password, $database);

if (isset($_POST['submit'])) {

    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysqli_query($link, "SELECT user_id, password FROM users WHERE login='" . mysqli_real_escape_string($link, $_POST['login']) . "' LIMIT 1");

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
        mysqli_query($link, "UPDATE users SET user_hash='" . $hash . "' " . $insip . " WHERE user_id='" . $data['user_id'] . "'");

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

<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <h3>Здраствуйте, пожалуйста, войдите в личный кабинет!</h3>
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Логин</label>
                <input name="login" type="text" class="form-control" id="exampleInputEmail1"
                       aria-describedby="emailHelp" placeholder="Логин">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                       placeholder="Пароль">
            </div>
            <div class="form-group form-check">
                <input name="not_attach_ip" type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Не прикреплять к IP(не безопасно)</label>
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>
    <div class="col-sm-4"></div>
</div>
</body>
</html>