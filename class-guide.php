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

require_once'index.php';
require_once'connect.php';
$look1='';
$db = connectDb($BD);//під'єднання до бази

//рядок з  запитом до бази
$sql = "SELECT * FROM `classes` WHERE `graduate` IS NULL ORDER BY `classes`.`class` ASC";
$result = mysqli_query($db, $sql);//виконання запиту до бази
$s = mysqli_fetch_array($result);//результат виконання запиту повернути до ассаціативного масиву	
$look = "

<select name='Combobox1' size='1' id='Combobox1' style='position:absolute;left:446px;top:20px;width:99px;height:28px;z-index:4;'>";//будую шапку комбобоксу

//перебираю отриманий масив
do
	{		
        //з кожного запису масиву будую рядок мого комбобоксу   
      if (isset($_POST['Combobox1']) and $_POST['Combobox1'] == $s['id'])
      $look = $look."<option selected value='".$s['id']."'>".$s['class']."-".$s['lit']."</option>"; 
   else 
   $look = $look."<option value='".$s['id']."'>".$s['class']."-".$s['lit']."</option>";        

	}
while ($s=mysqli_fetch_array($result));	

//додаю закінчення комбобоксу 

$look = $look."</select>";
   if (isset($_POST['Combobox1']))
      {
         //рядок з  запитом до бази учитель класса
         $sql = "SELECT * FROM `teachers` WHERE `class_id` = ".$_POST['Combobox1'];
       
         $result = mysqli_query($db, $sql);//виконання запиту до бази
         $s = mysqli_fetch_array($result);//результат виконання запиту повернути до ассаціативного масиву
       $sql_boy = "SELECT * FROM `schoolboys` WHERE `id_classes` = ".$_POST['Combobox1'];
       
       $result_boy = mysqli_query($db, $sql_boy);//виконання запиту до бази
      $sb = mysqli_fetch_all($result_boy);//результат виконання запиту повернути до ассаціативного масиву
      
           $n=1;
           
     
      foreach($sb as $b)
	{	
      $look1.="
      <tr>
      <td class='cell0'><p style='font-size:13px;line-height:16px;color:#000000;'>
      <span style='color:#000000;'>&nbsp;</span><span style='font-family:Segoe UI Symbol;color:#000000;'>".$n++."</span></p></td>
      <td class='cell1'><p style='font-size:13px;line-height:16px;color:#000000;'>
      <span style='color:#000000;'>&nbsp;</span><span style='color:#000000;'>".$b[1]."</span></p></td>
      <td class='cell2'><p style='font-size:13px;line-height:16px;color:#000000;'>
      <span style='color:#000000;'>&nbsp;</span><span style='color:#000000;'>".$b[2]."</span></p></td>
      </tr>
      ";
      }      
}
?>

<div id="wb_Form1" style="position:absolute;left:155px;top:125px;width:733px;height:447px;z-index:8;">
<form name="Form1" method="post" action="" enctype="multipart/form-data" id="Form1">
<div id="wb_Heading1" style="position:absolute;left:40px;top:15px;width:380px;height:39px;z-index:2;">
<h1 id="Heading1">Довідник класу</h1></div> 
<table style="position:absolute;left:24px;top:108px;width:656px;height:196px;z-index:3;" id="Table1">
<tr>
<td class="cell0"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span><span style="font-family:Segoe UI Symbol;color:#000000;">№</span></p></td>
<td class="cell1"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span><span style="color:#000000;">Прізвище та ім'я</span></p></td>
<td class="cell2"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span><span style="color:#000000;">Дата народження</span></p></td>
</tr>

<?php echo $look1;?>
<tr>
<td class="cell6"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell4"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell7"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
</tr>
<tr>
<td class="cell6"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell4"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell7"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
</tr>
<tr>
<td class="cell6"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell4"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell7"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
</tr>
<tr>
<td class="cell6"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell4"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell7"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
</tr>
<tr>
<td class="cell6"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell4"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell7"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
</tr>
<tr>
<td class="cell6"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell4"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell7"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
</tr>
<tr>
<td class="cell6"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell4"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell7"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
</tr>
<tr>
<td class="cell6"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell4"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell7"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
</tr>
</table>  

<?php echo $look;?>

<div id="wb_Text1" style="position:absolute;left:42px;top:78px;width:446px;height:15px;z-index:5;">
<span style="color:#000000;font-family:Arial;font-size:13px;"> <?php if (isset($s['pip'])) {
    echo 'Класний керівник: ' . $s['pip'];
} else {
    echo 'Класний керівник не найден';
}?></span></div>
 <input type="submit" id="Button1" name="" value="Пошук"
  style="position:absolute;left:565px;top:22px;width:96px;height:25px;z-index:6;"> 
</form>
</div>
</body>
</html>
