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

require_once'index.php';
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
require_once 'connect.php';// пiдключення до бази
$db = connectDb($BD);
$text='';//для виводу тексту
$sql = "SELECT * FROM `classes` WHERE `graduate` IS NULL ORDER BY `class` ASC";

//вибираемо всi рядки окрiм полей з graduate   

$result = mysqli_query($db, $sql);
$s = mysqli_fetch_all($result);

$sql_teach = "SELECT * FROM `teachers` ";
$result_teach = mysqli_query($db, $sql_teach);
$sb = mysqli_fetch_all($result_teach);


//вiдправляе якщо метод post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  foreach ($s as $row) {
      $n = $row[0]; // використовую id таблицi classes для комбобоксу
      if (isset($_POST['Combobox' . $n])) {
          $selectedValue = $_POST['Combobox' . $n];// отримання введеного значення
          

          try {//обробки винятків
              //змiнюю class_id в таблицi
              $sql_update = "UPDATE `teachers` SET `class_id` = '$selectedValue' WHERE `id` = $n";
              $result_update = mysqli_query($db, $sql_update);
                       
          } catch (mysqli_sql_exception $e) {
              // Проверка на ошибку дублирования записи
              if (strpos($e->getMessage(), "Duplicate entry") !== false) {
                $text= "В цьому класi вже э вчитель ";}
          }
      }
  }
}

if (!empty($_POST)) {
	foreach ($_POST as $key => $selectedValue) {//перекидаемо з post в ассоцiативний массив
		$_SESSION[$key] = $selectedValue; // збереження значень в сессii
	}
  }
?>


  <?php $n=1;
        foreach($sb as $row){//таблиця
    ?>

<tr>
<td class="cell3"><p style="font-size:13px;line-height:16px;color:#000000;">
    <span style="color:#000000;">&nbsp;</span><span style="color:#000000;"><?php echo $n; //порядковий номер?></span></p></td>
    
    <td class="cell4"><p style="font-size:13px;line-height:16px;color:#000000;"><span 
style="color:#000000;">&nbsp;</span><span style="color:#000000;"><?php echo  $row[1]; //пiп?></span></p></td>
   
    <td>
    <select name='Combobox<?php echo $n ?>'style="display:block;width: 100%;height:28px;z-index:2;" size='1'>
      <?php
      $result = mysqli_query($db, $sql); 
      while ($s = mysqli_fetch_array($result)) { //зберiгаю значення комбобоксу в сесii
        if (isset($_SESSION['Combobox' . $n]) && $_SESSION['Combobox' . $n] == $s[0]) {
      ?>
          <option selected value='<?php echo $s[0]; ?>'><?php echo $s[1]; ?>-<?php echo $s[2]; ?></option>
        <?php
        } else {
        ?>
          <option value='<?php echo $s[0]; ?>'><?php echo $s[1]; ?>-<?php echo $s[2]; ?></option>
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