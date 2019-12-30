<?php
session_start();
require_once 'DB/connection.php'; // подключаем скрипт


global $data;
function generateCode($length = 6)
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0, $clen)];
    }
    return $code;
}


mysqli_query($link, "UPDATE users SET user_hash='" . md5(generateCode(10)) . "' WHERE user_id='" . $data['user_id'] . "'");

$_SESSION["login"] = array();
$_SESSION = array();
session_destroy();

header("Location: /");
exit();
?>