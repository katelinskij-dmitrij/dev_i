<?php

if ($_SESSION['security_check'] == 0) {
    $user_id = $_SESSION['user_id'];
    $n = (int)mysqli_result(mysqli_query("SELECT COUNT(*) FROM `sessions` ".
        "WHERE `user_id`=".$user_id." AND `ip`='".$_SERVER['REMOTE_ADDR']."' ".
        "AND `user_agent`='".mysqli_real_escape_string($_SERVER['HTTP_USER_AGENT'])."' ".
        "AND `hash`='".preg_replace("/[^0-9a-f]/", "", $_COOKIE['auth'])."'"), 0);
    if ($n == 0) {
        header("Location: /login?act=logout");
        exit();
    } else {
        $_SESSION['security_check'] = 1;
    }
}

//$n = mysql_result(mysql_query("SELECT COUNT(*) FROM `banned` WHERE `ip`='".$_SERVER['REMOTE_ADDR']."'"), 0);
//if ($n > 0) $_SESSION['security_check'] = 0;

?>