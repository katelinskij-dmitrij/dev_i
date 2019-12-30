<?php
session_start();
require_once 'connection.php'; // подключаем скрипт
function view_task_one($id_task)
{
    global $link;
    $query_myfunc = mysqli_query($link, "SELECT t.* ,p.name_project  FROM task t JOIN project p  ON t.project = p.project_id JOIN status_task s  ON s.id_status = t.status WHERE t.id_task ='" . $id_task . "'") or die("Ошибка " . mysqli_error($link));
    $project_func1 = mysqli_fetch_assoc($query_myfunc);
    return $project_func1;


}

money();
function view_task()
{
    global $link;

    $query_myfunc = mysqli_query($link, "SELECT t.* ,p.name_project  FROM task t JOIN project p  ON t.project = p.project_id JOIN status_task s  ON s.id_status = t.status WHERE 1 ORDER BY t.id_task DESC") or die("Ошибка " . mysqli_error($link));

    while ($project_func = mysqli_fetch_assoc($query_myfunc)) {
        echo "<form name='task_view'> <div class=\"col-12\">

        <h3>Тема задания: " . $project_func['name_task'] . " </h3>
        <h3>Проект:" . $project_func['name_project'] . "</h3>
        <p>Текст задания:" . $project_func['text'] . "</p>
        <p>Текущий статус:" . $project_func['name_status'] . "</p>
        <p>Дата создания задания:" . $project_func['date_start'] . "</p>
        <p>Дата завершения задания:" . $project_func['date_end'] . "</p>
        <p>Время потраченное на задание:" . $project_func['time_spent'] . "</p>
        <a target=\"_blank\" href=../admin/update_admin_task.php?update=" . $project_func['id_task'] . "> <button  type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModalCenter\">
        Изменить
    </button></a>
    <a href='../js/delete_task.php?delete=" . $project_func['id_task'] . "'><button id='delete_task_admin' type=\"button\" class=\"btn btn-primary\">
        Удалить
    </button></a>
    </div>
    </form>";


    }

}

function delete_task()
{
    global $link;

    mysqli_query($link, "DELETE  FROM task WHERE  task.id_task = '" . $_GET['delete'] . "'") or die("Ошибка " . mysqli_error($link));

}

function update_task()//Изменение таска
{
    global $link;
    if (isset($_POST['submit'])) {
        mysqli_query($link, "UPDATE task SET   status ='" . $_POST['select_status'] . "',project ='" . $_POST['select_project'] . "' ,priority ='" . $_POST['select_priority'] . "', developer='" . $_POST['select_developer'] . "',text='" . $_POST['text_task'] . "',name_task='" . $_POST['name_task'] . "', date_end = '" . $_POST['date_end'] . "', time_spent = '" . $_POST['time_spent'] . "' WHERE id_task = '" . $_GET['update'] . "'") or die("Ошибка " . mysqli_error($link));

    }
}



function form_select_project()
{
    global $link;
    $query_myfunc = mysqli_query($link, "SELECT t.project, p.name_project, p.project_id FROM project p JOIN firmPerson f ON p.firm_id=f.firm_id JOIN task t  WHERE 1") or die("Ошибка " . mysqli_error($link));
    while ($project_func = mysqli_fetch_assoc($query_myfunc)) {
        if ($project_func['project'] == $project_func['project_id']) {
            echo "<option selected value= " . $project_func['project_id'] . ">" . $project_func['name_project'] . "</option>";
        } else {
            echo "<option  value= " . $project_func['project_id'] . ">" . $project_func['name_project'] . "</option>";
        }

    }
}

function form_select_priority()
{
    global $link;
    $query_myfunc = mysqli_query($link, "SELECT  pr.id_priority , pr.name FROM priority pr   WHERE 1") or die("Ошибка " . mysqli_error($link));
    while ($project_func = mysqli_fetch_assoc($query_myfunc)) {
        echo "<option selected value=" . $project_func['id_priority'] . ">" . $project_func['name'] . "</option>";

    }
}

