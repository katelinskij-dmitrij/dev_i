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
<div class="col-sm-8">
    <div class="row">
        <div class="col-4">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Просмотр проектов</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Добавить проект</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
            </div>
        </div>
        <div class="col-8">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list"><div class="list-group">
                        <?php project_view(); ?>
                    </div></div>
                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list"><h3>Добавить проект</h3>
                    <?php add_project(); ?>
                    <form method="POST">
                        <p>Введите название проекта<br>
                            <input type="text" name="name_project"/></p>
                        <p>Введите web адрес<br>
                            <input type="text" name="web_address"/></p>
                        <p>Выбор фирмы: <br>
                            <select name="select_firm_user" class="form-control">
                                <?php select_firm_user(); ?>
                            </select>
                            <input name="submit" type="submit" value="Добавить">
                    </form></div>
                <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
                <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-sm-12">
        <ul class="list-group">
            <li class="list-group-item">Название <?php echo $firm_detail_info['name_project'];?></li>
            <li class="list-group-item">Адрес <?php echo"<a href=".$firm_detail_info['web_address'].">". $firm_detail_info['web_address']."</a>";?></li>
            <li class="list-group-item">Дата создания <?php echo $firm_detail_info['date_new'];?></li>
            <li class="list-group-item">Организация <?php echo $firm_detail_info['name_org'];?></li>
            <li class="list-group-item">Заказано услуг на: <?php echo $firm_detail_info['summa_service'];?> рублей</li>
            <li class="list-group-item">Сопровождение: <?php echo $firm_detail_info['bal_support'];?> рублей</li>
            <li class="list-group-item">SEO: <?php echo $firm_detail_info['bal_seo'];?> рублей</li>
            <li class="list-group-item">Реклама YANDEX: <?php echo $firm_detail_info['bal_yandex'];?> рублей</li>
            <li class="list-group-item">Реклама GOOGLE: <?php echo $firm_detail_info['summa_service'];?> рублей</li>

        </ul>
    </div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>