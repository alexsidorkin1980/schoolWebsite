
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
  <link rel="stylesheet" href="/assets/css/library_fund.css">
  
   </head>
  <body>
  <?php require_once '../app\include\access-check.php';?>
   <!-- header  -->
   <?php require_once '../app/include/header.php';?>
<!-- header end -->
<?php
require_once '../app/database/connect.php';//пiдключення до бази
 require_once '../app/database/db.php';//пiдключення до бази

//  // запрос на комбобокс с учителями
//  $sql = "SELECT * FROM `library` ";
// // $result_teach = mysqli_query($db, $sql_teach);
// // $sb = mysqli_fetch_all($result_teach);
// // подготовка запроса
// $stmt = $pdo->prepare($sql);
//  // Выполнение запроса
//  $stmt->execute();
//  // проверка на ошибки
//  dbCheckError($stmt);
//  // Получение результата
//  $st = $stmt->fetchAll();
// //  echo '<pre>';
// //  print_r($st);

// if (!empty($st) && isset($st[0])) {
//   $items = $st[0];
//   $id = $items['id'];
//   $pip = $items['pip'];
//   $class_id = $items['class_id'];
// }

// $count=1;



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
  
        <div class="table-content">

        

        <h1 >Бiблiотечний фонд</h1> 
   
          <table class="table">
          
    <thead>
      <tr>
        <th scope="col">№</th>
        <th scope="col">інв. номер</th>
        <th scope="col">назва книги</th>
        <th scope="col">місце знаходження</th>
       
      </tr>

      <?php
      $n=1;
      $class = ''; // По умолчанию пустая строка
      $lit = '';   // По умолчанию пустая строка
      $text='';
//     foreach ($st as $items) {

// $id = $items['id'];
// // $pip = $items['pip'];
// // $class_id = $items['class_id'];

// $sql = "SELECT * FROM `classes` WHERE `graduate` IS NULL  AND `id` ='$id' ORDER BY `class` ASC";//вибираемо всi рядки окрiм полей з graduate  
// // подготовка запроса
// $stmt = $pdo->prepare($sql);
//  // Выполнение запроса
//  $stmt->execute();
//  // проверка на ошибки
//  dbCheckError($stmt);
//  // Получение результата
//  $s = $stmt->fetchAll();

 $n=1;

// do{
  $sql = "SELECT * FROM `library` ";
