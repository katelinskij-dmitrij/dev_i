<?php
require_once 'connection.php'; // подключаем скрипт

// подключаемся к серверу
$link = mysqli_connect($localhost, $username, $password, $database)
or die("Ошибка " . mysqli_error($link));

// выполняем операции с базой данных
//создаем базу дынных для частных пользователей
$createPrivatePerson = "CREATE TABLE IF NOT EXISTS `PrivatePerson` (`user_id` INT(5) NOT NULL AUTO_INCREMENT,
 `login` VARCHAR(20),
  `password` VARCHAR(50),
  `surname` VARCHAR(60),
  `name` VARCHAR(60),
  `middleName` VARCHAR(60),
  `phone` INT (12),
  `passport` INT (10),
  `mail` VARCHAR(60),
  `project` VARCHAR(60),
  `balance` INT (7),
  `role` INT(2) NOT NULL,
   PRIMARY KEY(`user_id`));";
$result = mysqli_query($link, $createPrivatePerson) or die("Ошибка " . mysqli_error($link));
if($result)
{
    echo "Создание таблицы Частных.Лиц прошло успешно";
}
$createFirmPerson = "CREATE TABLE IF NOT EXISTS `FirmPerson` (
`firm_id` INT(5) NOT NULL AUTO_INCREMENT,
 `login` VARCHAR(20),
  `password` VARCHAR(50),
  `name_org` VARCHAR(60),
  `inn` INT (10),
  `kpp` INT (9),
  `ogrn` INT (12),
  `addressLegal` VARCHAR (60),
  `actualAddress` VARCHAR(60),
  `mailAddress` VARCHAR (60),
  `checking account` INT (30),
  `cash account` INT (30),
  `bik` INT (20),
  `boss` VARCHAR (80),
  `phone` INT (12),
  `mail` VARCHAR  (60),
  `project` VARCHAR(60),
  `balance` INT (7),
  `role` INT(2) NOT NULL,
   PRIMARY KEY(`firm_id`) ,
   INDEX(`project`, `role`));";
$result = mysqli_query($link, $createFirmPerson) or die("Ошибка " . mysqli_error($link));
if($result)
{
    echo "Создание таблицы Юр.Лиц прошло успешно";
}

$createFirmPerson = "CREATE TABLE IF NOT EXISTS `Project` (`project_id` INT(5) NOT NULL AUTO_INCREMENT,
 `name` VARCHAR(20),
  `web_address` VARCHAR(50),
  `date_new` VARCHAR(60),
  `date_exit` VARCHAR(60),
  `connected services` VARCHAR(60),
  `info` INT (12),
  `status` INT (10),
  `payments` VARCHAR(60),
  `TasksWork` INT (7),
  `Tasks completed` INT(2) NOT NULL,
   PRIMARY KEY(`project_id`));";
$result = mysqli_query($link, $createFirmPerson) or die("Ошибка " . mysqli_error($link));
if($result)
{
    echo "Создание таблицы проектов прошло успешно";
}
$createFirmPerson = "CREATE TABLE IF NOT EXISTS `service`
 ( `id_servive` INT NOT NULL AUTO_INCREMENT ,
  `name_service` INT NOT NULL ,
   `price` INT NOT NULL ,
    `info` TEXT NOT NULL ,
     PRIMARY KEY (`id_servive`));
";
$result = mysqli_query($link, $createFirmPerson) or die("Ошибка " . mysqli_error($link));
if($result)
{
    echo "Создание таблицы проектов прошло успешно";
}
// закрываем подключение
mysqli_close($link);
?>

