<?php

require_once __DIR__ . '/../../app/database/db.php';

$isSubmit = false;
$errMsg = [];
$regStatus = '';
$users = selectAll('users');

// код для добавления книги
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-book'])) {
 // $admin = 0;
  $author = trim($_POST['author']);
  $title = trim($_POST['title']);
  $class = trim($_POST['class']);
  $inv_number = trim($_POST['inv_number']);
  $date_edition = isset($_POST['date_edition'])?trim($_POST['date_edition']) : '0';
  $existance = selectOne('library',['inv_number' => $inv_number]);
  // tte($existance);
  

  if ($author === '' || $title === '' || $class === '' || $inv_number === '' || $date_edition === '') {// проверка на заполнение всех полей
    array_push($errMsg, "Не все поля заполнены!!!");
  }else if ($existance ) {  //&& $existance['inv_number'] === $inv_number
      array_push($errMsg, "Инвентаризационный номер с такими данными уже существует!!!");
    } 
  
  else {

      $post = [
        'author' => $author,
        'title' => $title,
        'class' => $class,
        'inv_number' => $inv_number,
       'date_edition'=> $date_edition,
      ];

      // tte( $post);

       insert('library', $post);
  
    $class = trim($_POST['class']);

     $classes = selectAll('library',['class' => $class]);
      // tte($classes);
    header('location: /library/index.php ');
  }
} else {
  // сохранение значений инпутов логин и имейл
  $author = '';
  $title = '';
  $class = '';
}


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
  $id = $_GET['id'];
  $book = selectOne('library', ['id' => $id]);
  $id_book=$book['id'];
  $author = $book['author'];
  $title = $book['title'];
  $class = $book['class'];
  $inv_number = $book['inv_number'];
}

// изменение данных о книге
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-book'])) {
  $id=$_POST['id'];
  $author = trim($_POST['author']);
  $title = trim($_POST['title']);
  $class = trim($_POST['class']);

  if ($author === '' || $title === '' || $class === '' ) {// проверка на заполнение всех полей
    array_push($errMsg, "Не все поля заполнены!!!");
  }
     else if (!is_numeric($class) || $class < 0 || $class > 10) {
      array_push($errMsg, "Класс должен быть числом от 0 до 10!!!");
  } else {

    $book = [
      'author' => $author,
      'title' => $title,
      'class' => $class,

    ];
    $id=$_POST['id'];
    // tte( $id);
    update('library', $id, $book);
    header('location: /library/index.php ');
 }
} else {
  // сохранение значений 
  // $author = '';
  // $title = '';
}

// удаление пользователя

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_delete'])) {

  $id = $_GET['id_delete'];
  deletes('library', $id);
  header('location: /library/index.php ');
}