// подготовка запроса
$stmt = $pdo->prepare($sql);
 // Выполнение запроса
 $stmt->execute();
 // проверка на ошибки
 dbCheckError($stmt);
 // Получение результата
 $s = $stmt->fetchAll();


  foreach ($s as $item) {

    $id = $item['id'];
    $inv_number = $item['inv_number'];
    $name_book = $item['name_book'];
    $id_schoolboys = $item['id_schoolboys'];
    $id_teachers = $item['id_teachers'];
    $return_date = $item['return_date'];
    $borrow_date = $item['borrow_date'];
    


  if(!empty($id_schoolboys)&&empty($id_teachers)){
    $sql_boy = "SELECT * FROM `students` WHERE `id`='$id_schoolboys'";
    // подготовка запроса
     $stmt = $pdo->prepare($sql_boy);
    // Выполнение запроса
     $stmt->execute();
    // проверка на ошибки
    dbCheckError($stmt);
    // Получение результата
    $sb = $stmt->fetch();

    // $item = $sb[0];
    $id = $sb['id'];
    
    $name=$sb['name'].' (student)';
    // $dn = $item['dn'];
    // $id_classes = $item['id_classes'];
    // $graduate = $item['graduate'];
    // $name=$st['pip'].' (schoolboys)';
    
  }
  
  if(empty($id_schoolboys)&&!empty($id_teachers)){
    $sql_teach = "SELECT * FROM `teachers` WHERE `id`=' $id_teachers'";
    // подготовка запроса
    $stmt = $pdo->prepare($sql_boy);
    // Выполнение запроса
    $stmt->execute();
   // проверка на ошибки
   dbCheckError($stmt);
   // Получение результата
    $st = $stmt->fetchAll();

    // $result_teach = mysqli_query($db, $sql_teach);
    // $st = mysqli_fetch_array($result_teach);
    // $name=$st['pip'].' (teacher)';
    $item = $st[0];
    $id = $item['id'];
    
    $name=$item['name'].' (teacher)';
  }
  
  if(!empty( $return_date)||empty( $return_date)&&empty($borrow_date)){
    
    $name='Книга в бiблiотецi!';
    
  }
  $inv = $inv_number; 
  

   ?>     
   
   <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">картка книги</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<?php
      //получаемо iнв.номер 
// if (isset($_GET['inv_number'])) {
//   $inv = $_GET['inv_number'];

// $db = connectDb($BD);
$sql = "SELECT * FROM `library`WHERE `inv_number`= ' $inv ' ";
// $result = mysqli_query($db, $sql);
// $s = mysqli_fetch_array($result);

 // подготовка запроса
 $stmt = $pdo->prepare($sql_boy);
 // Выполнение запроса
 $stmt->execute();
// проверка на ошибки
dbCheckError($stmt);
// Получение результата
 $sm = $stmt->fetchAll();

    $item = $sm[0];
    $id = $item['id'];
    // $id_schoolboys = $item['id_schoolboys'];
    // $id_teachers = $item['id_teachers'];
    
    
//визначаемо учня
if(!empty($id_schoolboys)&&empty($id_teachers )){
  $sql_boy = "SELECT * FROM `student` WHERE `id`='$id_schoolboys '";
  // $result_boy = mysqli_query($db, $sql_boy);
  // $sb = mysqli_fetch_array($result_boy);
  // $name=$sb['pip'].' (student)';//додаемо до пiп пояснення учень 

  // подготовка запроса
 $stmt = $pdo->prepare($sql_boy);
 // Выполнение запроса
 $stmt->execute();
// проверка на ошибки
dbCheckError($stmt);
// Получение результата
 $sms = $stmt->fetchAll();
 $item = $sms[0];
    $id = $item['id'];
  $name=$item['name'].' (schoolboys)';
}
//визначаемо учителя
if(empty($id_schoolboys)&&!empty($id_teachers )){
  $sql_teach = "SELECT * FROM `teachers` WHERE `id`='$id_teachers'";
  // $result_teach = mysqli_query($db, $sql_teach);
  // $st = mysqli_fetch_array($result_teach);
  // $name=$st['pip'].' (teacher)';//додаемо до пiп пояснення учитель
  // подготовка запроса
 $stmt = $pdo->prepare($sql_boy);
 // Выполнение запроса
 $stmt->execute();
// проверка на ошибки
dbCheckError($stmt);
// Получение результата
 $sms = $stmt->fetchAll();
 $item = $sts[0];
    $id = $item['id'];
  $name=$item['name'].' (teacher)';
}
?>

 <div style="background-color:grey;border:2px solid black;color:blue;text-align:center;
 width:450px;hight:600px;z-index:6;padding: 20px;font-size:20px;">
  <p style="margin-bottom: 50px; "><h1>дата видачі:   <span><?=$borrow_date;?></span> </h1></p>
  <p style="margin: 50px; "><h1>кому видана: <span><?php if($borrow_date==null)
  echo'Книга в библиотеке!!';
  else
  echo$name;?></span> </h1></p>
  <p style="margin: 50px; "><h1>дата повернення: <span><?=$return_date;?></span> </h1></p>
</div> 



<?php

?>
</div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary">Сохранить изменения</button>
      </div>
    </div>
  </div>
</div>  
<!-- Modal end -->

    </thead>
    <tbody>
      <tr>
        <th scope="row"><?=$n;?></th>
        <td><a href=""><?=$inv_number;?></a></td>
        <td><a type="button" class="but" data-bs-toggle="modal"
         data-bs-target="#exampleModal"><b?><?=$name_book?></b></a></td>
      
        <td><?=$class;?>-<?=$name?></td>
        <!-- <span>  -->
          <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Изменить
</button> -->
<!-- Button trigger modal end -->
<!-- </span></td> -->
    </tbody>
    <?php
    $n++;
    }
  ?>
  </table>

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




