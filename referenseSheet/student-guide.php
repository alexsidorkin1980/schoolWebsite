
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
  <link rel="stylesheet" href="/assets/css/student-guide.css">

   </head>
  <body>
  <?php require_once '../app\include\access-check.php';?>
   <!-- header  -->
   <?php require_once '../app/include/header.php';?>
<!-- header end -->
<?php
require_once '../app/database/connect.php';//пiдключення до бази
 require_once '../app/database/db.php';//пiдключення до бази
 $look1='';$text='';
 // $db = connectDb($BD);//під'єднання до бази
 
 //рядок з  запитом до бази
 // $sql = "SELECT * FROM `classes` WHERE `graduate` IS NULL ORDER BY `class` ASC";
 //$sql = "SELECT * FROM `classes` ORDER BY `classes`.`class` ASC";//пiдключаемо таблицю classes,
 // упорядковуючи за зростанням ,до комбобоксу
 
 // $result = mysqli_query($db, $sql);//виконання запиту до бази
 // $s = mysqli_fetch_array($result);//результат виконання запиту повернути до ассаціативного масиву
 $sql = "SELECT * FROM `classes` WHERE `graduate` IS NULL ORDER BY `class` ASC";//вибираемо всi рядки окрiм полей з graduate  
 // подготовка запроса
 $stmt = $pdo->prepare($sql);
  // Выполнение запроса
  $stmt->execute();
  // проверка на ошибки
  dbCheckError($stmt);
  // Получение результата
  $s = $stmt->fetchAll();
 
 
 //створюемо комбобокс з классами
 $look = " 
 <form action='' method='post'>
 <select name='Combobox1' size='1' id='Combobox1' 
 style='position:absolute;left:630px;top:350px;width:99px;height:28px;z-index:13;margin:0 0 30px'>";//будую шапку комбобоксу
 //перебираю отриманий масив
 // do
 // 	{	
   foreach ($s as $item) {
     $id = $item['id'];
     $class = $item['class'];
     $lit = $item['lit'];
     $graduate = $item['graduate'];	
         //з кожного запису масиву будую рядок мого комбобоксу   
       if (isset($_POST['Combobox1']) and $_POST['Combobox1'] ==  $id)
       $look .="<option selected value='". $id."'>".$class ."-".$lit."</option>"; 
    else 
    $look .="<option value='". $id."'>".$class ."-".$lit."</option>";        
 
   }
 // while ($s=mysqli_fetch_array($result));	
 
 $look .="</select>
 
 
 <button type='submit' style='position:absolute;top:355px;left:770px;'>Пошук</button>
 </form>";
 // echo $look; exit();

//  echo$_POST['Combobox1']; exit();

echo$num_class = isset($_POST['Combobox1']) ? $_POST['Combobox1'] : null;
// // exit();
//  //рядок з  запитом до бази
$sql_sch = "SELECT * FROM  `schoolboys` WHERE `graduate` IS NULL AND `id_classes` = '$num_class'";//повернути всі поля з таблицi schoolboys
// if (isset($_POST['Combobox1'])) {
//   $num_class = $_POST['Combobox1'];
//   // Теперь вы можете выполнить SQL-запрос
//   $sql_sch = "SELECT * FROM  `schoolboys` WHERE `graduate` IS NULL AND `id_classes` = $num_class";
//   // ...
// } else {
//   echo "Выберите класс из комбобокса.";
// }


// $sql_sch = "SELECT * FROM  `schoolboys` WHERE `graduate` IS NULL ";//повернути всі поля з таблицi schoolboys

// $result1 = mysqli_query($db, $sql_sch);//виконання запиту до бази
// $st = mysqli_fetch_array($result1);//результат виконання запиту повернути до ассаціативного масиву
$stmt = $pdo->prepare($sql_sch);
// Выполнение запроса
$stmt->execute();
// проверка на ошибки
dbCheckError($stmt);
// Получение результата
$sp = $stmt->fetchAll();


//створюемо комбобокс з пiп учнiв
//  $look1= "

