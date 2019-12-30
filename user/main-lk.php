<?php
session_start();
require_once '../DB/connection.php'; // подключаем скрипт
require_once '../DB/users_info.php'; // подключаем скрипт

check_authorization();
// подключаемся к серверу
balance();
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

    <?php if ($_SESSION["balance"] < 400) {
        echo "<h3>На Вашем счету осталось мало средств</h3>
    <p>Чтобы пополнить баланс Вашего аккаунта, пожалуйста, перейдите в <a href='balance.php?items=pay'>раздел оплата</a></p>
    <p>Если у Вас нет возможности пополнить счет в данный момент, то Вы можете воспользоваться обещанным платежом</p>
    ";
    }
    ?>


    <nav style="margin: 10px">
        <div  class="row">
            <div class="col-sm-4 menu-tile btn btn-light">
                <a href="site.php">
                    <div class="tile__image"><img src="../img/main_lk/sites.png" alt="Сайты"></div>
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

                <div class="tile__image"><img src="../img/main_lk/service.png" alt="Сервисы"></div>
                <div class="tile__content">
                    <div class="tile__title-box  "><span class="tile__main-title">Сервисы</span></div>
                </div>
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
                <a class="tile" href="balance.php?items=pay">
                    <div class="tile__image"><img src="../img/main_lk/pay.png" alt="Оплата"></div>
                    <div class="tile__content">
                        <div class="tile__title-box  "><span class="tile__main-title">Оплата</span></div>
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

</body>
</html>