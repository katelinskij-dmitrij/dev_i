<?php
session_start();
require_once 'connection.php'; // подключаем скрипт
//require_once '../js/action_ajax_form.php'; // подключаем скрипт
$link = mysqli_connect($localhost, $username, $password, $database)
or die("Ошибка " . mysqli_error($link));


select_project_user();


function check_authorization()//проверка на авторизацию
{
    global $link;
    global $userdata;
    if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {
        $query = mysqli_query($link, "SELECT *,INET_NTOA(user_ip) AS user_ip FROM users WHERE user_id = '" . intval($_COOKIE['id']) . "' LIMIT 1");
        $userdata = mysqli_fetch_assoc($query);


        if (($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id'])
            or (($userdata['user_ip'] !== $_SERVER['REMOTE_ADDR']) and ($userdata['user_ip'] !== "0"))
        ) {
            setcookie("id", "", time() - 3600 * 24 * 30 * 12, "/");
            setcookie("hash", "", time() - 3600 * 24 * 30 * 12, "/");


            $_SESSION["is_auth"] = false;

            header('Location: ../login.php');

        } else {

            $_SESSION["login"] = $userdata['login']; //Записываем в сессию логин пользователя
            $_SESSION["id_user"] = $userdata['user_id'];

            $_SESSION["is_auth"] = true; //Делаем пользователя авторизованным

        }
    } else {
        print "Включите куки";
    }
    return $userdata;
}


function select_project_user()
{
    global $link;
    global $userdata;
    global $global_org;


    $query = mysqli_query($link, "SELECT f.name_org, f.firm_id FROM firmPerson f JOIN users u ON u.user_id = f.user_id WHERE u.login='" . $userdata['login'] . "'") or die("Ошибка " . mysqli_error($link));

    if (isset($_POST['submit'])) {


        $_SESSION["firm"] = $_POST['select_project_user'];

        header("Refresh:0");
    }
    $temp = 0;

    while ($project_func = mysqli_fetch_assoc($query)) {
        $temp = $temp + 1;
        echo "<option ";
        if ($project_func['firm_id'] == $_SESSION["firm"]) {
            echo "selected";
        }
        echo "  value=" . $project_func['firm_id'] . ">" . $project_func['name'] . $project_func['name_org'] . "</option>";
    }


}

global $info_user;
function update_password()
{

    global $link;
    global $data;
    if (isset($_POST['submit'])) {

        if ($_POST['new_password_1'] !== $_POST['new_password_2']) {
            $err[] = "Пароли не совпадают";
        }
        if ($data['password'] !== md5(md5($_POST['old_password']))) {
            $err[] = "Вы ввели неверно старый пароль";
        }
        if ($_POST['new_password_1'] == $_POST['new_password_2'] and $data['password'] == md5(md5($_POST['old_password']))) {
            $new_password = md5(md5(trim($_POST['new_password_1'])));

            mysqli_query($link, "UPDATE users SET password='" . $new_password . "'  WHERE user_id='" . $data['user_id'] . "'");
            $err[] = "Пароль изменен";
        }





    }
    $info_user = (array_pop($err));
    var_dump( $info_user);
}


function balance()
{

    global $balance_user;
    global $link;
    global $userdata;
    global $days_remainder;
    global $global_org;
    $query_balance_user = mysqli_query($link, "SELECT f.*, t.* FROM  firmPerson f  JOIN project p ON f.firm_id = p.firm_id JOIN tariffs t ON p.service_project = t.id_tariff WHERE f.firm_id ='" . $_SESSION["firm"] . "'") or die("Ошибка " . mysqli_error($link));
    $balance_user = mysqli_fetch_assoc($query_balance_user);
    $_SESSION["balance"] = $balance_user['balance'];
    $datetime1 = strtotime(date("Y-m-d"));
    $datetime2 = strtotime($balance_user['date_end']);

    $secs = $datetime2 - $datetime1;
    $days_remainder = $secs / 86400;


}

function main_service_tariff()
{

    global $link;
    global $userdata;

    $query_myfunc = mysqli_query($link, "SELECT t.*,p.name_project, p.web_address, p.project_id  FROM tariffs t JOIN project p ON t.id_tariff = p.service_project JOIN firmPerson f ON p.firm_id = f.firm_id JOIN users u ON u.user_id=f.user_id WHERE p.firm_id='" . $_SESSION["firm"] . "' AND u.login ='" . $userdata['login'] . "' ") or die("Ошибка " . mysqli_error($link));

    while ($project_func = mysqli_fetch_assoc($query_myfunc)) {
        $datetime1 = strtotime(date("Y-m-d"));
        $datetime2 = strtotime($project_func['date_end']);

        $secs = $datetime2 - $datetime1;
        $days_remainder = $secs / 86400;

        echo "<div class='col-sm-6'> <div class=\"card\" style=\"width: 18rem;\">
  <img src=\"\" class=\"card-img-top\" alt=\"\">
  <div class=\"card-body\">
    <h5 class=\"card-title\">" . $project_func['name_project'] . "</h5>
    <p class=\"card-text\">" . $project_func['info'] . "</p>
  </div>
  <ul class=\"list-group list-group-flush\">
    <li class=\"list-group-item\">Общая сумма - " . $project_func['summa_service'] . " рублей</li>
    <li class=\"list-group-item\">Сопровождение - " . $project_func['bal_support'] . " рублей</li>
    <li class=\"list-group-item\">SEO продвижение - " . $project_func['bal_seo'] . " рублей</li>
       <li class=\"list-group-item\">Реклама гугл - " . $project_func['bal_google'] . " рублей</li>
    <li class=\"list-group-item\">Реклама яндекс - " . $project_func['bal_yandex'] . " рублей</li>
    <li class=\"list-group-item\">Дата блокировки - " . $project_func['date_end'] . " </li>
    <li class=\"list-group-item\">До блокировки - " . $days_remainder . " дней</li>
  </ul>
  <div class=\"card-body\">
    <a href=\"http://" . $project_func['web_address'] . "\" class=\"card-link\">" . $project_func['web_address'] . "</a>
    <a href=\"site.php?project=" . $project_func['project_id'] . "\" class=\"card-link\">Подробнее</a>
  </div>
</div>
</div>";
    }
    if (isset($_GET["project"])) {

        $query_myfunc1 = mysqli_query($link, "SELECT t.*,p.name_project, p.web_address, p.project_id  FROM tariffs t JOIN project p ON t.id_tariff = p.service_project JOIN firmPerson f ON p.firm_id = f.firm_id JOIN users u ON u.user_id=f.user_id JOIN task b ON b.project = p.project_id WHERE p.project_id='" . $_GET['project'] . "' AND u.login ='" . $userdata['login'] . "' ") or die("Ошибка " . mysqli_error($link));
        $project_func1 = mysqli_fetch_assoc($query_myfunc1);

        echo "<div  class=\"col-sm-12 card\">
  <div class=\"card-header\">
  " . $project_func1['name_project'] . " <a href=\"http://" . $project_func1['web_address'] . "\" class=\"card-link\">" . $project_func1['web_address'] . "</a>
  </div>
  <div class=\"card-body\">
    <h5 class=\"card-title\">Задания</h5>
    <ul class=\"list-group\">
  <li class=\"list-group-item d-flex justify-content-between align-items-center\">
    Задания в работе:
    <span class=\"badge badge-primary badge-pill\">";
        $result = mysqli_query($link, "SELECT b.* FROM project p  JOIN firmPerson f ON p.firm_id = f.firm_id JOIN users u ON u.user_id=f.user_id JOIN task b ON b.project = p.project_id WHERE b.status = 2 OR b.status = 3 AND project_id='" . $_GET['project'] . "' AND u.login ='" . $userdata['login'] . "'");
        $num_rows = mysqli_num_rows($result);
        print_r($num_rows);
        echo "</span>
  </li>
  <li class=\"list-group-item d-flex justify-content-between align-items-center\">
    Выполнено заданий за текущий месяц:
    <span class=\"badge badge-primary badge-pill\">";
        $result = mysqli_query($link, "SELECT b.* FROM project p  JOIN firmPerson f ON p.firm_id = f.firm_id JOIN users u ON u.user_id=f.user_id JOIN task b ON b.project = p.project_id WHERE b.date_end < '" . date("Y-m-t") . "'  AND b.date_end > '" . date("Y-m-01") . "'  AND b.status = 1  AND project_id='" . $_GET['project'] . "' AND u.login ='" . $userdata['login'] . "'");
        $num_rows = mysqli_num_rows($result);
        print($num_rows);
        echo "</span>
  </li>
  <li class=\"list-group-item d-flex justify-content-between align-items-center\">
    Выполнено заданий всего:
    <span class=\"badge badge-primary badge-pill\">";
        $result = mysqli_query($link, "SELECT b.* FROM project p  JOIN firmPerson f ON p.firm_id = f.firm_id JOIN users u ON u.user_id=f.user_id JOIN task b ON b.project = p.project_id WHERE b.status = 1  AND project_id='" . $_GET['project'] . "' AND u.login ='" . $userdata['login'] . "'");
        $num_rows = mysqli_num_rows($result);
        print($num_rows);
        echo "</span>
  </li>
  
  </ul>
  <h5 class=\"card-title\">Время</h5>
  <ul class=\"list-group\">
  <li class=\"list-group-item d-flex justify-content-between align-items-center\">
    Всего времени оплачено на этот месяц:
    <span class=\"badge badge-primary badge-pill\">";
        $result2 = mysqli_query($link, "SELECT t.bal_support FROM project p  JOIN firmPerson f ON p.firm_id = f.firm_id JOIN users u ON u.user_id=f.user_id JOIN task b ON b.project = p.project_id JOIN tariffs t ON t.id_tariff = p.service_project  WHERE  project_id='" . $_GET['project'] . "' AND u.login ='" . $userdata['login'] . "'");
        $project_func2 = mysqli_fetch_assoc($result2);

        $time = ($project_func2['bal_support'] - 400) / 700;
        if ($time < 1) {
            $time = 0;
        }
        print($time);
        echo " часа</span>
  </li>
  <li class=\"list-group-item d-flex justify-content-between align-items-center\">
    Потрачено времени:
    <span class=\"badge badge-primary badge-pill\">";
        $result3 = mysqli_query($link, "SELECT b.time_spent FROM project p  JOIN firmPerson f ON p.firm_id = f.firm_id JOIN users u ON u.user_id = f.user_id JOIN task b ON b.project = p.project_id JOIN tariffs t ON t.id_tariff = p.service_project  WHERE  project_id='" . $_GET['project'] . "' AND u.login ='" . $userdata['login'] . "'");
        $time_spent = 0;
        while ($project_func3 = mysqli_fetch_assoc($result3)) {

            $time_spent = $time_spent + $project_func3['time_spent'];
        }

        $result_time_spent = $time_spent % 60;
        echo(intval($time_spent / 60) . "ч. " . $result_time_spent);
        echo "м.</span>
  </li>
  <li class=\"list-group-item d-flex justify-content-between align-items-center\">
    Остаток времени:
    <span class=\"badge badge-primary badge-pill\">";
        $result4 = mysqli_query($link, "SELECT b.time_spent FROM project p  JOIN firmPerson f ON p.firm_id = f.firm_id JOIN users u ON u.user_id=f.user_id JOIN task b ON b.project = p.project_id JOIN tariffs t ON t.id_tariff = p.service_project  WHERE  project_id='" . $_GET['project'] . "' AND u.login ='" . $userdata['login'] . "'");
        $rest_time = $time * 60;
        $result_time_spent = $rest_time - $time_spent;
        $result_time_spent3 = intval($result_time_spent / 60);
        $result_time_spent2 = $result_time_spent % 60;
        echo($result_time_spent3 . "ч. " . $result_time_spent2);
        echo "м.</span>
  </li>
  
  </ul>
  ";
        if ($result_time_spent < 61) {
            echo "<p class=\"card-text\">Внимание!!! Если Вам не хватает часов, а Вам нужно создать дополнительные задачи, то Вы можете списать часы от следующего месяца!<br> Для этого выберите услугу \"Сопровождение\" и нужное количество часов(не достающие часы+ и часы на следующий месяц).<br> Внесите требуемые средства.<br> Свяжитесь с нашим специалистом.<br> Мы выполним работу в зачет часов следующего месяца. </p>
    <a href=\"#\" class=\"btn btn-primary\">Переход куда-нибудь</a>";
        }
        echo "
    
  </div>
</div>";
    }


}

function myfunc($itog_support, $itog_google, $itog_seo, $itog_yandex, $userdata, $project)
{

    global $month;
    global $year;
    global $link;
    global $userdata;
    check_authorization();

    $summa_service = $itog_support + $itog_google + $itog_seo + $itog_yandex;
    $query_myfunc = mysqli_query($link, "SELECT p.service_project  FROM users u JOIN firmPerson f ON u.user_id = f.user_id JOIN project p ON p.firm_id = f.firm_id JOIN tariffs t ON t.id_tariff = p.service_project WHERE login ='" . $userdata['login'] . "' AND p.project_id ='" . $project . "' ") or die("Ошибка " . mysqli_error($link));
    $balance_myfunc = mysqli_fetch_assoc($query_myfunc);
    mysqli_query($link, "UPDATE tariffs SET summa_service='" . $summa_service . "',	bal_support='" . $itog_support . "',bal_seo='" . $itog_seo . "',bal_google='" . $itog_google . "',bal_yandex='" . $itog_yandex . "', date_start = '" . date("Y-m-01") . "', date_end = '" . date("Y-m-d", strtotime("+30 days")) . "' WHERE id_tariff='" . $balance_myfunc['service_project'] . "'") or die("Ошибка " . mysqli_error($link));

}

function add_firm_user()
{
    global $link;
    global $data;
    var_dump($_SESSION["id_user"]);
    if (isset($_POST['submit'])) {
        mysqli_query($link, "INSERT INTO firmPerson SET  balance= 0, user_id='" . $_SESSION["id_user"] . "',  name_org='" . $_POST['name_org'] . "',	inn='" . $_POST['inn'] . "',kpp='" . $_POST['kpp'] . "',bik='" . $_POST['bic'] . "',addressLegal='" . $_POST['addressLegal'] . "',actualAddress='" . $_POST['actualAddress'] . "',mailAddress='" . $_POST['mailAddress'] . "',boss='" . $_POST['boss'] . "',phone='" . $_POST['phone'] . "',mail='" . $_POST['mail'] . "'") or die("Ошибка " . mysqli_error($link));

    }
}

function add_site_user()
{
    global $link;
    global $data;
    if (isset($_POST['submit'])) {
        mysqli_query($link, "INSERT INTO firmPerson SET firm_id ='" . $_SESSION["firm"] . "', name_project= '" . $_POST['name_org'] . "', user_id='" . $data['user_id'] . "',  name_org='" . $_POST['name_org'] . "',	inn='" . $_POST['inn'] . "',kpp='" . $_POST['kpp'] . "',bik='" . $_POST['bic'] . "',addressLegal='" . $_POST['addressLegal'] . "',actualAddress='" . $_POST['actualAddress'] . "',mailAddress='" . $_POST['mailAddress'] . "',boss='" . $_POST['boss'] . "',phone='" . $_POST['phone'] . "',mail='" . $_POST['mail'] . "'") or die("Ошибка " . mysqli_error($link));

    }
}


function service()
{
    global $balance_user;
    global $summa_service;
    global $userdata;
    global $link;

    global $result;
    $result = array(
        'itog' => $_POST["itog"],
        'itog_support' => $_POST["itog_support"],
        'itog_google' => $_POST["itog_google"],
        'itog_seo' => $_POST["itog_seo"],
        'itog_yandex' => $_POST["itog_yandex"],
        'project' => $_POST["project"]

    );


    $itog = $result["itog"];
    $itog_support = $result["itog_support"];
    $itog_google = $result["itog_google"];
    $itog_seo = $result["itog_seo"];
    $itog_yandex = $result["itog_yandex"];
    $project = $result["project"];

    myfunc($itog_support, $itog_google, $itog_seo, $itog_yandex, $userdata, $project);


}


function add_task_user()
{
    check_authorization();
    global $userdata;
    global $link;

    if (isset($_POST['submit_task'])) {

        mysqli_query($link, "INSERT INTO task SET developer = 3, status = 3,priority = 2,text='" . $_POST['text_task'] . "',name_task='" . $_POST['name_task'] . "',project='" . $_POST['select'] . "'") or die("Ошибка " . mysqli_error($link));
        header('Location: #');
    }


}

function form_select_site()
{
    check_authorization();
    global $userdata;
    global $link;
    $query_myfunc = mysqli_query($link, "SELECT p.name_project, p.project_id, p.web_address  FROM project p JOIN firmPerson f ON p.firm_id = f.firm_id JOIN users u ON f.user_id = u.user_id    WHERE f.firm_id= '" . $_SESSION["firm"] . "' AND u.user_id ='" . $userdata['user_id'] . "'") or die("Ошибка " . mysqli_error($link));
    while ($project_func = mysqli_fetch_assoc($query_myfunc)) {
        echo "<option selected value=" . $project_func['project_id'] . ">" . $project_func['name_project'] . " - " . $project_func['web_address'] . "</option>";

    }

}

function view_task()
{
    check_authorization();
    global $userdata;
    global $link;
    $query_myfunc = mysqli_query($link, "SELECT  t.status, t.id_task, t.name_task, t.project, p.project_id, t.text, t.date_start, p.name_project, t.text, t.date_start, s.name_status, p.web_address  FROM task t JOIN project p  ON t.project = p.project_id JOIN status_task s  ON s.id_status = t.status JOIN firmPerson f ON p.firm_id = f.firm_id  WHERE f.firm_id ='" . $_SESSION["firm"] . "' ORDER BY t.id_task DESC") or die("Ошибка " . mysqli_error($link));

    while ($project_func = mysqli_fetch_assoc($query_myfunc)) {
        echo "<div style='margin-top: 20px;' class=\"col-12 border bg-light\">
        <label for=\"exampleFormControlTextarea1\">Тема задания:</label>
        <textarea class=\"form-control\" id=\"exampleFormControlTextarea1\" rows=\"1\" disabled>" . $project_func['name_task'] . "</textarea>
        <label for=\"exampleFormControlTextarea1\">Проект:</label>
        <textarea class=\"form-control\" id=\"exampleFormControlTextarea1\" rows=\"1\" disabled>" . $project_func['name_project'] . " Адрес: " . $project_func['web_address'] . "</textarea>
        
        <label for=\"exampleFormControlTextarea1\">Текст задания:</label>
        <textarea class=\"form-control\" id=\"exampleFormControlTextarea1\" rows=\"6\" disabled>" . $project_func['text'] . "</textarea>
        <label for=\"exampleFormControlTextarea1\">Текущий статус:</label>
        <input class=\"form-control\" type=\"text\" placeholder='" . $project_func['name_status'] . "' readonly>
        <label for=\"exampleFormControlTextarea1\">Дата создания задания:</label>
        <input class=\"form-control\" type=\"text\" placeholder='" . $project_func['date_start'] . "' readonly>";

        if ($project_func['status'] == 3) {

            echo "<div style = 'width: 100px; margin: 20px auto;' ><a target = \"_blank\" href=\"?update=" . $project_func['id_task'] . "\"><button type=\"button\" class=\"btn btn-outline-success\">Изменить</button></a></div>";

        }

        echo "</div>";


    }
}

function task_work()
{

}

function money_write_off()
{
    global $link;

    if ($today = date("d.m.y") == $days_write_off = "16." . date("m.y") . "") {
        $query_myfunc = mysqli_query($link, "SELECT t.balance, t.summa_service  FROM users u JOIN FirmPerson f  ON u.user_info = f.firm_id JOIN tariffs t  ON f.balance = t.id_tariff WHERE 1") or die("Ошибка " . mysqli_error($link));
        $project_func = mysqli_fetch_assoc($query_myfunc);
        $project_func['balance'] = $project_func['balance'] - $project_func['summa_service'];
        print_r($project_func);
    }

}

function settings_user_info()
{
    check_authorization();
    global $userdata;
    global $link;
    global $settings_user_info_func;
    $query_myfunc = mysqli_query($link, "SELECT f.*  FROM users u JOIN firmPerson f  ON u.user_id = f.user_id  WHERE f.firm_id='" . $_SESSION["firm"] . "' AND u.user_id ='" . $userdata['user_id'] . "'") or die("Ошибка " . mysqli_error($link));
    $settings_user_info_func = mysqli_fetch_assoc($query_myfunc);

}

function account_movements()//Движение по счету
{
    check_authorization();
    global $userdata;
    global $link;
    $query_myfunc = mysqli_query($link, "SELECT *  FROM history_tariffs  WHERE firm='" . $_SESSION["firm"] . "'") or die("Ошибка " . mysqli_error($link));


    while ($settings_func = mysqli_fetch_assoc($query_myfunc)) {
        echo "
 <div class=\"row\">
 <div class=\"col-sm-3\">
      " . $settings_func['date'] . "
    </div>
    <div class=\"col-sm-6\">
       
    </div>
    <div class=\"col-sm-3\">
      " . $settings_func['balance'] . "
    </div>
</div>
 
 ";

    }
}

?>