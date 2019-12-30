<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Личный кабинет</title><?php
    include "../page/header.php"
    ?></head>
<body>

<div class="container w color-services">
    <div class="row centered">
        <div class="left_panel">
            <?php
            include "admin_nav.php"
            ?>
        </div>

        <div class="right_panel">
            <div class="new_user">
                <?php

                if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['surname'])) {
                    echo "0901";
                    // подключаемся к серверу

                    require_once '../DB/connection.php'; // подключаем скрипт
                    echo "090";
// подключаемся к серверу
                    $link = mysqli_connect($localhost, $username, $password, $database)
                    or die("Ошибка " . mysqli_error($link));

                    // экранирования символов для mysql

                    $login = htmlentities(mysqli_real_escape_string($link, $_POST['login']));
                    $password = htmlentities(mysqli_real_escape_string($link, $_POST['password']));
                    $surname = htmlentities(mysqli_real_escape_string($link, $_POST['surname']));
                    $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
                    $middleName = htmlentities(mysqli_real_escape_string($link, $_POST['middleName']));
                    $phone = htmlentities(mysqli_real_escape_string($link, $_POST['phone']));
                    $passport = htmlentities(mysqli_real_escape_string($link, $_POST['passport']));
                    $mail = htmlentities(mysqli_real_escape_string($link, $_POST['mail']));
                    $project = htmlentities(mysqli_real_escape_string($link, $_POST['project']));
                    $balance = htmlentities(mysqli_real_escape_string($link, $_POST['balance']));
                    $role = htmlentities(mysqli_real_escape_string($link, $_POST['role']));

                    // создание строки запроса

                    $adduser = "INSERT INTO `PrivatePerson` (`user_id`, `login`, `password`, `surname`, `name`, `middleName`, `phone`, `passport`, `mail`) VALUES (NULL, '$login', '$password', '$surname', '$name', '$middleName', '$phone', '$passport', '$mail')";


                    // выполняем запрос
                    $result = mysqli_query($link, $adduser) or die("Ошибка " . mysqli_error($link));
                    if ($result) {
                        echo "<span style='color:blue;'>Данные добавлены</span>";
                    }

                    // закрываем подключение
                    mysqli_close($link);

                }
                header("Location:".$_SERVER['PHP_SELF']);
                ?>

                <h2>Добавить новое частное лицо</h2>
                <form method="POST" id="ajax_form" action="">
                    <p>Введите Имя:<br>
                        <input type="text" name="surname"/></p>
                    <p>Логин: <br>
                        <input type="text" name="login"/></p>
                    <p>Пароль: <br>
                        <input type="text" name="password"/></p>
                    <p>Фамилия: <br>
                        <input type="text" name="middleName"/></p>
                    <p>Телефон: <br>
                        <input type="text" name="phone"/></p>
                    <p>Паспорт: <br>
                        <input type="text" name="passport"/></p>
                    <p>Почта: <br>
                        <input type="text" name="mail"/></p>
                    <p>Проект: <br>
                        <input type="text" name="project"/></p>
                    <p>Счет: <br>
                        <input type="text" name="balance"/></p>
                    <p>Роль: <br>
                        <input type="text" name="role"/></p>
                    <input type="submit" value="Добавить">

                </form>

            </div>
        </div>
    </div>
</body>
</html>