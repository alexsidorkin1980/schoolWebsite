<?php

require_once __DIR__ . '/../../app/database/db.php';

$isSubmit = false;
$errMsg = [];
$regStatus = '';
$users = selectAll('users');

// код для добавления книги для  учеников 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-book'])) {
  $author = trim($_POST['author']);
  $title = trim($_POST['title']);
  $class = trim($_POST['class']);
  $inv_number = trim($_POST['inv_number']);
  $date_edition = isset($_POST['date_edition']) ? trim($_POST['date_edition']) : '0';
  $existance = selectOne('library', ['inv_number' => $inv_number]);
  $str = $author . "\n" . $title . "\n" . $class . "\n" . $inv_number . "\n" . $date_edition . "\n";

  if ($author === '' || $title === '' || $class === '' || $inv_number === '' || $date_edition === '') {// проверка на заполнение всех полей
    array_push($errMsg, "Не все поля заполнены!!!");
  } else if ($existance) {
    array_push($errMsg, "Инвентаризационный номер с такими данными уже существует!!!");
  } else {

    $post = [
      'author' => $author,
      'title' => $title,
      'class' => $class,
      'inv_number' => $inv_number,
      'date_edition' => $date_edition,
      'status' => 'available',
    ];


    $data = [
      'author' => $author,
      'title' => $title,
      'class' => $class,
      'inv_number' => $inv_number,
      'date_edition' => $date_edition,
    ];

    insert('library', $post);
    insert('history_books_student', $data);

    $class = trim($_POST['class']);
    $classes = selectAll('library', ['class' => $class]);
    header('location: /library/index.php ');
  }
} else {
  $author = '';
  $title = '';
  $class = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_book'])) {
  $id = $_GET['id_book'];
  $book = selectOne('library', ['id' => $id]);
  $id_book = $book['id'];
  $author = $book['author'];
  $title = $book['title'];
  $class = $book['class'];
  $inv_number = $book['inv_number'];
}





// код для добавления книги для  учителей 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-book-teach'])) {
  $author = trim($_POST['author']);
  $title = trim($_POST['title']);
  $inv_number = trim($_POST['inv_number']);
  $date_edition = isset($_POST['date_edition']) ? trim($_POST['date_edition']) : '0';
  $status = 'available';
  $existance = selectOne('library', ['inv_number' => $inv_number]);

  if ($author === '' || $title === '' || $inv_number === '' || $date_edition === '') {
    array_push($errMsg, "Не все поля заполнены!!!");
  } else if ($existance) {
    array_push($errMsg, "Инвентаризационный номер с такими данными уже существует!!!");
  } else {

    $post = [
      'author' => $author,
      'title' => $title,
      'inv_number' => $inv_number,
      'date_edition' => $date_edition,
      'status' => $status,
    ];

    insert('library_teach', $post);
    $id_book = selectOne('library_teach', ['inv_number' => $inv_number]);

    $data = [
      'id_book' => $id_book['id'],
      'author' => $author,
      'title' => $title,
      'inv_number' => $inv_number,
      'date_edition' => $date_edition,
    ];
    insert('history_books_teacher', $data);
    $class = trim($_POST['class']);
    $classes = selectAll('library', ['class' => $class]);
    header('location: /library/index-teach.php ');
  }
} else {
  $author = '';
  $title = '';
  $class = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_book_teach'])) {
  $id = $_GET['id_book_teach'];
  $book = selectOne('library_teach', ['id' => $id]);
  $id_book = $book['id'];
  $author = $book['author'];
  $title = $book['title'];
  $inv_number = $book['inv_number'];
}


