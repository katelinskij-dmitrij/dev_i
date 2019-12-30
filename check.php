<?
session_start();
// Скрипт проверки

require_once 'DB/connection.php'; // подключаем скрипт

// подключаемся к серверу
$link = mysqli_connect($localhost, $username, $password, $database)
or die("Ошибка " . mysqli_error($link));

if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {
    $query = mysqli_query($link, "SELECT *,INET_NTOA(user_ip) AS user_ip FROM users WHERE user_id = '" . intval($_COOKIE['id']) . "' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);


    if (($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id'])
        or (($userdata['user_ip'] !== $_SERVER['REMOTE_ADDR']) and ($userdata['user_ip'] !== "0"))
    ) {
        setcookie("id", "", time() - 3600 * 24 * 30 * 12, "/");
        setcookie("hash", "", time() - 3600 * 24 * 30 * 12, "/");


        $_SESSION["is_auth"] = false;
        header('Location: login.php');

    } else {

        $_SESSION["is_auth"] = true; //Делаем пользователя авторизованным
        $_SESSION["login"] = $userdata['login']; //Записываем в сессию логин пользователя
        header('Location: /');
        exit();


    }
} else {
    print "Включите куки";
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
</body>
</html>
