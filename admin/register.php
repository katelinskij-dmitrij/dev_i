<?
// Страница регистрации нового пользователя

require_once '../DB/connection.php'; // подключаем скрипт

// подключаемся к серверу
$link = mysqli_connect($localhost, $username, $password, $database)
or die("Ошибка " . mysqli_error($link));


if (isset($_POST['submit'])) {
    $err = [];

    // проверям логин
    if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['login'])) {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }

    if (strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30) {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    // проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($link, "SELECT user_id FROM users WHERE login='" . mysqli_real_escape_string($link, $_POST['login']) . "'");
    if (mysqli_num_rows($query) > 0) {
        $err[] = "Пользователь с таким логином уже существует";
    }

    // Если нет ошибок, то добавляем в БД нового пользователя
    if (count($err) == 0) {

        $login = $_POST['login'];

        $maxid = 0;
        $query_id_user = mysqli_query($link, "SELECT MAX(user_id) FROM users WHERE 1");
        $data_id_user = mysqli_fetch_assoc($query_id_user);
        $maxid = (array_pop($data_id_user)) + 1;

        $role = $_POST['role'];

        if ($role == 1) {

            mysqli_query($link, "INSERT INTO PrivatePerson SET user_id='" . $maxid . "'")
            or die("Ошибка " . mysqli_error($link));
        }
        if ($role == 2) {

            mysqli_query($link, "INSERT INTO FirmPerson SET firm_id='" . $maxid . "'")
            or die("Ошибка " . mysqli_error($link));
        }
        if ($role == 4) {

            mysqli_query($link, "INSERT INTO VIPuser SET vip_id='" . $maxid . "'")
            or die("Ошибка " . mysqli_error($link));
        }
        mysqli_query($link, "INSERT INTO tariffs SET id_tariff='" . $maxid . "'");


        // Убираем лишние пробелы и делаем двойное хеширование
        $password = md5(md5(trim($_POST['password'])));

        mysqli_query($link, "INSERT INTO users SET login='" . $login . "', password='" . $password . "' , role='" . $role . "', user_info='" . $maxid . "'")
        or die("Ошибка " . mysqli_error($link));


        header("Location: ../login.php");
        exit();
    } else {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach ($err AS $error) {
            print $error . "<br>";
        }
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
    <select name="role" size="1">
        <option value="1">Частное лицо</option>
        <option value="2">Организация</option>
        <option value="3">Админ</option>
        <option value="4">VIP</option>
    </select>
    <input name="submit" type="submit" value="Зарегистрировать">
</form>
</body>
</html>