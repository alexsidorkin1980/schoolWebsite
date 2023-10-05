<?php 
require_once '../app/database/connect.php';//пiдключення до бази
require_once '../app/database/db.php';//пiдключення до бази

   $n=1;
   $text='';//для виводу тексту
// Запрос на классы
// $params = [
//   'graduate' => NULL,
// ];

$classes = selectAll('classes',['graduate' => NULL]);

// Запрос на всех учителей
$teachers = selectAll('teachers');
 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Початкова школа</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/teacher-guide.css">
<style>

  input{
    background: none;
    border: none;
    color: #007bff; /* Цвет текста, по желанию */
    text-decoration: underline; /* Добавляет подчеркивание как у ссылки */
    cursor: pointer; /* Показывает, что это кликабельный элемент */
    padding: 0; /* Убирает внутренний отступ */
    font-size: inherit; /* Использует размер шрифта как у окружающего текста */
}

</style>
   </head>
  <body>
  <?php require_once '../app\include\access-check.php';?>
   <!-- header  -->
   <?php require_once '../app/include/header.php';?>
<!-- header end -->


<!-- блок main start  -->
<div class="container">
    <div class="content row">
        <!-- блок main start  -->
<!-- блок main content    -->
<div class="main-content col-md-9 col-12">
        <!-- блок main content    --> 
  
        <div class="table-content">

        

        <h1 >Довідник учителів</h1> 
   
        <table class="table "><thead><tr>

<th scope="col">№</th>
<th scope="col">фио </th>
<th scope="col">класс </th>
 <th scope="col"></th> </tr></thead>

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
<td><?= $className ?></td>
<td><form action="../modal.php" method="post">
<input type="hidden" name="teacher_id"  value="<?= $teacherId ?>"><!-- // Скрытое поле с id учителя -->
<input type='submit' name="delete_teacher" value ='удалить '>
<input type='submit' value =' изменить '>
</form>
</td>
</tr>
<?php
 $n++;
}


// tt($_POST);

?>
</tbody></table>

 <p><?=$text;?></p>
       </div>
</div>
        </div>


          <!-- блок main content end   -->
        </div>
        <!-- блок main content end   -->

        <!-- блок main end  -->
    </div>
</div>
<!-- блок main end  -->

<!-- footer -->
   <?php require_once '../app/include/footer.php';?>
<!-- footer end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1d9689321f.js" crossorigin="anonymous"></script>

   </body>
</html>




