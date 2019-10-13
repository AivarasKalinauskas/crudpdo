<?php

$dns = 'mysql:host=localhost;dbname=crudpdo';
$username = 'root';
$password = '';
$options = [];

try {
    $connection = new PDO($dns, $username, $password, $options);
} catch (PDOException $exception) {
    echo 'Connection filed' . $exception->getMessage();
}