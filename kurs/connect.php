<?php

$connect = mysqli_connect($hostname= 'localhost',
    $username = 'root', $password ='', $database ='kurs');   // Подключение к БД

if(!$connect) {     // Проверкаа успешного подключения к БД
    die('Error');
}

