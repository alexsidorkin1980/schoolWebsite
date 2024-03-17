<?php
require_once __DIR__ . '/../../app/database/db.php';

if (!$_SESSION) {
  header('location: ' . BASE_URL . 'login.php');
}
$errMsg = [];
$id = '';
$title = '';
$content = '';
$img = '';
$topic = '';

$topics = selectAll('topics');
$posts = selectAll('posts');
$postsAdm = selectAllFromPostsWithUsers('posts', 'users');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])) {

  // добавление избражения  
  require_once '../../app/helps/changeImage.php';

  // код для добавления записей
  $id = $_SESSION['id'];
  $title = trim($_POST['title']);
  $content = trim($_POST['content']);
  $topic = isset($_POST['topic']) ? trim($_POST['topic']) : '';
  $publish = isset($_POST['publish']) && trim($_POST['publish']) !== null ? 1 : 0;

  if ($title === '' || $content === '' || $topic === '') { // проверка на заполнение всех полей
    array_push($errMsg, "Не все поля заполнены!!!");
  } else if (mb_strlen($title, 'UTF8') < 7) { // проверка на количество символов
    array_push($errMsg, "Название статьи должено быть больше 7-ми символов!!!");
  } else {
    $post = [
      'id_user' => $id,
      'title' => $title,
      'content' => $content,
      'status' => $publish,
      'img' => $img,
      'id_topic' => $topic,
    ];
    $post = insert('posts', $post);
    header('location: ../../admin/posts/index.php ');
  }
} else {
  // сохранение значений инпутов 
  $id = '';
  $title = '';
  $content = '';
  $publish = '';
  $topic = '';
}

// перенос id через форму
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
  $id = $_GET['id'];
  $post = selectOne('posts', ['id' => $id]);
  $id = $post['id'];
  $title = $post['title'];
  $content = $post['content'];
}
// изменение записей
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_post'])) {

  require_once '../../app/helps/changeImage.php';

  $id = $_POST['id'];
  $title = trim($_POST['title']);
  $content = trim($_POST['content']);
  $topic = trim($_POST['topic']);

  $publish = isset($_POST['publish']) && trim($_POST['publish']) !== null ? 1 : 0;

  if ($title === '' || $content === '' || $topic === '') { // проверка на заполнение всех полей
    array_push($errMsg, "Не все поля заполнены!!!");
  } else if (mb_strlen($title, 'UTF8') < 2) { // проверка на количество символов логина
    array_push($errMsg, "Логин должен быть больше 2-х символов!!!");
  } else {

    if (!empty($img)) {
      $contents = [
        'id_user' => $_SESSION['id'],
        'title' => $title,
        'content' => $content,
        'img' => $img,
        'status' => $publish,
        'id_topic' => $topic,
      ];


      update('posts', $id, $contents);
      header('location: ../../admin/posts/index.php ');
    } else {

      $contents = [
        'id_user' => $_SESSION['id'],
        'title' => $title,
        'content' => $content,
        'status' => $publish,
        'id_topic' => $topic,
      ];


      update('posts', $id, $contents);
      header('location: ../../admin/posts/index.php ');



    }
  }
} else {
  // сохранение значений инпутов логин и имейл

  $publish = isset($_POST['publish']) ? 1 : 0;
  ;

}

// изменение publish
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_pub'])) {

  $id = $_GET['id_pub'];
  $publish = $_GET['publish'];

  update('posts', $id, ['status' => $publish]);
  header('location: ../../admin/posts/index.php ');
  exit();
}

// удаление записи
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {

  $id = $_GET['delete_id'];
  deletes('posts', $id);

  header('location: ../../admin/posts/index.php ');
}


