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
    <title>Баланс</title>
    <? include '../page/header.php' ?>


</head>
<body>
<? include '../page/menu.php' ?>
<div class="col-sm-8">
    <h3>Баланс</h3>
    <div class="row">
        <div class="col-sm-4 btn btn-outline-success"><a href="balance.php?items=pay">Пополнить счет</a></div>
        <div class="col-sm-4 btn btn-outline-success"><a href="balance.php?items=history_balance">Движения по счету</a></div>
        <div class="col-sm-4 btn btn-outline-success"><a href="services.php">Управление услугами</a></div>
    </div>
    <div class="row">
        <?php update_password();
        if (!empty($_GET["items"])) {
            if ($_GET["items"] == "pay") {
                settings_user_info();
            echo "<h3 class='text-center'>Оплата через банк</h3>
<p>Время прохождения платежа 3-5 банковских (рабочих) дней;</p>
<p>Все платежи обрабатываются после фактического поступления денег;</p>
<p>Для ускорения проведения платежа Вы можете отправить скан квитанции на contact@mail.ru</p>
<label for=\"staticEmail\" class=\"col-sm-3 col-form-label\">Организация</label>
    <div class=\"col-sm-10\">
      <input type=\"text\"  class=\"form-control-plaintext\" id=\"staticEmail\"  value=" .$settings_user_info_func['name_org']."     >
    </div>
    <label for=\"staticEmail\" class=\"col-sm-3 col-form-label\">ИНН</label>
    <div class=\"col-sm-10\">
      <input type=\"text\"  class=\"form-control-plaintext\" id=\"staticEmail\" value=" .$settings_user_info_func['inn'].">
    </div>
    <label for=\"staticEmail\" class=\"col-sm-3 col-form-label\">КПП</label>
    <div class=\"col-sm-10\">
      <input type=\"text\"  class=\"form-control-plaintext\" id=\"staticEmail\" value=" .$settings_user_info_func['kpp'].">
    </div>
    <label for=\"staticEmail\" class=\"col-sm-3 col-form-label\">Юридический адрес</label>
    <div class=\"col-sm-10\">
      <input type=\"text\"  class=\"form-control-plaintext\" id=\"staticEmail\" value=" .$settings_user_info_func['addressLegal'].">
    </div>
    <label for=\"staticEmail\" class=\"col-sm-3 col-form-label\">Телефон</label>
    <div class=\"col-sm-10\">
      <input type=\"text\"  class=\"form-control-plaintext\" id=\"staticEmail\" value=" .$settings_user_info_func['phone'].">
    </div>
    <label for=\"staticEmail\" class=\"col-sm-3 col-form-label\">Email</label>
    <div class=\"col-sm-10\">
      <input type=\"text\"  class=\"form-control-plaintext\" id=\"staticEmail\" value=" .$settings_user_info_func['mail'].">
    </div>
    <label for=\"staticEmail\" class=\"col-sm-3 col-form-label\">Итого к оплате(руб.)</label>
    <div class=\"col-sm-10\">
      <input type=\"text\"  class=\"form-control-plaintext\" id=\"staticEmail\" value=" .$balance_user['summa_service'].">
    </div>
    <p>Внимание счет будет отправлен на указаный email: <a href='mailto:" .$settings_user_info_func['mail']."'>" .$settings_user_info_func['mail']."</a></p>
    <button type=\"button\" class=\"btn btn-primary\">Получить счет</button>";
            }
        if ($_GET["items"] == "history_balance") {
            account_movements();




        }
        } ?>

    </div>
</div>
</div>
</div>
</body>
</html>