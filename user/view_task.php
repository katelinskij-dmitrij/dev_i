<?php
session_start();
require_once '../DB/connection.php'; // подключаем скрипт
require_once '../DB/users_info.php'; // подключаем скрипт
check_authorization();
balance();


?>
<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Просмотр заданий</title>
    <? include '../page/header.php' ?>


</head>
<body>
<? include '../page/menu.php' ?>
<div class="col-sm-8">
<h3>Мои созданые задания:</h3>
<?php view_task(); ?>


</div>
</div>
</div>
</div>
</body>
</html>