//  <select name='Combobox2' size='1' id='Combobox1'style='width:474px;height:28px;z-index:3;'>";
// // do
// // 	{		
//   foreach ($sp as $item) {
//     $id = $item['id'];
//     $pip = $item['pip'];
//     $dn=$item['dn'];
//     $class_id = $item['id_classes'];
//     $graduate = $item['graduate'];	
//         //з кожного запису масиву будую рядок мого комбобоксу   ."-".$s[lit''].
//       if (isset($_POST['Combobox2']) and $_POST['Combobox2'] == $id)
//       $look1 .="<option selected value='".$id."'>".$pip."</option>"; 
//    else 
//    $look1 .="<option value='".$id."'>".$pip."</option>";        

// 	}
// // while ($st=mysqli_fetch_array($result1));	
//  $look1 = $look1."</select>";




$sql_sch = "SELECT * FROM  `schoolboys` WHERE `graduate` IS NULL ";
$stmt = $pdo->prepare($sql_sch);
// Выполнение запроса
$stmt->execute();
// проверка на ошибки
dbCheckError($stmt);
// Получение результата
$spu = $stmt->fetchAll();
// foreach ($sp as $item) {
  $item = $spu[0];
  $id = $item['id'];
  $pip = $item['pip'];
  $dn = $item['dn'];
  $id_classes = $item['id_classes'];
  $graduate = $item['graduate'];

//знаходимо рядки  в таблицi з книгами якi взяв учень по id_schoolboys
$sql_piple = "SELECT * FROM `library` WHERE `id_schoolboys`='$num_class' ";//AND `id_classes`=$num_class
//    $result_li = mysqli_query($db, $sql_lib);//виконання запиту до бази
//    $sl = mysqli_fetch_array($result_li);

$stmtp = $pdo->prepare($sql_piple);
// Выполнение запроса
$stmtp->execute();
// проверка на ошибки
dbCheckError($stmt);
// Получение результата
$spl = $stmtp->fetchAll();
//  print_r($spl);
?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Перелік бібліотечних книжок:</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <table class="table">
  <thead>
    <tr>
      <th scope="col">№</th>
      <th scope="col">Назва</th>
      <th scope="col">iнв.№</th>
      <th scope="col">дата отримання</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $i=1;
    foreach ($spl as $item) {
  
  $id = $item['id'];
  $inv_number = $item['inv_number'];
  $name_book = $item['name_book'];
  $data_edition = $item['date_edition'];
  $borrow_date = $item['borrow_date'];
  $return_date = $item['return_date'];
  $id_teachers = $item['id_teachers'];
  $id_schoolboys = $item['id_schoolboys'];
  ?>
    <tr>
      <th scope="row"><?=$i;?></th>
      <td><?=$name_book;?></td>
      <td><?=$inv_number;?></td>
      <td><?=$borrow_date;?></td>
    </tr>

    <?php $i++;}?>
    <!-- <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr> -->
  </tbody>
</table>

        <!-- ... -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>  

<!-- блок main start  -->
<div class="container">
    <div class="content row">
        <!-- блок main start  -->
<!-- блок main content    -->
<div class="main-content col-md-9 col-12">
        <!-- блок main content   position:absolute;left:207px;top:150px; --> 
        <div class="table-content">
        <!-- <div id="wb_Heading1" class="dv" style="width:484px;height:39px;z-index:1;"> -->
<h1 >Картка учня</h1>
<!-- </div> -->
<div class="dv">виберiть класс </div>
<div style="z-index:1;margin-left:100px;"><?=$look?></div>
<!--   style="width:584px;height:39px;z-index:1;margin-left:100px;"-->
       <div style="text-align:center;">
          <table class="table">
    <thead>
      <tr>
        <th scope="col">№</th>
        <th scope="col">ПIП</th>
        <td>Дата народження</td>
        <!-- <td>Учень класу:</td> -->
        <!-- <td>@fat</td> -->
      </tr>
    </thead>
  <?php 
  $i=1;
    foreach ($sp as $item) {
  
  $id = $item['id'];
  $pip = $item['pip'];
  $dn = $item['dn'];
  $id_classes = $item['id_classes'];
  $graduate = $item['graduate'];
  ?>
    <tbody>
      <tr>
        <th scope="row"><?=$i;?></th>
        <td><a type="button" class="but" data-bs-toggle="modal" data-bs-target="#exampleModal"><b><?=$pip;?></b></a></td>
        <td><?=$dn;?></td>
        <!-- <td><?=$i;?></td> -->
        <!-- <td>@fat</td> -->
      </tr>
      <!-- <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
      </tr> -->
    </tbody>
    <?php $i++;}?>
  </table>
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




