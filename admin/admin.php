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
    <? include '../page/header.php' ?>

</head>
<body>
<? include '../admin/admin_menu.php' ?>

<nav style="margin: 10px">
    <div class="row">
        <div class="col-sm-4 menu-tile btn btn-light">
            <a href="project.php">
                <div class="tile__image"><img src="../img/main_lk/sites.png" alt="Проекты"></div>
                <div class="tile__content">
                    <div class="tile__title-box  "><span class="tile__main-title">Проекты</span></div>
                </div>
            </a>
        </div>

        <div class="col-sm-4 menu-tile btn btn-light">

            <div class="tile__image"><img src="../img/main_lk/cloudservices.png" alt="Статистика"></div>
            <div class="tile__content">
                <div class="tile__title-box  "><span class="tile__main-title">Статистика</span></div>
            </div>
        </div>

        <div class="col-sm-4 menu-tile btn btn-light">
            <a href="clients.php">
                <div class="tile__image"><img src="../img/main_lk/service.png" alt="Клиенты"></div>
                <div class="tile__content">
                    <div class="tile__title-box  "><span class="tile__main-title">Клиенты</span></div>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 menu-tile btn btn-light">
            <a class="tile">
                <div class="tile__image"><img src="../img/main_lk/crontab.png" alt="Отложенные задания"></div>
                <div class="tile__content">
                    <div class="tile__title-box  "><span class="tile__main-title">Отложенные задания</span>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-sm-4 menu-tile btn btn-light">
            <a class="tile">
                <div class="tile__image"><img src="../img/main_lk/feedback.png" alt="Почта"></div>
                <div class="tile__content">
                    <div class="tile__title-box  "><span class="tile__main-title">Почта</span></div>
                </div>
            </a>
        </div>
        <div class="col-sm-4 menu-tile btn btn-light">
            <a class="tile">
                <div class="tile__image"><img src="../img/main_lk/support.png" alt="Обратная связь"></div>
                <div class="tile__content">
                    <div class="tile__title-box  "><span class="tile__main-title">Обратная связь</span></div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">

        <div class="col-sm-4 menu-tile btn btn-light">
            <a class="tile" href="money.php">
                <div class="tile__image"><img src="../img/main_lk/pay.png" alt="Финансы"></div>
                <div class="tile__content">
                    <div class="tile__title-box  "><span class="tile__main-title">Финансы</span></div>
                </div>
            </a>

        </div>
        <div class="col-sm-4 menu-tile btn btn-light">
            <a class="tile" href="services.php">
                <div class="tile__image"><img src="../img/main_lk/services.png" alt="Управление услугами"></div>
                <div class="tile__content">
                    <div class="tile__title-box  "><span class="tile__main-title">Управление услугами</span>
                    </div>
                </div>
            </a>

        </div>
        <div class="col-sm-4 menu-tile btn btn-light">
            <a class="tile" href="settings.php?items=info">
                <div class="tile__image"><img src="../img/main_lk/settings.png" alt="Настройка аккаунта"></div>
                <div class="tile__content">
                    <div class="tile__title-box  "><span class="tile__main-title">Настройка аккаунта</span>
                    </div>
                </div>
            </a>

        </div>

    </div>
</nav>
</div>
</div>
</div>
</body>
</html>