// изменение данных о книге ученика 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-book'])) {
  $id = $_POST['id'];
  $author = trim($_POST['author']);
  $title = trim($_POST['title']);
  $class = trim($_POST['class']);

  if ($author === '' || $title === '' || $class === '') {// проверка на заполнение всех полей
    array_push($errMsg, "Не все поля заполнены!!!");
  } else if (!is_numeric($class) || $class < 0 || $class > 10) {
    array_push($errMsg, "Класс должен быть числом от 0 до 10!!!");
  } else {

    $book = [
      'author' => $author,
      'title' => $title,
      'class' => $class,

    ];
    $id = $_POST['id'];
    update('library', $id, $book);
    header('location: /library/index.php?class=' . $class);
  }
} else {
  $author = '';
  $title = '';
}


// изменение данных о книге учителя
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-book-teach'])) {
  $id = $_POST['id'];
  $author = trim($_POST['author']);
  $title = trim($_POST['title']);

  if ($author === '' || $title === '') {// проверка на заполнение всех полей
    array_push($errMsg, "Не все поля заполнены!!!");
  } else {

    $book = [
      'author' => $author,
      'title' => $title,
    ];
    $id = $_POST['id'];

    update('library_teach', $id, $book);
    header('location: /library/index-teach.php?class=' . $class);
  }
} else {
  $author = '';
  $title = '';
}

// код для выдачи книги ученику
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book-out'])) {
  $id_book = $_GET['id'];
  $class = $_GET['class'];
  $id_student = trim($_POST['combobox']);
  $student = selectOne('students', ['id' => $id_student]);
  $id_class = $student['class_id'];
  $status = 'issued';
  $borrow_date = $currentDate = date('Y-m-d');
  $return_date = trim($_POST['return_date']);

  if ($id_student === '' || $return_date === '') {// проверка на заполнение всех полей
    array_push($errMsg, "Не все поля заполнены!!!");
  } else {
    $post = [
      'id_student' => $id_student,
      'id_class' => $id_class,
      'status' => $status,
      'borrow_date' => $borrow_date,
      'return_date' => $return_date,
    ];

    update('library', $id_book, $post);

    header('location: /library/index.php?id=' . $id_book . '&class=' . $class);
  }
} else {
  $return_date = '';
}



// код для выдачи книги учителю 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book-out-teach'])) {
  $id_book = $_GET['id'];
  $id_teacher = trim($_POST['combobox']);
  $status = 'issued';
  $borrow_date = $currentDate = date('Y-m-d');
  $return_date = trim($_POST['return_date']);

  if ($id_teacher === '' || $return_date === '') {
    array_push($errMsg, "Не все поля заполнены!!!");
  } else {

    $post = [
      'id_teacher' => $id_teacher,
      'status' => $status,
      'borrow_date' => $borrow_date,
      'return_date' => $return_date,
    ];

    update('library_teach', $id_book, $post);

    header('location: /library/index-teach.php?&id=' . $id_book);
  }
} else {
  $return_date = '';
}


// возврат книги ученика 
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_book_return_st'])) {
  $id = $_GET['id_book_return_st'];
  $class = $_GET['class'];

  $data = [
    'status' => 'available',
    'id_student' => 0,
    'borrow_date' => '1111-11-11',
    'return_date' => '1111-11-11',
  ];
  update('library', $id, $data);
  header('location: /library/index-issued-book.php?class=' . $class);
}

// возврат книги учителя
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_book_return'])) {
  $id = $_GET['id_book_return'];

  $data = [
    'status' => 'available',
    'id_teacher' => 0,
    'borrow_date' => '1111-11-11',
    'return_date' => '1111-11-11',
  ];

  update('library_teach', $id, $data);
  header('location: /library/index-teach-issued-book.php');
}

// удаление книги учителя

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['book_teach_delete'])) {

  $id = $_GET['book_teach_delete'];
  // tte($id); 
  deletes('library_teach', $id);
  header('location: /library/index-teach.php ');
}


// удаление книги ученика

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['book_delete'])) {
  $class = $_GET['class'];
  $id = $_GET['book_delete'];
  deletes('library', $id);
  header('location: /library/index.php?class=' . $class);
}
