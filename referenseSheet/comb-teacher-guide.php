<?php 
require_once '../app/database/connect.php';//пiдключення до бази
require_once '../app/database/db.php';//пiдключення до бази

   $n=1;
// Запрос на классы
$params = [
  'graduate' => NULL,
];

$classes = selectAll('classes', $params);

// Запрос на всех учителей
$teachers = selectAll('teachers');


 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">

<table class="table table-striped-columns"><thead><tr>

 <th scope="col">№</th>
 <th scope="col">фио </th>
<th scope="col">класс </th>
  <!-- <th scope="col">изменить</th> </tr></thead> -->

  <tbody>

<?php 


foreach ($teachers as $teacher) {
    // Получаем имя учителя
    $teacherName = $teacher['pip'];
  
    // Получаем класс, в котором учитель руководит
    $classId = $teacher['class_id'];
    $teacherId = $teacher['id'];
    $className = 'Класс не назначен'; // Значение по умолчанию
  
    if ($classId !== null) {
      // Если class_id не равен null, значит, учитель назначен к какому-то классу
      // Мы ищем соответствующий класс в таблице classes
      $classParams = [
        'id' => $classId,
      ];
      $class = selectOne('classes', $classParams);
  
      if ($class) {
        $className = $class['class'] . '-' . $class['lit'];
      }
    }
  
    // Выводим данные в таблицу
  
?>

<tr><th scope="row"><?=$n?></th>
<td><?= $teacherName ?></td>
<td><?= $className ?>
<form action="../modal.php" method="post">
<input type="hidden" name="teacher_id"  value="<?= $teacherId ?>"><!-- // Скрытое поле с id учителя -->
<input type='submit' value ='изменить '>
<input type='submit' name="delete_teacher" value ='удалить'>
</form>
</td>
</tr>
<?php
  $n++;
}


// tt($_POST);

?>
</tbody></table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1d9689321f.js" crossorigin="anonymous"></script>
</body>
</html>
