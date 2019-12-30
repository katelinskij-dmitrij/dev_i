<?php
session_start();
require_once '../DB/connection.php'; // подключаем скрипт
require_once '../DB/users_info.php'; // подключаем скрипт
check_authorization();
balance()

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Настройки</title>
    <? include '../page/header.php' ?>

</head>
<body>
<? include '../page/menu.php' ?>
<div class="col-sm-8">
    <h3>Настройка аккаунта</h3>
    <div class="row">
        <div class="col-sm-3"><a href="settings.php?items=info">Общая информация</a></div>
        <div class="col-sm-2"><a href="settings.php?items=pass">Смена пароля</a></div>
        <div class="col-sm-2"><a href="settings.php?items=info_org"">Данные организации</a></div>
        <div class="col-sm-3"><a href="settings.php?items=info_contract">Данные для договора</a></div>

    </div>
    <div class="row">

        <?php
        if (!empty($_GET["items"])) {
            if ($_GET["items"] == "info") {


                echo "<div><h2>" . $data_info_user['boss'] . "</h2></div>
                        <p>Для изменения данных владельца аккаунта Вам необходимо выслать официальный запрос на изменение данных от руководителя организации или доверенного лица.</p>
                        <div class=\"col-sm-6\"><h3>Телефон:
                        " . $data_info_user['phone'] . "
                        </h3><a>Изменить</a></div>
                        <div class=\"col-sm-6\"><h3>Email: " . $data_info_user['mail'] . "</h3><a>Добавить</a></div>";
            }
            if ($_GET["items"] == "pass") {
                update_password();
                echo "<form method=\"POST\">
                    
                        Старый пароль <input name=\"old_password\" type=\"password\" required><br>
                        Новый пароль <input name=\"new_password_1\" type=\"password\" required><br>
                        Подтверждение <input name=\"new_password_2\" type=\"password\" required><br>
                     
                    
    <input  name=\"submit\" type=\"submit\" value=\"Изменить пароль\"></form>";


            }

            if ($_GET["items"] == "info_org") {
                settings_user_info();
                echo "<form>
  <div class=\"form-group row\">
    <label for=\"staticEmail\" class=\"col-sm-3 col-form-label\">Организация</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" readonly class=\"form-control-plaintext\" id=\"staticEmail\"  value=" . $settings_user_info_func['name_org'] . "     >
    </div>
    <label for=\"staticEmail\" class=\"col-sm-3 col-form-label\">ИНН</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" readonly class=\"form-control-plaintext\" id=\"staticEmail\" value=" . $settings_user_info_func['inn'] . ">
    </div>
    <label for=\"staticEmail\" class=\"col-sm-3 col-form-label\">КПП</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" readonly class=\"form-control-plaintext\" id=\"staticEmail\" value=" . $settings_user_info_func['kpp'] . ">
    </div>
     <label for=\"staticEmail\" class=\"col-sm-3 col-form-label\">БИК</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" readonly class=\"form-control-plaintext\" id=\"staticEmail\"  value=" . $settings_user_info_func['bik'] . "     >
    </div>
    <label for=\"staticEmail\" class=\"col-sm-3 col-form-label\">Юридический адрес</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" readonly class=\"form-control-plaintext\" id=\"staticEmail\" value=" . $settings_user_info_func['addressLegal'] . ">
    </div>
    <label for=\"staticEmail\" class=\"col-sm-3 col-form-label\">Фактический адрес</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" readonly class=\"form-control-plaintext\" id=\"staticEmail\" value=" . $settings_user_info_func['actualAddress'] . ">
    </div>
    <label for=\"staticEmail\" class=\"col-sm-3 col-form-label\">Почтовый адрес</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" readonly class=\"form-control-plaintext\" id=\"staticEmail\" value=" . $settings_user_info_func['mailAddress'] . ">
    </div>
    <label for=\"staticEmail\" class=\"col-sm-3 col-form-label\">Директор</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" readonly class=\"form-control-plaintext\" id=\"staticEmail\" value=" . $settings_user_info_func['boss'] . ">
    </div>
    <label for=\"staticEmail\" class=\"col-sm-3 col-form-label\">Телефон</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" readonly class=\"form-control-plaintext\" id=\"staticEmail\" value=" . $settings_user_info_func['phone'] . ">
    </div>
    <label for=\"staticEmail\" class=\"col-sm-3 col-form-label\">Email</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" readonly class=\"form-control-plaintext\" id=\"staticEmail\" value=" . $settings_user_info_func['mail'] . ">
    </div>
    
    </div>
    </form>";
            }
            if ($_GET["items"] == "info_contract") {
                echo "<h3>Данные для договора</h3>
            <label for=\"staticEmail\" class=\"col-sm-12 col-form-label\">В лице кого заключается договор и на основании чего, в родительном падеже. Подставляется в преамбулу договора.</label>
    <div class=\"col-sm-3\">
      <input type=\"text\"  class=\"form-control-plaintext\" id=\"staticEmail\">
    </div>
    <label for=\"staticEmail\" class=\"col-sm-12 col-form-label\">Укажите должность, того, кто подписывает договор. Подставляется в договор, в места подписания.</label>
    <div class=\"col-sm-3\">
      <input type=\"text\"  class=\"form-control-plaintext\" id=\"staticEmail\">
    </div>
    <label for=\"staticEmail\" class=\"col-sm-12 col-form-label\">Укажите ФИО лица, который подписывает договор. Подставляется в договор, в места подписания.</label>
    <div class=\"col-sm-3\">
      <input type=\"text\"  class=\"form-control-plaintext\" id=\"staticEmail\">
    </div>
    
    <div class=\"col-sm-3\">
    <button class=\"col-sm-8\"  type=\"button\" class=\"btn btn - primary\">Сохранить</button>
    </div>
            ";


            }

        }
        ?>

    </div>
</div>
</div>
</div>
</body>
</html>