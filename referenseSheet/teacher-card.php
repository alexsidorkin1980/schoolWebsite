<?php
session_start();

// Перевiрка наявностi ролi в сесii
if (!isset($_SESSION['role'])) {
    header('Location:login.php');
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
  
   </head>
  <body>
   <!-- header  -->
   <?php require_once '../app/include/header.php';?>
<!-- header end -->
<?php
require_once '../app/database/connect.php';//пiдключення до бази
 require_once '../app/database/db.php';//пiдключення до бази

 // запрос на комбобокс с учителями
 $sql_teach = "SELECT * FROM `teachers` ";
// $result_teach = mysqli_query($db, $sql_teach);
// $sb = mysqli_fetch_all($result_teach);
// подготовка запроса
$stmt = $pdo->prepare($sql_teach);
 // Выполнение запроса
 $stmt->execute();
 // проверка на ошибки
 dbCheckError($stmt);
 // Получение результата
 $st = $stmt->fetchAll();
//  echo '<pre>';
//  print_r($st);

if (!empty($st) && isset($st[0])) {
  $items = $st[0];
  $id = $items['id'];
  $pip = $items['pip'];
  $class_id = $items['class_id'];
}




// запрос на комбобокс с классами


 
//  echo '<pre>';
//  print_r($id);
//  exit();
// $result = mysqli_query($db, $sql);
// $s = mysqli_fetch_all($result);



?>

<!-- блок main start  -->
<div class="container">
    <div class="content row">
        <!-- блок main start  -->
<!-- блок main content    -->
<div class="main-content col-md-9 col-12">
        <!-- блок main content    --> 
  
     <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

Modal
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
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




