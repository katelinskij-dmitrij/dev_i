<?php
session_start();

if ($_SESSION["is_auth"] == true ) {
    header('Location: user/main-lk.php');
}
if ($_SESSION["is_auth"] == false){
    header('Location: login.php');
}
?>