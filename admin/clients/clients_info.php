<?php
session_start();
require_once '../../DB/admin_info.php'; // подключаем скрипт
user_detail_info();
add_balance()
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

<div class="col-sm-8">
    <h3>Информация о пользователе "<? $project_func = mysqli_fetch_assoc($query_myfunc);
        echo $project_func['login']; ?>"</h3>
    <div class="row">
        <div class="col-sm-4"><a>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Прикрепить фирму
                </button>
            </a></div>
        <div class="col-sm-8">
            <form method="post">
            <input value="<?php echo  $firm_balance['balance']; ?>" name="add_balance" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Баланс">
            <button name="add_balance_submit" type="submit" class="btn btn-primary" >
                Добавить к счету
            </button>
            </form>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-6"
        <label for=\"exampleFormControlTextarea1\">Дата регистрации пользователя:</label>
        <input class=\"form-control\" type=\"text\" placeholder="<?php echo $project_func['date_reg_user']; ?>"
               readonly>
    </div>
    <div class="col-sm-6">
        <label>Прикрепленные фирмы:</label>
        <div>
            <div class="list-group">
                <?php mysqli_data_seek($query_myfunc, 0);
                while ($project_func = mysqli_fetch_assoc($query_myfunc)) {
                    echo "<a href=?clients=" . $_GET['clients'] . "&firm_id=" . $project_func['firm_id'] . " class=\"list-group-item list-group-item-action\">" . $project_func['name_org'] . "</a>";
                } ?>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-sm-12">
        <h3>Информация об организации:</h3>
        <?php firm_detail_info(); ?>
        <ul class=" list-group list-group-flush">
            <li class="list-group-item">Название организации: <b><?php echo $firm_detail_info['name_org'] ?></b></li>
            <li class="list-group-item">ИНН : <b><?php echo $firm_detail_info['inn'] ?></b></li>
            <li class="list-group-item">КПП : <b><?php echo $firm_detail_info['kpp'] ?></b></li>
            <li class="list-group-item">БИК : <b><?php echo $firm_detail_info['bik'] ?></b></li>
            <li class="list-group-item">Юридический адрес : <b><?php echo $firm_detail_info['addressLegal'] ?></b></li>
            <li class="list-group-item">Фактический адрес : <b><?php echo $firm_detail_info['actualAddress'] ?></b></li>
            <li class="list-group-item">Почтовый адрес : <b><?php echo $firm_detail_info['mailAddress'] ?></b></li>
            <li class="list-group-item">Директор : <b><?php echo $firm_detail_info['boss'] ?></b></li>
            <li class="list-group-item">Email : <b><?php echo $firm_detail_info['mail'] ?></b></li>
            <li class="list-group-item">Баланс : <b><?php echo $firm_detail_info['balance'] ?></b></li>
            <li class="list-group-item">Дата заключения договора :
                <b><?php echo $firm_detail_info['date_reg_firm'] ?></b></li>

        </ul>
        <div class="col-sm-4"><a>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1">
                    Добавить проект
                </button>
            </a></div>
    </div>
</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Привязка фирмы к
                    поользователю <?php echo $project_func['name_org']; ?> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php add_firm(); ?>
            <div class="modal-body">
                <form method="post">
                    <label for="exampleFormControlSelect2">Название Фирмы</label>
                    <input name="name_firm" class="form-control" type="text" placeholder="Название фирмы">
                    <label for="exampleFormControlSelect2">Email</label>
                    <input name="email" class="form-control" type="text" placeholder="Email">
                    <button name="submit_add_firm" type="submit" class="btn btn-primary">Добавить</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Создать фирме новый проект </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php add_firm_project(); ?>
            <div class="modal-body">
                <form method="post">
                    <label for="exampleFormControlSelect2">Название Проекта</label>
                    <input name="name_project" class="form-control" type="text" placeholder="Название фирмы">
                    <label for="exampleFormControlSelect2">web-address</label>
                    <input name="web-address" class="form-control" type="text" placeholder="Адрес сайта">
                    <label for="exampleFormControlSelect2">Информация о проекте</label>
                    <input name="info_project" class="form-control" type="text" placeholder="Инфо">
                    <button name="submit_add_firm_project" type="submit" class="btn btn-primary">Добавить</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>