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
    <div class="row">
        <h3>Информация о пользователях</h3>
        <?php info_money_user();?>

</div>
</div>
</div>
</body>
</html>