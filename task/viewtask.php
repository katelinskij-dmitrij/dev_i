<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Просмотр задач</title><?php
    include "../page/header.php"
    ?></head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-4 ">
            <h3>Задания</h3>
            <?php


            // подключаемся к серверу

            require_once '../DB/connection.php'; // подключаем скрипт

            // подключаемся к серверу
            $link = mysqli_connect($localhost, $username, $password, $database)
            or die("Ошибка " . mysqli_error($link));
            if ($link) {
                echo "Подключение успешно!";
            }


            // создание строки запроса

            $sql = "SELECT * FROM `task`";
            // выполняем запрос
            $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
            if ($result) {
                $rows = mysqli_num_rows($result); // количество полученных строк


                while ($row = mysqli_fetch_row($result)) {
                    $id = $row[0];
                    $name = $row[1];
                    $project = $row[2];
                    $customer = $row[3];
                    $site = $row[4];
                    $priority = $row[5];
                    $developer = $row[6];
                    $status = $row[10];
                    $text = $row[11];

                    echo "
            
        <div class=\"border_task\">
            <div class=\"name_task_left\"> Название задания: $name </div>
            <div class=\"project_task_left\">Название проекта: $project</div>
            <div class=\"status_task_left\"> Статус задания: $status</div>
            <a href=\"viewtask.php?id=$id\">Перейти к задаче:</a>
        </div>
            ";

                }


//        echo "<table><tr><th>Id</th><th>Модель</th><th>Производитель</th></tr>";
//        for ($i = 0; $i < $rows; ++$i) {
//            $row = mysqli_fetch_row($result);
//            echo "<tr>";
//            for ($j = 0; $j < 3; ++$j) echo "<td>$row[$j]</td>";
//            echo "</tr>";
//        }
//        echo "</table>";

                // очищаем результат
                mysqli_free_result($result);
            }

            // закрываем подключение
            mysqli_close($link);

            ?>
        </div>
        <div class="col-sm-8 ">
            <h3>Детальная информация</h3>
            <?php
            $link = mysqli_connect($localhost, $username, $password, $database)
            or die("Ошибка " . mysqli_error($link));
            if ($link) {
                echo "Подключение успешно!";
            }


            if (!empty($_GET["id"])) {
                $id_detail = $_GET["id"];

                $detailtask = "SELECT * FROM `task` WHERE id_task = $id_detail";
                $statustask = "SELECT * FROM `status_task` WHERE id_status = $status";
                $projecttask = "SELECT * FROM `Project` WHERE project_id = $project";
                $developertask = "SELECT * FROM `developer` WHERE id_developer = $developer";
                $prioritytask = "SELECT * FROM `priority` WHERE id_priority = $priority";
                $result_statustask = mysqli_query($link, $statustask) or die("Ошибка " . mysqli_error($link));
                $result_projecttask = mysqli_query($link, $projecttask) or die("Ошибка " . mysqli_error($link));
                $result_developertask = mysqli_query($link, $developertask) or die("Ошибка " . mysqli_error($link));
                $result_prioritytask = mysqli_query($link, $prioritytask) or die("Ошибка " . mysqli_error($link));
                $result_detail_task = mysqli_query($link, $detailtask) or die("Ошибка " . mysqli_error($link));


                if ($result_statustask) {
                    while ($row_statustask = mysqli_fetch_row($result_statustask)) {
                       $statusend =  $row_statustask[1];
                    }
                }

                if ($result_projecttask) {
                    while ($row_projecttask = mysqli_fetch_row($result_projecttask)) {

                        $projecttaskend =  $row_projecttask[1];

                    }
                }
                if ($result_developertask) {
                    while ($row_developertask = mysqli_fetch_row($result_developertask)) {
                        $developer_name_taskend =  $row_developertask[1];
                        $developer_surname_taskend =  $row_developertask[2];
                    }
                }
                if ($result_prioritytask) {
                    while ($row_prioritytask = mysqli_fetch_row($result_prioritytask)) {
                        $prioritytasksend =  $row_prioritytask[1];
                        echo "$row_prioritytask[1]";
                    }
                }
                if ($result_detail_task) {
                    while ($row_detail_task = mysqli_fetch_row($result_detail_task)) {

                        $id = $row_detail_task[0];
                        $name = $row_detail_task[1];
                        $project = $row_detail_task[2];
                        $customer = $row_detail_task[3];
                        $site = $row_detail_task[4];
                        $priority = $row_detail_task[5];
                        $developer = $row_detail_task[6];
                        $status = $row_detail_task[10];
                        $text = $row_detail_task[11];
                        echo "<div class=\"border_task\">
<div class=\"name_task\">Название таска: $name</div>
            <div class=\"project_task\">Проект: $projecttaskend</div>
            <div class=\"customer_task\">Заказчик: $customerend</div>
            <div class=\"site_task\">Ссылка на сайт: $site</div>
            <div class=\"priority_task\">Приоритет: $prioritytasksend</div>
            <div class=\"developer_task\">Разработчик:  $developer_name_taskend $developer_surname_taskend</div>
            <div class=\"date_start_task\">Дата создания задачи: </div>
            <div class=\"date_end_task\">Дата завершения задачи: </div>
            <div class=\"status_task\">Статус задачи: $statusend</div>
            <div class=\"text_task\">Информация: $text</div>
                        </div>";
                    }
                }


            } else {
                echo "Переменные не дошли. Проверьте все еще раз.";
            }
            // закрываем подключение
            mysqli_close($link);
            ?>


        </div>
    </div>
</div>
</body>
</html>