<?php


require_once __DIR__ . '/../../app/database/db.php';

$id = '';
$name_topic = '';
$description_topic = '';
$errMsg = [];


$topics = selectAll('topics');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_topic'])) {
  $name_topic = $_POST['name_topic'];
  $description_topic = $_POST['description_topic'];

  if ($name_topic === '' || $description_topic === '') {// проверка на заполнение всех полей
    array_push($errMsg, "Не все поля заполнены!!!");
  } else if (mb_strlen($name_topic, 'UTF8') < 2) {// проверка на количество символов логина
    array_push($errMsg, "Логин должен быть больше 2-х символов!!!");
  } else {
    $topic = [
      'name' => $name_topic,
      'description' => $description_topic,

    ];

    $id = insert('topics', $topic);
    $topic = selectOne('topics', ['id' => $id]);

    header('location: ../../admin/topics/index.php ');
  }
} else {
  // сохранение значений инпутов логин и имейл
  $name_topic = '';
  $description_topic = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
  // $id=$_POST['id'];
  $id = $_GET['id'];
  $topic = selectOne('topics', ['id' => $id]);
  $id = $topic['id'];
  $name_topic = $topic['name'];
  $description_topic = $topic['description'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_topic'])) {
  $name_topic = trim($_POST['name_topic']);
  $description_topic = trim($_POST['description_topic']);

  if ($name_topic === '' || $description_topic === '') {// проверка на заполнение всех полей
    array_push($errMsg, "Не все поля заполнены!!!");
  } else if (mb_strlen($name_topic, 'UTF8') < 2) {// проверка на количество символов логина
    array_push($errMsg, "Логин должен быть больше 2-х символов!!!");
  } else {
    $topic = [
      'name' => $name_topic,
      'description' => $description_topic,

    ];
    $id = $_POST['id'];
    update('topics', $id, $topic);

    header('location: ../../admin/topics/index.php ');
  }
}


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
  $id = $_GET['delete_id'];
  deletes('topics', $id);
  header('location: ../../admin/topics/index.php ');



}

