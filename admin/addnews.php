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
                if (isset($_POST['name']) && isset($_POST['title']) && isset($_POST['text'])) {
                    echo "0901";
                    // подключаемся к серверу

                    require_once '../DB/connection.php'; // подключаем скрипт

// подключаемся к серверу
                    $link = mysqli_connect($localhost, $username, $password, $database)
                    or die("Ошибка " . mysqli_error($link));

                    // экранирования символов для mysql

                    $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
                    $title = htmlentities(mysqli_real_escape_string($link, $_POST['title']));
                    $text = htmlentities(mysqli_real_escape_string($link, $_POST['text']));


                    // создание строки запроса

                    $addnews = "INSERT INTO `addnews` (`id_news`, `name`, `title`, `text`) VALUES (NULL, '$name', '$title', '$text')";
                    // выполняем запрос
                    $result = mysqli_query($link, $addnews) or die("Ошибка " . mysqli_error($link));
                    if ($result) {
                        echo "<span style='color:blue;'>Новость добавлена</span>";
                    }

                    // закрываем подключение
                    mysqli_close($link);
                }
                ?>
                <h2>Добавить новую новость</h2>
                <form method="POST">
                    <p>Введите имя автора:<br>
                        <input type="text" name="name"/></p>
                    <p>Title: <br>
                        <input type="text" name="title"/></p>
                    <p>Текст: <br>
                        <input type="text" name="text"/></p>
                    <input type="submit" value="Добавить">
                </form>
            </div>
        </div>
    </div>
</body>
</html>