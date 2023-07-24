<?php
$BD['path']='localhost';
$BD['user']='root';
$BD['pswd']='';
$BD['name']='school';

function connectDb($BD)
{
    // Створення з'єднання
    $conn = mysqli_connect($BD['path'], $BD['user'], $BD['pswd'], $BD['name']);
    // Перевірка з'єднання
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        exit();
    }
    return  $conn;
}
