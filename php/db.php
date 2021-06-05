<?php
    date_default_timezone_set("Europe/Moscow");
    $host = 'localhost:8889'; 
    $database = 'PashaDiplom';
    $user = 'root'; 
    $password = 'root'; 

    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
?>