function form_select_developer()
{
    global $link;
    $query_myfunc = mysqli_query($link, "SELECT  d.id_developer , d.name, d.surname FROM developer d   WHERE 1") or die("Ошибка " . mysqli_error($link));
    while ($project_func = mysqli_fetch_assoc($query_myfunc)) {
        echo "<option selected value=" . $project_func['id_developer'] . ">" . $project_func['name'] . $project_func['surname'] . "</option>";

    }
}

function form_select_status()
{
    global $link;
    $query_myfunc = mysqli_query($link, "SELECT  s.id_status , s.name_status, t.status  FROM status_task s JOIN task t WHERE 1") or die("Ошибка " . mysqli_error($link));
    while ($project_func = mysqli_fetch_assoc($query_myfunc)) {
        if ($project_func['status'] == $project_func['id_status']) {
            echo "<option selected value= " . $project_func['id_status'] . ">" . $project_func['name_status'] . "</option>";
        } else {
            echo "<option  value= " . $project_func['id_status'] . ">" . $project_func['name_status'] . "</option>";
        }

    }
}

function add_task_admin()
{
    global $link;

    if (isset($_POST['submit'])) {
        var_dump($_POST['select_project']);
        $query_myfunc = mysqli_query($link, "SELECT task.project FROM task WHERE task.project='" . $_POST['select_project'] . "'") or die("Ошибка " . mysqli_error($link));
        $project_func = mysqli_fetch_assoc($query_myfunc);
        var_dump($project_func);

        mysqli_query($link, "INSERT INTO task SET status = 3,date_start='" . $datetime1 = strtotime(date("Y-m-d")) . "' ,project ='" . $_POST['select_project'] . "' ,priority ='" . $_POST['select_priority'] . "', developer='" . $_POST['select_developer'] . "',text='" . $_POST['text_task'] . "',name_task='" . $_POST['name_task'] . "'") or die("Ошибка " . mysqli_error($link));
//        header('Location: #');
    }
}

function users_view()
{
    global $link;
    $query_myfunc = mysqli_query($link, "SELECT  u.login, u.user_id, f.name_org FROM users u JOIN FirmPerson f ON u.user_info= f.firm_id   WHERE 1 ") or die("Ошибка " . mysqli_error($link));
//    echo "<ul class=\"list-group\">";
    while ($project_func = mysqli_fetch_assoc($query_myfunc)) {
        echo "
  <a href=\"?user=" . $project_func['user_id'] . "\" class=\"list-group-item list-group-item-action\">" . $project_func['name_org'] . "</a>
";

    }
//    echo "</ul>";
}

function developer_org()
{
    global $link;
    $query_myfunc = mysqli_query($link, "SELECT  f.firm_id, f.name_org, t.balance, t.summa_service  FROM FirmPerson f JOIN tariffs t ON t.id_tariff = f.balance   WHERE 1") or die("Ошибка " . mysqli_error($link));

    while ($project_func = mysqli_fetch_assoc($query_myfunc)) {
        echo "
    
        <div class=\"col-12\">
            <div class=\"col-sm-3\">" . $project_func['name_org'] . "</div>
            <div class=\"col-sm-3\">Сумма: " . $project_func['summa_service'] . "</div>
            <div class=\"col-sm-3\">" . $project_func['balance'] . "</div>
            <div class=\"col-sm-3\"><a href='?org=" . $project_func['firm_id'] . "'>Выбрать</a></div>
        </div>";
    }
}

function developer_org_detail()
{
    global $link;
    $query_myfunc = mysqli_query($link, "SELECT  f.firm_id, f.name_org, t.balance, t.summa_service  FROM FirmPerson f JOIN tariffs t ON t.id_tariff = f.balance   WHERE 1") or die("Ошибка " . mysqli_error($link));


}

function form_select_tariffs()
{
    global $link;
    $query_myfunc = mysqli_query($link, "SELECT  f.firm_id, f.name_org, t.balance, t.summa_service , t.bal_support ,t.bal_seo, t.bal_google, t.bal_yandex FROM FirmPerson f JOIN tariffs t ON t.id_tariff = f.balance   WHERE f.firm_id ='" . $_GET['org'] . "' ") or die("Ошибка " . mysqli_error($link));
    $project_func = mysqli_fetch_assoc($query_myfunc);
    echo "<option selected >Сопровождение - " . $project_func['bal_support'] . "</option>
        <option selected >SEO - продвижение - " . $project_func['bal_seo'] . "</option>
        <option selected >Реклама google - " . $project_func['bal_google'] . "</option>
        <option selected >Реклама Яндекс - " . $project_func['bal_yandex'] . "</option>";


}

