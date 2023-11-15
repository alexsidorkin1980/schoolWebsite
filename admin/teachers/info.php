<?php 
session_start();

  require_once '../../path.php'; 
  require_once '../../app/controllers/teachers.php'; 
  // tt($teachers);
  // exit();
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
  <link rel="stylesheet" href="../../assets/css/admin.css">

   </head>
  <body>
   <!-- header  -->
   <?php require_once '../../app/include/header-admin.php'; ?>
<!-- header end -->

<div class="container">
<!-- sidebar start -->
<?php require_once '../../app/include/sidebar-admin.php';?>
<!-- sidebar end -->

<div class="posts col-10">

<!-- <div class="row title-table">
  <h2>Карта учителя</h2>
  <div class=" col-1">ID</div>
  <div class=" col-1">ФИО</div>
  <div class="  col-1">класс</div>
  <div class="  col-4">Email<div>
  <div class="  col-2">Адрес</div>
  <div class="  col-2">Телефон</div>
</div>

<?php //foreach($teachers as $key=>$teacher){ ?>
<div class="row post">
  <div class="id col-1"><?//=$teacher['id'] ?></div>
  <div class="id col-2"><a href=""><?//=$teacher['name'] ?></a></div>
  <div class="title  col-1"><?//= $teacher['number'].'-'.$teacher['letter'] ?></div>
  <div class="del col-1"><a href="edit.php?id=<?//=$teacher['id']?>">edit</a></div>
  <div class="del col-2"><a href="index.php?id_delete=<?//=$teacher['id']?>">delete</a></div>
  <div class="title  col-4"><a href="info.php?id_inf=<?//=$teacher['id']?>">>>>></a></div>
</div>
<?php //} ?> -->



<!-- <div class="row post">
  <div class="id col-1">1</div>
  <div class="id col-2"><a href=''>Петров Петр Петрович</a></div>
  <div class="title  col-1">1-Б</div>
  <div class="del col-1"><a href="">edit</a></div>
  <div class="del col-2"><a href="">delete</a></div>
  <div class="title  col-4"><a href="">>>>></a></div>
</div> -->

<table class="table "><thead>

<tr>

<th scope="col">ID</th>
<th scope="col">ФИО </th>
<!-- <th scope="col">класс </th> -->
 <th scope="col">Email</th> 
 <th scope="col">Адрес</th> 
 <th scope="col">Телефон</th> 
 <th scope="col"></th> 

</tr>

    
<tr>

<th scope="col"><?=$id?></th>
<th scope="col"><?=$name?> </th>
<!-- <th scope="col"><? //=$number .'-'.$letter?> </th> -->
 <th scope="col"><?=$email?></th> 
 <th scope="col"><?=$address?></th> 
 <th scope="col"><?=$phon_number?></th> 
 <th scope="col"></th> 

</tr>


</thead>

 <tbody>

<?php 


// foreach ($teachers as $teacher) {
   // Получаем имя учителя
//    $teacherName = $teacher['pip'];
 
//    // Получаем класс, в котором учитель руководит
//    $classId = $teacher['class_id'];
//    $teacherId = $teacher['id'];
//    $className = 'Класс не назначен'; // Значение по умолчанию
 
//    if ($classId !== null) {
//      // Если class_id не равен null, значит, учитель назначен к какому-то классу
//      // Мы ищем соответствующий класс в таблице classes
//      $classParams = [
//        'id' => $classId,
//      ];
//      $class = selectOne('classes', $classParams);
 
//      if ($class) {
//        $className = $class['class'] . '-' . $class['lit'];
//      }
//    }
 
//    // Выводим данные в таблицу
 
?>

<!-- <tr><th scope="row"><?=$n?></th>
<td><?= $teacherName ?></td>
<td><?= $className ?></td>
<td><form action="../modal.php" method="post">
<input type="hidden" name="teacher_id"  value="<?= $teacherId ?>"><!-- // Скрытое поле с id учителя -->
<!-- <input type='submit' name="delete_teacher" value ='удалить '>
<input type='submit' value =' изменить '>
</form>
</td>
</tr> -->
<?php
//  $n++; -->
// }


// tt($_POST);

?>
</tbody></table>



</div>
</div>



<!-- footer -->

   <?php require_once '../../app/include/footer.php';?>
<!-- footer end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1d9689321f.js" crossorigin="anonymous"></script>

   </body>
</html>
