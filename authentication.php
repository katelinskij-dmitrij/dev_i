
<meta charset="UTF-8">
<?php

if(isset($_POST['login']) && isset($_POST['password'])){

    $login=strip_tags($_POST['login']);
    $password = strip_tags($_POST['password']);
    echo "Ваш логин: $login <br> Ваш пароль: $password";
}
?>