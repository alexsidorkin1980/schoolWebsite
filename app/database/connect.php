<?php 

$driver='mysql';
$host='localhost';
$db_name='school';
$db_user='root';
$db_pass='';
$charset='utf8';
$options=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

try{
    $pdo=new PDO(
        "$driver:host=$host;dbname=$db_name;charset=$charset",
        $db_user,$db_pass,$options
    );
}catch(PDOException $i){
    die("Ошибка подключения к базе данных");
}
?>





<?php
// $BD['path']='localhost';
// $BD['user']='root';
// $BD['pswd']='';
// $BD['name']='school';

// function connectDb($BD)
// {
//     // Створення з'єднання
//     $conn = mysqli_connect($BD['path'], $BD['user'], $BD['pswd'], $BD['name']);
//     // Перевірка з'єднання
//     if (!$conn) {
//         die("Connection failed: " . mysqli_connect_error());
//         exit();
//     }
//     return  $conn;
// }
