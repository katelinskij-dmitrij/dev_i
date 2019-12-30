<?php
session_start();
require_once '../DB/admin_info.php'; // подключаем скрипт

?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет - Администратора.</title>
    <? include '../page/header.php' ?>

</head>
<body>
<? include '../admin/admin_menu.php' ?>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Регистрация нового пользователя</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

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

//                            $maxid = 0;
//                            $query_id_user = mysqli_query($link, "SELECT MAX(user_id) FROM users WHERE 1");
//                            $data_id_user = mysqli_fetch_assoc($query_id_user);
//                            $maxid = (array_pop($data_id_user)) + 1;

                            $role = $_POST['role'];

//                            if ($role == 1) {
//
//                                mysqli_query($link, "INSERT INTO privatePerson SET user_id='" . $maxid . "'")
//                                or die("Ошибка " . mysqli_error($link));
//                            }
//                            if ($role == 2) {
//
//                                mysqli_query($link, "INSERT INTO firmPerson SET")
//                                or die("Ошибка " . mysqli_error($link));
//                            }
//                            if ($role == 4) {
//
//                                mysqli_query($link, "INSERT INTO VIPuser SET vip_id='" . $maxid . "'")
//                                or die("Ошибка " . mysqli_error($link));
//                            }
//                            mysqli_query($link, "INSERT INTO tariffs SET id_tariff='" . $maxid . "'");


                            // Убираем лишние пробелы и делаем двойное хеширование
                            $password = md5(md5(trim($_POST['password'])));

                            mysqli_query($link, "INSERT INTO users SET  login='" . $login . "', password='" . $password . "' , role='" . $role . "',date_reg_user = '".$today = date("Y-m-d")."'")
                            or die("Ошибка " . mysqli_error($link));

                            header("Refresh:0");

                            exit();
                        } else {
                            print "<b>При регистрации произошли следующие ошибки:</b><br>";
                            foreach ($err AS $error) {
                                print $error . "<br>";
                            }
                        }
                    }
                    ?>

                    <form method="POST">
                        <label for="exampleFormControlSelect2">Логин</label>
                        <input class="form-control" name="login" type="text" required>
                        <label for="exampleFormControlSelect2">Пароль</label>
                        <input  class="form-control" name="password" type="password" required>
                        <label for="exampleFormControlSelect2">Роль нового пользователя</label>
                        <select  id="exampleFormControlSelect1" class="form-control" name="role" size="1">
                            <option value="1">Частное лицо</option>
                            <option value="2">Организация</option>
                            <option value="3">Админ</option>
                            <option value="4">VIP</option>
                        </select>
                        <input class="btn btn-primary" name="submit" type="submit" value="Зарегистрировать">
                    </form>
            </div>

        </div>
    </div>
</div>
<div class="col-sm-8">
    <div class="col-sm-12">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Добавить нового пользователя
            </button>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <div class="list-group">
        <?php users(); ?>
    </div>

</div>
</div>
</div>
</div>
</body>
</html>