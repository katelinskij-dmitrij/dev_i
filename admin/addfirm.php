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
                if (isset($_POST['name_company']) && isset($_POST['login']) && isset($_POST['password']) && isset($_POST['role'])) {

                    // подключаемся к серверу

                    require_once '../DB/connection.php'; // подключаем скрипт

// подключаемся к серверу
                    $link = mysqli_connect($localhost, $username, $password, $database)
                    or die("Ошибка " . mysqli_error($link));

                    // экранирования символов для mysql

                    $login = htmlentities(mysqli_real_escape_string($link, $_POST['login']));
                    $password = htmlentities(mysqli_real_escape_string($link, $_POST['password']));
                    $name_org = htmlentities(mysqli_real_escape_string($link, $_POST['name_org']));
                    $inn = htmlentities(mysqli_real_escape_string($link, $_POST['role']));
                    $kpp = htmlentities(mysqli_real_escape_string($link, $_POST['kpp']));
                    $ogrn = htmlentities(mysqli_real_escape_string($link, $_POST['ogrn']));
                    $addressLegal = htmlentities(mysqli_real_escape_string($link, $_POST['addressLegal']));
                    $actualAddress = htmlentities(mysqli_real_escape_string($link, $_POST['actualAddress']));
                    $mailAddress = htmlentities(mysqli_real_escape_string($link, $_POST['mailAddress']));
                    $checkingAccount = htmlentities(mysqli_real_escape_string($link, $_POST['checkingAccount']));
                    $cashAccount = htmlentities(mysqli_real_escape_string($link, $_POST['cashAccount']));
                    $bik = htmlentities(mysqli_real_escape_string($link, $_POST['bik']));
                    $boss = htmlentities(mysqli_real_escape_string($link, $_POST['boss']));
                    $phone = htmlentities(mysqli_real_escape_string($link, $_POST['phone']));
                    $mail = htmlentities(mysqli_real_escape_string($link, $_POST['mail']));
                    $project = htmlentities(mysqli_real_escape_string($link, $_POST['project']));
                    $balance = htmlentities(mysqli_real_escape_string($link, $_POST['balance']));
                    $role = htmlentities(mysqli_real_escape_string($link, $_POST['role']));

                    // создание строки запроса

                    $addfirm = "INSERT INTO `FirmPerson` (`firm_id`, `login`, `password`, `name_org`, `inn`, `kpp`, `ogrn`, `addressLegal`, `actualAddress`, `mailAddress`, `checking account`, `cash account`, `bik`, `boss`, `phone`, `mail`, `project`, `balance`, `role`) VALUES (NULL, '$login','$password','$name_org','$inn','$kpp','$ogrn','$addressLegal',
'$actualAddress','$mailAddress','$checkingAccount','$cashAccount','$bik','$boss','$phone','$mail','$project','$balance','$role')";

                    // выполняем запрос
                    $result = mysqli_query($link, $addfirm) or die("Ошибка " . mysqli_error($link));
                    if ($result) {
                        echo "<span style='color:blue;'>Данные добавлены</span>";
                    }

                    // закрываем подключение
                    mysqli_close($link);
                }
                ?>
                <h2>Добавить новую фирму</h2>
                <form method="POST">
                    <p>Введите название фирмы:<br>
                        <input type="text" name="name_org"/></p>
                    <p>Логин: <br>
                        <input type="text" name="login"/></p>
                    <p>Пароль: <br>
                        <input type="text" name="password"/></p>
                    <p>Проект: <br>
                        <input type="text" name="project"/></p>
                    <p>Роль: <br>
                        <input type="text" name="role"/></p>
                    <input type="submit" value="Добавить">
                </form>

            </div>
        </div>
    </div>
</body>
</html>