<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Личный кабинет</title>
    <?php
    include "page/header.php"
    ?>
</head>
<body>
<div class="container w color-services">
    <div class="row centered">
        <div class="left_panel">
            <?php
            include "admin/admin_nav.php"
            ?>
        </div>

        <div class="right_panel">
            <div class="header_info"></div>
            <div class="news_info"></div>
            <div class="service_info"></div>
            <div class="price_info"></div>
            <div class="mail_info"></div>
            <div class="request"></div>
        </div>
    </div>
</body>
</html>