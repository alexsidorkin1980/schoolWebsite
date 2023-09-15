<?php
session_start();

// Перевiрка наявностi ролi в сесii
if (!isset($_SESSION['role'])) {
    header('Location:../login.php');
    // include '..\config\login.php';
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
// require_once '../index.php';
?>