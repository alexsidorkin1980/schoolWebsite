
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
   <?php require_once '../app/include/header.php';?>
<!-- header end -->
<?php
require_once '../app/database/connect.php';//пiдключення до бази
 require_once '../app/database/db.php';//пiдключення до бази

//  $db = connectDb($BD);//під'єднання до бази

 //рядок з  запитом до бази на класс
 $sql = "SELECT * FROM `classes` WHERE `graduate` IS NULL ORDER BY `classes`.`class` ASC";
 // $result = mysqli_query($db, $sql);//виконання запиту до бази
 // $s = mysqli_fetch_array($result);//результат виконання запиту повернути до ассаціативного масиву	
 $stmt = $pdo->prepare($sql);
  // Выполнение запроса
  $stmt->execute();
  // проверка на ошибки
  dbCheckError($stmt);
  // Получение результата
  $s = $stmt->fetchAll();
 
 
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
       if (isset($_POST['Combobox1']) and $_POST['Combobox1'] == $id)
       $look = $look."<option selected value='".$id."'>".$class."-".$lit."</option>"; 
    else 
    $look = $look."<option value='".$id."'>".$class."-".$lit."</option>";        
 
     }
 // while ($s=mysqli_fetch_array($result));	
 
 //додаю закінчення комбобоксу 
 
 $look = $look."</select>
 
 <button type='submit' style='position:absolute;top:355px;left:770px;'>Пошук</button>
     </form>";

 if (isset($_POST['Combobox1']))
      {
         //рядок з  запитом до бази учитель класса
         $sql_t = "SELECT * FROM `teachers` WHERE `class_id` = ".$_POST['Combobox1'];
       
        //  $result = mysqli_query($db, $sql);//виконання запиту до бази
        //  $s = mysqli_fetch_array($result);//результат виконання запиту повернути до ассаціативного масиву
        $stmt1 = $pdo->prepare($sql);
        // Выполнение запроса
        $stmt1->execute();
        // проверка на ошибки
        dbCheckError($stmt1);
        // Получение результата
        $st = $stmt1->fetchAll();
       


   
           
    //   echo$look1.="
    //   <tr>
    //   <td class='cell0'><p style='font-size:13px;line-height:16px;color:#000000;'>
    //   <span style='color:#000000;'>&nbsp;</span><span style='font-family:Segoe UI Symbol;color:#000000;'>".$n++."</span></p></td>
    //   <td class='cell1'><p style='font-size:13px;line-height:16px;color:#000000;'>
    //   <span style='color:#000000;'>&nbsp;</span><span style='color:#000000;'>".$pip."</span></p></td>
    //   <td class='cell2'><p style='font-size:13px;line-height:16px;color:#000000;'>
    //   <span style='color:#000000;'>&nbsp;</span><span style='color:#000000;'>".$dn."</span></p></td>
    //   </tr>
    //   ";
      }      
// }     



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

<div style="z-index:1;"><?=$look?></div>

<div style="text-align:center;">
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

  // запрос на учня
  $sql_boy = "SELECT * FROM `schoolboys` WHERE `id_classes` = ".$_POST['Combobox1'];
       
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
         $id = $item['id'];
         $pip = $item['pip'];
         $dn=$item['dn'];
         $class_id = $item['id_classes'];
         $graduate = $item['graduate'];	
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
<div id="wb_Text1" style="position:absolute;left:42px;top:78px;width:446px;height:15px;z-index:5;">
<span style="color:#000000;font-family:Arial;font-size:13px;"> <?php if (isset($pip)) {
    echo 'Класний керівник: ' . $pip;
} else {
    echo 'Класний керівник не найден';
}?></span></div>  

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




