<?php
session_start();
require_once '../DB/connection.php'; // подключаем скрипт
require_once '../DB/users_info.php'; // подключаем скрипт
check_authorization();
balance();
add_task_user();

?>
<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Добавить задание.</title>
    <? include '../page/header.php' ?>


</head>
<body>
<? include '../page/menu.php' ?>
<div class="col-sm-8">

    <h2>Добавить новое задание</h2>

    <form method="POST">
        <p>Введите тему задания:<br>
            <input type="text" name="name_task"/></p>
        <p>Выбор сайта: <br>
            <select name="select" class="form-control">
                <?php form_select_site(); ?>
            </select>
        <p>Текст задания: <br>
            <textarea name="text_task" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea></p>

        <input name="submit_task" type="submit" value="Добавить">
    </form>

</div>
</div>
</div>
</div>
</body>
</html>