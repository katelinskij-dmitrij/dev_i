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

    <div class="row">
        <div class="col-sm-3">Кондор</div>
        <div class="col-sm-3">Баланс</div>
        <div class="col-sm-3">Пользователь</div>
        <div class="col-sm-3">Кондор</div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label for="validationTooltip02">Задания:</label>

            <select name="select_tariffs" class="form-control">
                <?php form_select_tariffs(); ?>
            </select></div>
        <div class="col-sm-4">
            <label for="validationTooltip02">Подключенные услуги:</label>

            <select name="select_tariffs" class="form-control">
                <?php form_select_tariffs(); ?>
            </select>
        </div>
        <div class="col-sm-3">Пользователь</div>

    </div>


</div>
<div class="col-sm-8">
    <div class="row">
        <?php developer_org(); ?>
    </div>

</div>
</div>
</div>
</div>
</body>
</html>