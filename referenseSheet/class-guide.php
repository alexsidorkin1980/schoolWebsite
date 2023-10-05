
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
  <link rel="stylesheet" href="/assets/css/class-guide.css">

   </head>
  <body>
  <?php require_once '../app\include\access-check.php';?>
   <!-- header  -->
   <?php   require_once '../app/include/header.php';?>
<!-- header end -->
<?php
require_once '../app/database/connect.php';//пiдключення до бази
 require_once '../app/database/db.php';//пiдключення до бази

 require_once '..\app\include\combobox-check.php';
 
 $text='';
     $id_class=isset($_POST['Combobox1'])?$_POST['Combobox1']:null; 
 if (isset($_POST['Combobox1']))
      {
       
         
         //рядок з  запитом до бази учитель класса
         $st = selectOne('teachers',['class_id'=>$id_class]);
         $id = $st['id'];
         $pip = $st['pip'];
         $class_id = $st['class_id'];

if (isset($pip)) {
  $text='Класний керівник: ' . $pip;
} else {
  $text= 'Класний керівник не найден';
}
      }     
   
?>

<!-- блок main start  -->
<div class="container">
    <div class="content row">
        <!-- блок main start  -->
<!-- блок main content    -->
<div class="main-content col-md-9 col-12">
        <!-- блок main content   position:absolute;left:207px;top:150px; --> 
        <div class="table-content">
        <!-- <div id="wb_Heading1" style="position:absolute;left:480px;top:15px;width:380px;height:39px;z-index:2;"> -->
<h1 id="Heading1">Довідник класу</h1>
<!-- </div>   -->
<div class="dv">виберiть класс </div>

<div><?=$look?></div>

<div style="text-align:center;">

 <div id="wb_Text1" style="width:446px;height:15px;z-index:5;"> 
<span style=" position:absolute;left:327px;top:430px;color:red;font-family:Arial;font-size:16px;"> <?=$text?></span>
</div>
        <table class="table">

       

  <thead>
    <tr>
      <th scope="col">№</th>
      <th scope="col">Прiзвище та iм'я</th>
      <th scope="col">Дата народження</th>
      <!-- <th scope="col">Handle</th> -->
    </tr>
  </thead>

  <?php 
  // tt($id_class);
  //exit();
  // запрос на учня
  // $sb = selectAll('schoolboys',['id_classes'=>2]);
      //  tt($sb);
      //   exit();
  $sql_boy = "SELECT * FROM `schoolboys` WHERE `id_classes` = ".$id_class;
       
  //    $result_boy = mysqli_query($db, $sql_boy);//виконання запиту до бази
  //   $sb = mysqli_fetch_all($result_boy);//результат виконання запиту повернути до ассаціативного масиву
  $stmt2 = $pdo->prepare($sql_boy);
  // Выполнение запроса
  $stmt2->execute();
  // проверка на ошибки
  dbCheckError($stmt2);
  // Получение результата
  $sb = $stmt2->fetchAll();
        $n=1;

        foreach ($sb as $item) {
        //  $id = $item['id'];
         $pip = $item['pip'];
         $dn=$item['dn'];
        //  $class_id = $item['id_classes'];
        //  $graduate = $item['graduate'];	
         ?>
   <tbody>

    <tr>
      <th scope="row"><?=$n;?></th>
      <td><?=$pip;?></td>
      <td><?=$dn;?></td>
      <!-- <td>@mdo</td> -->
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
  <?php $n++;}?>
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




