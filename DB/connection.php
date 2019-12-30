<?php
$localhost='ratnicd7.beget.tech'; // имя хоста (уточняется у провайдера)
$database='ratnicd7_lk'; // имя базы данных, которую вы должны создать
$username='ratnicd7_lk'; // заданное вами имя пользователя, либо определенное провайдером
$password='8uhj69%A'; // заданный вами пароль

$link = mysqli_connect($localhost, $username, $password, $database)
or die("Ошибка " . mysqli_error($link));

?>