function form_select_task()
{
    global $link;
    $query_myfunc = mysqli_query($link, "SELECT   FROM task t JOIN project p ON t.project = p.project_id   WHERE f.firm_id ='" . $_GET['org'] . "' ") or die("Ошибка " . mysqli_error($link));
    while ($project_func = mysqli_fetch_assoc($query_myfunc)) {
        echo "<option selected >" . $project_func['name_task'] . "</option>";
    }


}

function add_project()
{
    global $link;

    if (isset($_POST['submit'])) {
        mysqli_query($link, "INSERT INTO tariffs SET id_tariff='' ") or die("Ошибка " . mysqli_error($link));
        $maxid = 0;
        $query_id_user = mysqli_query($link, "SELECT MAX(id_tariff) FROM tariffs WHERE 1");
        $data_id_user = mysqli_fetch_assoc($query_id_user);
        $maxid = (array_pop($data_id_user));

        mysqli_query($link, "INSERT INTO project SET service_project='" . $maxid . "', date_new='" . strtotime(date("Y-m-d")) . "', firm_id='" . $_POST['select_firm_user'] . "', name_project='" . $_POST['name_project'] . "', web_address='" . $_POST['web_address'] . "' ") or die("Ошибка " . mysqli_error($link));

    }
}

function info_money_user()
{
    global $link;
    global $itog;
    $query_myfunc = mysqli_query($link, "SELECT t.*,p.name_project  FROM tariffs t JOIN project p ON t.id_tariff = p.service_project JOIN firmPerson f ON p.firm_id = f.firm_id JOIN users u ON u.user_id=f.user_id WHERE 1 ") or die("Ошибка " . mysqli_error($link));

    while ($project_func = mysqli_fetch_assoc($query_myfunc)) {
        $itog = $project_func['summa_service'] + $itog;
        echo "<div class='col-sm-4'> <ul><h2>" . $project_func['name_project'] . "</h2>
<li>Всего - " . $project_func['summa_service'] . " </li>
<li>Сопровождение - " . $project_func['bal_support'] . " </li>
        <li>SEO продвижение - " . $project_func['bal_seo'] . " </li>
        <li>Реклама гугл - " . $project_func['bal_google'] . " </li>
        <li>Реклама яндекс - " . $project_func['bal_yandex'] . " </li></ul></div>";
    }
    echo "</div><div class=\"row\"><h3>Финансовая информация</h3>
        <p>Ожидаемый доход</p>
       " . $itog . " рублей.

    </div>";


}

function info_money_admin()
{

    var_dump($itog);
}

function add_developer()
{

}

function add_user()
{

}

function users()
{
    global $link;
    $query_myfunc = mysqli_query($link, "SELECT  u.user_id, u.login, role FROM users u WHERE 1") or die("Ошибка " . mysqli_error($link));

    while ($project_func = mysqli_fetch_assoc($query_myfunc)) {
        echo "<a href=clients/clients_info.php?clients=" . $project_func['user_id'] . " class=\"list-group-item list-group-item-action \"> ID:  
            " . $project_func['user_id'] . " Login: " . $project_func['login'] . "
        </a>";
    }

}

function user_detail_info()
{

    global $query_myfunc;
    global $project_func;
    global $link;
    $query_myfunc = mysqli_query($link, "SELECT u.date_reg_user, u.user_id, u.login, u.role, f.firm_id, f.name_org FROM users u JOIN role r ON r.id_role = u.role JOIN firmPerson f ON f.user_id = u.user_id WHERE u.user_id = '" . $_GET["clients"] . "'") or die("Ошибка " . mysqli_error($link));

//    if ($result = $query_myfunc) {
//        while ($project_func = mysqli_fetch_assoc($query_myfunc)) {
//
//            echo "<br>";
//            print_r($project_func);
//            echo "<br>";
//
//        }
//
//    }
//    mysqli_data_seek($result, 0);
//    if ($result = $query_myfunc) {
//        while ($project_func = mysqli_fetch_assoc($query_myfunc)) {
//            echo "<br>";
//            print_r($project_func);
//            echo "<br>";
//
//        }
//
//    }


}

