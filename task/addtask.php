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
                if (isset($_POST['sub'])) {
                    echo "0901";
                    // подключаемся к серверу

                    require_once '../DB/connection.php'; // подключаем скрипт

// подключаемся к серверу
                    $link = mysqli_connect($localhost, $username, $password, $database)
                    or die("Ошибка " . mysqli_error($link));

                    // экранирования символов для mysql

                    $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
                    $project = htmlentities(mysqli_real_escape_string($link, $_POST['project ']));
                    $customer = htmlentities(mysqli_real_escape_string($link, $_POST['customer']));
                    $site = htmlentities(mysqli_real_escape_string($link, $_POST['site']));
                    $priority = htmlentities(mysqli_real_escape_string($link, $_POST['priority']));
                    $developer = htmlentities(mysqli_real_escape_string($link, $_POST['developer']));
                    $date_start = htmlentities(mysqli_real_escape_string($link, $_POST['date_start']));
                    $date_end = htmlentities(mysqli_real_escape_string($link, $_POST['date_end']));
                    $time_spent = htmlentities(mysqli_real_escape_string($link, $_POST['time_spent']));
                    $status = htmlentities(mysqli_real_escape_string($link, $_POST['status']));
                    $text = htmlentities(mysqli_real_escape_string($link, $_POST['text']));


                    // создание строки запроса

                    $addtask = "INSERT INTO `task` (`id_task`, `name`, `project`, `customer`, `site`, `priority`, `developer`, `date_start`, `date_end`, `time_spent`, `status`, `text`) VALUES (NULL, '$name', '$project', '$customer','$site', '$title', '$priority','$developer',
 '$date_start', '$date_end','$time_spent', '$status','$text')";
                    // выполняем запрос
                    $result = mysqli_query($link, $addtask) or die("Ошибка " . mysqli_error($link));
                    if ($result) {
                        echo "<span style='color:blue;'>Новость добавлена</span>";
                    }

                    // закрываем подключение
                    mysqli_close($link);
                }
                ?>
                <h2>Добавить новую новость</h2>
                <form method="POST">
                    <p>Название:<br>
                        <input type="text" name="name"/></p>
                    <p>Проект: <br>
                        <input type="text" name="title"/></p>
                    <p>Заказчик: <br>
                        <input type="text" name="text"/></p>
                    <p>Сайт:<br>
                        <input type="text" name="name"/></p>
                    <p>Приоритет: <br>
                        <input type="text" name="title"/></p>
                    <p>Разработчик: <br>
                        <input type="text" name="text"/></p>
                    <p>Дата создания:<br>
                        <input type="text" name="name"/></p>
                    <p>Дата завершения: <br>
                        <input type="text" name="title"/></p>
                    <p>Потраченное время: <br>
                        <input type="text" name="text"/></p>
                    <p>Статус:<br>
                        <input type="text" name="name"/></p>
                    <p>Информация: <br>
                        <input type="text" name="title"/></p>
                    <input name="sub" type="submit" value="Добавить">
                </form>
            </div>
        </div>
    </div>
</body>
</html>