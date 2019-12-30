<?php
session_start();
require_once '../../DB/admin_info.php'; // подключаем скрипт

?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет - Администратора.</title>
    <? include '../../page/header.php' ?>

</head>
<body>
<? include '../../admin/admin_menu.php' ?>
<?php user_detail_info(); ?>

<div class="col-sm-8">
    <h3>Добавить нового пользователя</h3>

</div>
</div>
</div>
</div>
</body>
</html>