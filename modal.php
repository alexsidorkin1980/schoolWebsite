<?php
session_start();
require_once 'app/database/connect.php'; //пiдключення до бази
require_once 'app/database/db.php'; //пiдключення до бази
$text = ''; //для виводу тексту
$teacherId = isset($_POST['teacher_id']) ? $_POST['teacher_id'] : null;
if (isset($_POST['delete_teacher'])) {
  removeClassIdForTeacher($teacherId);
  header('Location: /referenseSheet/teacher-guide.php');
  exit();
} else {

  if (isset($_POST['teacher_id'])) {
    // Получите id учителя из $_POST['teacher_id']
    $_SESSION['teachId'] = $_POST['teacher_id'];


  }

  //запрос на комбобокс с классами
  require_once 'app\include\combobox-check.php';
  echo $look;
  echo $a = "<a href='referenseSheet/teacher-guide.php'>назад</a>";

  if (isset($_POST['Combobox1'])) {
    $teacherId = $_SESSION['teachId'];

    $id_classes = $_POST['Combobox1'];

    //  обновление class_id только если выбран класс и была отправлена форма
    if (!empty($id_classes)) {
      try {
        update('teachers', $teacherId, ['class_id' => $id_classes]);
        header('Location: /referenseSheet/teacher-guide.php');
        exit();

      } catch (PDOException $e) {
        // Проверка на ошибку дублирования записи
        if ($e->getCode() === '23000') {
          $text = "В этом классе уже есть учитель.";

        }
      }
    }
  }
}

echo $text = '<p>' . $text . '</p>';