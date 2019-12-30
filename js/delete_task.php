<?php


// Формируем массив для JSON ответа

require_once '../DB/admin_info.php' ;// подключаем скрипт

delete_task();

if (isset($_SERVER["HTTP_REFERER"])) { header("Location: " . $_SERVER["HTTP_REFERER"]); }



?>