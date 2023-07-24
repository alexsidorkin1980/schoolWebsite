<?php
session_start();

// Перевiрка наявностi ролi в сесii
if (!isset($_SESSION['role'])) {
    header('Location: login.php');
    exit();
}

// Перевiрка ролi для бiблiотекаря
if ($_SESSION['role'] == 'librarian') {
    echo'доступ закрыт';
    exit();
}

// Перевiрка ролi для user
if ($_SESSION['role'] == 'user') {
    echo'доступ закрыт';
    exit();
}

require_once '../config/connect.php';// Пiдключення до бази
$db = connectDb($BD);
$sql = "SELECT * FROM `classes`";
$result = mysqli_query($db, $sql);

  if (isset($_GET['action']) && $_GET['action'] == 'update') {
      // Виконати змiни в базi даних
      //встановлюемо дату змiни в поле graduate (випускник) якщо  class бiльше 3
      $sql1 = "UPDATE `classes` SET graduate = NOW() WHERE class > 3";
      mysqli_query($db, $sql1);
      //додаемо 1 до class якщо  class менше 3
      $sql2 = "UPDATE `classes` SET class = class + 1 WHERE class < 4";
      mysqli_query($db, $sql2);
       //змiнюемо поля в таблицi учнiв
       //встановлюемо дату змiни в поле graduate (випускник) якщо по id_classes в таблицi
       //classes поле graduate не null
      $sql3 = "UPDATE `schoolboys` SET graduate = NOW() WHERE id_classes IN (SELECT id FROM `classes` WHERE graduate IS NOT NULL)";
    mysqli_query($db, $sql3);
     header('Location: ../index.php');
     exit();
  }
?>