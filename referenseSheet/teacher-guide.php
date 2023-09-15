
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
  <?php require_once '../app\include\access-check.php';?>
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
  
        <div class="table-content">

        

        <h1 >Довідник учителів</h1> 
   
          <table class="table">
          
    <thead>
      <tr>
        <th scope="col">№</th>
        <th scope="col">ПiП</th>
        <th scope="col">Керiвник класу:</th>
        <th scope="col"></th>
       
      </tr>

      <?php
      $n=1;
      $class = ''; // По умолчанию пустая строка
      $lit = '';   // По умолчанию пустая строка
      $text='';
    foreach ($st as $items) {

$id = $items['id'];
$pip = $items['pip'];
$class_id = $items['class_id'];

$sql = "SELECT * FROM `classes` WHERE `graduate` IS NULL  AND `id` ='$id' ORDER BY `class` ASC";//вибираемо всi рядки окрiм полей з graduate  
// подготовка запроса
$stmt = $pdo->prepare($sql);
 // Выполнение запроса
 $stmt->execute();
 // проверка на ошибки
 dbCheckError($stmt);
 // Получение результата
 $s = $stmt->fetchAll();

 if (!empty($s) && isset($s[0])) {
  $item = $s[0];
  $id1= $item['id'];
  $class = $item['class'];
  $lit = $item['lit'];
  $graduate = $item['graduate'];
}else $text='нет класса';

$sql = "SELECT * FROM `classes` WHERE `graduate` IS NULL  ORDER BY `class` ASC";
// подготовка запроса
$stmt = $pdo->prepare($sql);
 // Выполнение запроса
 $stmt->execute();
 // проверка на ошибки
 dbCheckError($stmt);
 // Получение результата
 $sm = $stmt->fetchAll();

$look = "
<select name='Combobox1' size='1' id='Combobox1'
 style='position:absolute;left:177px;top:0px;width:156px;height:28px;z-index:10'>";
//перебираю отриманий масив		
        foreach ($sm as $item) {

            $id1 = $item['id'];
            $class1 = $item['class'];
            $lit1 = $item['lit'];
            $graduate1 = $item['graduate'];
        
        //з кожного запису масиву будую рядок мого комбобоксу
		if (isset($_POST['Combobox1']) and $_POST['Combobox1'] == $id1 )
			$look = $look."<option selected value='".$id1 ."'>".$class1."-".$lit1."</option>"; 
		else 
		$look = $look."<option value='".$id1 ."'>".$class1."-".$lit1."</option>";        
	} 	

//додаю закінчення комбобоксу 
$look = $look."</select>";
   
   ?>     
   
   <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">выберите класс</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?=$look;?>
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
        <td><a href=""><?=$pip;?></a></td>
        <td><?=$class;?>-<?=$lit?></td>
        <td><span> 
          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Изменить
</button>
<!-- Button trigger modal end -->
</span></td>
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




