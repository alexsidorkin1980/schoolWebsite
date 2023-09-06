<?php
session_start();
// Перевiрка наявностi ролi в сесii
if (!isset($_SESSION['role'])) {   
    header('Location: login.php');
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

require_once '../index.php';
?>
<div id="wb_Form1" style="position:absolute;left:100px;top:119px;width:733px;height:447px;z-index:13;">
<form name="Form1" method="post" action="" enctype="multipart/form-data" id="Form1">
<div id="wb_Heading1" style="position:absolute;left:113px;top:16px;width:484px;height:39px;z-index:4;">
<h1 id="Heading1">Довідник учителів</h1></div>



<table style="position:absolute;left:39px;top:66px;width:655px;height:220px;z-index:5;" id="Table1">

<tr>
<td class="cell0"><p style="font-size:13px;line-height:16px;color:#000000;">
<span style="color:#000000;">&nbsp;</span><span style="font-family:Segoe UI Symbol;color:#000000;">№</span></p></td>
<td class="cell1"><p style="font-size:13px;line-height:16px;color:#000000;">
<span style="color:#000000;">&nbsp;</span><span style="color:#000000;">ПІП</span></p></td>
<td class="cell2"><p style="font-size:13px;line-height:16px;color:#000000;">
<span style="color:#000000;">&nbsp;</span><span style="color:#000000;">Класний керівник</span></p></td>
</tr>

<?php

require_once '../app/database/connect.php';// пiдключення до бази
require_once '../app/database/db.php';//пiдключення до бази
$text='';//для виводу тексту

// $db = connectDb($BD);

// запрос на комбобокс с классами
$sql = "SELECT * FROM `classes` WHERE `graduate` IS NULL ORDER BY `class` ASC";//вибираемо всi рядки окрiм полей з graduate  
// подготовка запроса
$stmt = $pdo->prepare($sql);
 // Выполнение запроса
 $stmt->execute();
 // проверка на ошибки
 dbCheckError($stmt);
 // Получение результата
 $s = $stmt->fetchAll();

//  echo '<pre>';
//  print_r($s);
// $result = mysqli_query($db, $sql);
// $s = mysqli_fetch_all($result);


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

//вiдправляе якщо метод post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  foreach ($st as $item) {
    $id = $item['id'];
    $pip = $item['pip'];
    $class_id = $item['class_id'];
   


      $n = $id; // використовую id таблицi classes для комбобоксу

      if (isset($_POST['Combobox' . $n])) {
          $selectedValue = $_POST['Combobox' . $n];// отримання введеного значення
          

         // try {//обробки винятків
              //змiнюю class_id в таблицi
              // $existance = "UPDATE `teachers` SET `class_id` ";
              //$result_update = mysqli_query($db, $sql_update);= '$selectedValue' WHERE `id` = $n
              update('teachers',$id,['class_id'=>$selectedValue]);
              
              $existance=selectOne('teachers',['class_id'=>$class_id]);

              if($existance &&$existance['class_id']===$class_id){
                $text= "В цьому класi вже э вчитель ";
                
                

              }

              // Выполнение запросаelse {
              // $stmt->execute();
              // // проверка на ошибки
              // dbCheckError($stmt);
              // Получение результата
              // $st = $stmt->fetchAll();      
          } 



          // catch (mysqli_sql_exception $e) {
          //     // Проверка на ошибку дублирования записи
          //     if (strpos($e->getMessage(), "Duplicate entry") !== false) {
          //       $text= "В цьому класi вже э вчитель ";}
          // }
      }
  }
// }

if (!empty($_POST)) {
	foreach ($_POST as $key => $selectedValue) {//перекидаемо з post в ассоцiативний массив
		$_SESSION[$key] = $selectedValue; // збереження значень в сессii
	}
  }
?>


  <?php $n=1;
         foreach($st as $item){//таблиця

    $id = $item['id'];
    $pip = $item['pip'];
    $class_id = $item['class_id'];
    ?>


<tr>
<td class="cell3"><p style="font-size:13px;line-height:16px;color:#000000;">
    <span style="color:#000000;">&nbsp;</span><span style="color:#000000;"><?php echo $n; //порядковий номер?></span></p></td>
    
    <td class="cell4"><p style="font-size:13px;line-height:16px;color:#000000;"><span 
style="color:#000000;">&nbsp;</span><span style="color:#000000;"><?php echo  $pip; //пiп?></span></p></td>
   
    <td>




<!-- // комбобокс класса -->
    <select name='Combobox<?php echo $n ?>'style="display:block;width: 100%;height:28px;z-index:2;" size='1'>
      
      
      <?php
      // $result = mysqli_query($db, $sql); 


      // while ($s = mysqli_fetch_array($result)) { //зберiгаю значення комбобоксу в сесii

        foreach ($s as $item) {
              $id = $item['id'];
              $class = $item['class'];
              $lit = $item['lit'];
              $graduate = $item['graduate'];

        if (isset($_SESSION['Combobox' . $n]) && $_SESSION['Combobox' . $n] == $id) {
      ?>
          <option selected value='<?php echo $id; ?>'><?php echo $class; ?>-<?php echo $lit; ?></option>

        <?php
        } else {
        ?>
          <option value='<?php echo $id; ?>'><?php echo $class; ?>-<?php echo $lit; ?></option>
        <?php
        }      
      }


      ?>
    </select><br>



    
    </td>

  <?php 
     $n++;
       }       
              ?>

</tr>

</table>






<input type="submit" id="Button1" name="" value="Підтвердити" style="position:absolute;left:241px;top:314px;width:96px;height:25px;z-index:6;">
<input type="reset" id="Button2" name="" value="Відміна" style="position:absolute;left:404px;top:314px;width:96px;height:25px;z-index:7;">
</form>
<h2 style="color:red;position:absolute;left:404px;top:414px;"><?=$text?></h2>
</div>
</body>
</html>