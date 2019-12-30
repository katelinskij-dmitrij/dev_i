<?php
session_start();
require_once '../DB/connection.php'; // подключаем скрипт
require_once '../DB/users_info.php'; // подключаем скрипт

check_authorization();
// подключаемся к серверу


balance();
money_write_off()
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет.</title>
    <? include '../page/header.php' ?>

</head>
<body>
<? include '../page/menu.php' ?>

<div class="col-sm-8">
    <h2>Сайты</h2>
    <div class="row">
        <?php main_service_tariff(); ?>
    </div>


</div>
</div>
</div>
</body>
</html>