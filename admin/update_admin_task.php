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
    <h2>Изменить задание:</h2>
    <?php update_task(); ?>
    <?php $print = view_task_one($_GET['update']); ?>
    <form method="POST" class="needs-validation" novalidate>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationTooltip01">Тема задания</label>
                <input name="name_task" type="text" class="form-control" id="validationTooltip01"
                       placeholder="Тема задания" <?php echo "value=\"" . $print['name_task'] . "\""; ?> required>

            </div>
            <div class="col-md-4 mb-3">
                <label for="validationTooltip02">Проект</label>
                <select name="select_project" class="form-control">
                    <?php form_select_project(); ?>
                </select>

            </div>
            <div class="col-md-4 mb-3">
                <label for="validationTooltip02">Выбор приоритета:</label>

                <select name="select_priority" class="form-control">
                    <?php form_select_priority(); ?>
                </select>


            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationTooltip02">Разработчики:</label>

                <select name="select_developer" class="form-control">
                    <?php form_select_developer(); ?>
                </select>


            </div>
            <div class="col-md-4 mb-3">
                <label for="validationTooltip02">Статус:</label>

                <select name="select_status" class="form-control">
                    <?php form_select_status(); ?>
                </select>


            </div>
            <div class="col-md-8 mb-6">
                <label for="validationTextarea">Текст задания</label>
                <textarea name="text_task" class="form-control is-invalid" id="validationTextarea"
                          placeholder="Required example textarea" required><?php echo $print['text']; ?></textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label for="inputDate">Введите дату завершения задания:</label>
                <input name="date_end" type="date" class="form-control" value="<?php echo $print['date_end']; ?>">
            </div>
            <div class="col-md-6 mb-3">
                <label for="inputDate">Время потраченное на задание в минутах:</label>
                <input name="time_spent" type="text" class="form-control" value="<?php echo $print['time_spent']; ?>">
            </div>

            <div class="col-md-12">
                <button name="submit" class="btn btn-primary" type="submit">Внести изменения</button>
            </div>
    </form>


</div>
</div>
</div>
</div>
</body>
</html>