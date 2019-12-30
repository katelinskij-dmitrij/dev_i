<?php
session_start();
require_once '../DB/connection.php'; // подключаем скрипт
require_once '../DB/admin_info.php'; // подключаем скрипт

?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет - Администратора.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/bootstrap.css">

</head>
<body>
<? include '../admin/admin_menu.php' ?>
<div class="col-sm-8">


</div>
<div class="col-sm-8">
    <h2>Добавить новое задание:</h2>
    <?php add_task_admin(); ?>

    <form method="POST">
        <p>Введите тему задания:<br>
            <input type="text" name="name_task"/></p>
        <p>Выбор проекта: <br>
            <select name="select_project" class="form-control">
                <?php form_select_project(); ?>
            </select>
        <p>Выбор приоритета: <br>
            <select name="select_priority" class="form-control">
                <?php form_select_priority(); ?>
            </select>
        <p>Выбор разработчика: <br>
            <select name="select_developer" class="form-control">
                <?php form_select_developer(); ?>
            </select>
        <p>Текст задания: <br>
            <textarea name="text_task" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea></p>

        <input name="submit" type="submit" value="Добавить">
    </form>
</div>
</div>
</div>
</div>
</body>
</html>