function add_firm()
{

    global $link;
    if (isset($_POST['submit_add_firm'])) {
        mysqli_query($link, "INSERT INTO firmPerson SET date_reg_firm = '" . $today = date("Y-m-d") . "' ,name_org = '" . $_POST['name_firm'] . "', user_id = '" . $_GET["clients"] . "', mail = '" . $_POST['email'] . "'")
        or die("Ошибка " . mysqli_error($link));
    }
    header("Refresh:0");
}

function add_firm_project()
{
    global $link;
    if (isset($_POST['submit_add_firm_project'])) {
        mysqli_query($link, "INSERT INTO tariffs SET id_tariff = NULL");
        $maxid = 0;
        $query_id_user = mysqli_query($link, "SELECT MAX(id_tariff) FROM tariffs WHERE 1");
        $data_id_user = mysqli_fetch_assoc($query_id_user);
        $maxid = (array_pop($data_id_user));
        var_dump($maxid);
        mysqli_query($link, "INSERT INTO project SET firm_id = '" . $_GET['firm_id'] . "' ,name_project = '" . $_POST['name_project'] . "', web_address = '" . $_POST["web-address"] . "', date_new = '" . $today = date("Y-m-d") . "', info = '" . $_POST['info_project'] . "',service_project	= '" . $maxid . "'")
        or die("Ошибка " . mysqli_error($link));
    }
}

function firm_detail_info()
{
    global $firm_detail_info;
    global $link;
    $query_myfunc = mysqli_query($link, "SELECT f.*  FROM firmPerson f WHERE f.firm_id = '" . $_GET["firm_id"] . "'") or die("Ошибка " . mysqli_error($link));
    $firm_detail_info = mysqli_fetch_assoc($query_myfunc);

}

function project_detail_info()
{

}

function project_view()
{
    global $link;
    $query_myfunc = mysqli_query($link, "SELECT  p.project_id, p.name_project, f.name_org FROM project p JOIN firmPerson f ON f.firm_id = p.firm_id WHERE 1") or die("Ошибка " . mysqli_error($link));

    while ($project_func = mysqli_fetch_assoc($query_myfunc)) {
        echo "<a href=project.php?project=" . $project_func['project_id'] . " class=\"list-group-item list-group-item-action \"> Организация " . $project_func['name_org'] . "  ID:  
            " . $project_func['project_id'] . " Проект: " . $project_func['name_project'] . "
        </a>";
    }
    if (isset($_GET['project'])) {
        global $firm_detail_info;
        global $link;
        $query_myfunc = mysqli_query($link, "SELECT * FROM project p JOIN firmPerson f ON p.firm_id = f.firm_id JOIN tariffs t ON t.id_tariff = p.service_project   WHERE p.project_id = '" . $_GET['project'] . "'") or die("Ошибка " . mysqli_error($link));
        $firm_detail_info = mysqli_fetch_assoc($query_myfunc);

    }
}

function add_balance()
{
    global $firm_balance;
    global $link;
    $query_myfunc = mysqli_query($link, "SELECT f.balance FROM firmPerson f  WHERE firm_id = '" . $_GET['firm_id'] . "'") or die("Ошибка " . mysqli_error($link));
    $firm_balance = mysqli_fetch_assoc($query_myfunc);
    if (isset($_POST['add_balance_submit'])) {

        mysqli_query($link, "UPDATE firmPerson  SET balance='" . $_POST['add_balance'] . "' WHERE firm_id = '" . $_GET['firm_id'] . "'") or die("Ошибка " . mysqli_error($link));
    }

}

function money()//списание средств
{
    global $link;
    $query_myfunc = mysqli_query($link, "SELECT t.date_end FROM tariffs t JOIN project p ON p.service_project = t.id_tariff WHERE 1") or die("Ошибка " . mysqli_error($link));
    $firm_money = mysqli_fetch_assoc($query_myfunc);
    $today = date("Y-m-d");
    if ($firm_money == $today) {
        echo "090";
    }
}