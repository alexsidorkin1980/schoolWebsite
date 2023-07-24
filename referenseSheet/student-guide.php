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


require_once '../index.php';
require_once '../config/connect.php';
$look1='';$text='';
$db = connectDb($BD);//під'єднання до бази

//рядок з  запитом до бази
$sql = "SELECT * FROM `classes` WHERE `graduate` IS NULL ORDER BY `class` ASC";
//$sql = "SELECT * FROM `classes` ORDER BY `classes`.`class` ASC";//пiдключаемо таблицю classes,
// упорядковуючи за зростанням ,до комбобоксу

$result = mysqli_query($db, $sql);//виконання запиту до бази
$s = mysqli_fetch_array($result);//результат виконання запиту повернути до ассаціативного масиву

//створюемо комбобокс з классами
$look = "

<select name='Combobox1' size='1' id='Combobox1' 
style='position:absolute;left:514px;top:116px;width:99px;height:28px;z-index:13;'>";//будую шапку комбобоксу
//перебираю отриманий масив
do
	{		
        //з кожного запису масиву будую рядок мого комбобоксу   
      if (isset($_POST['Combobox1']) and $_POST['Combobox1'] == $s['id'])
      $look .="<option selected value='".$s['id']."'>".$s['class']."-".$s['lit']."</option>"; 
   else 
   $look .="<option value='".$s['id']."'>".$s['class']."-".$s['lit']."</option>";        

	}
while ($s=mysqli_fetch_array($result));	

$look .="</select>";


//рядок з  запитом до бази
$sql_sch = "SELECT * FROM  `schoolboys` WHERE `graduate` IS NULL";//повернути всі поля з таблицi schoolboys

$result1 = mysqli_query($db, $sql_sch);//виконання запиту до бази
$st = mysqli_fetch_array($result1);//результат виконання запиту повернути до ассаціативного масиву
  //створюемо комбобокс з пiп учнiв
$look1= "

<select name='Combobox2' size='1' id='Combobox1'style='position:absolute;left:109px;top:52px;width:474px;height:28px;z-index:3;'>";
do
	{		
        //з кожного запису масиву будую рядок мого комбобоксу   ."-".$s[lit''].
      if (isset($_POST['Combobox2']) and $_POST['Combobox2'] == $st['id'])
      $look1 .="<option selected value='".$st['id']."'>".$st['pip']."</option>"; 
   else 
   $look1 .="<option value='".$st['id']."'>".$st['pip']."</option>";        

	}
while ($st=mysqli_fetch_array($result1));	
$look1 = $look1."</select>";

$pip=$_POST['Combobox2'];//зберiгаемо значення пiп учнiв з комбобоксу
$class=$_POST['Combobox1'];//зберiгаемо значення класу з комбобоксу

//знаходимо пiп учня якого вибрали в комбобоксi
$sql_name = "SELECT * FROM `schoolboys` WHERE `id`='$pip' AND `id_classes`='$class'";
$result2 = mysqli_query($db, $sql_name);//виконання запиту до бази
$sn = mysqli_fetch_array($result2);//результат виконання запиту повернути до ассаціативного масиву
print_r($sn);
//знаходимо рядки  в таблицi з книгами якi взяв учень по id_schoolboys
  $sql_lib = "SELECT * FROM `library` WHERE `id_schoolboys`='$pip' ";//
   $result_li = mysqli_query($db, $sql_lib);//виконання запиту до бази
   $sl = mysqli_fetch_array($result_li);
?>

<div id="wb_Form1" style="position:absolute;left:32px;top:122px;width:907px;height:417px;z-index:15;">
<form name="Form1" method="post" action="" enctype="multipart/form-data" id="Form1">
<div id="wb_Heading1" style="position:absolute;left:207px;top:13px;width:484px;height:39px;z-index:1;">
<h1 id="Heading1">Картка учня</h1></div>
<div id="wb_Text2" style="position:absolute;left:41px;top:59px;width:59px;height:15px;z-index:2;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Шукати:</span></div>

<?php
echo$look1;//виводимо комбобокс з учнями
?>

<!-- таблиця -->
<table style="position:absolute;left:41px;top:191px;width:821px;height:197px;z-index:9;" id="Table1">

 <tr>
<td class="cell0"><p style="font-size:13px;line-height:16px;color:#000000;">
<span style="color:#000000;">&nbsp;</span><span
 style="font-family:Segoe UI Symbol;color:#000000;">№</span><span 
 style="color:#000000;"> п/п</span></p></td>

<td class="cell1"><p style="font-family:Arial;font-size:13px;line-height:16px;color:#000000;">
<span style="font-family:Times New Roman;color:#000000;">Назва</span></p></td>

<td class="cell2"><p style="font-size:13px;line-height:16px;color:#000000;">
<span style="color:#000000;">&nbsp;</span><span style="color:#000000;">інв. </span>
<span style="font-family:Segoe UI Symbol;color:#000000;">№</span></p></td>

<td class="cell3"><p style="font-size:13px;line-height:16px;color:#000000;">
<span style="color:#000000;">&nbsp;</span><span style="color:#000000;">дата отримання</span></p></td>
</tr> 

<?php $count=1;   

if (!$sn&&!$s) {$text= "В цьому класi нема такого учня!"; }

else if($sn){

  $text= $sn['pip']; 

do{?>

<tr>
<td class='cell4'><p style='font-size:13px;line-height:16px;color:#000000;'>
<span style='color:#000000;'>&nbsp;</span><span style='color:#000000;'><?= $count++;?></span></p></td>

<?php if (isset($sl['name_book'])&&empty($sl['return_date'])) {   ?>


    <td class='cell5'><p style='font-size:13px;line-height:16px;color:#000000;'>
    <span style='color:#000000;'>&nbsp;</span><span 
    style='color:#000000;'><?= $sl['name_book']?></span></p></td>

<?php  }  else { ?>
    
  <td class='cell5'><p style='font-size:13px;line-height:16px;color:#000000;'>
<span style='color:#000000;'>&nbsp;</span><span 
  style='color:#000000;'>Назва книги вiдсутня</span></p></td>

<?php } if (isset($sl['inv_number'])&&empty($sl['return_date'])) { ?>
    
    <td class='cell6'><p style='font-size:13px;line-height:16px;color:#000000;'>
    <span style='color:#000000;'>&nbsp;</span>
    <span style='color:#000000;'><?= $sl['inv_number']?></span></p>
    </td>
    <?php } else { ?>
  
    <td class='cell6'><p style='font-size:13px;line-height:16px;color:#000000;'>
    <span style='color:#000000;'>&nbsp;</span>
    <span style='color:#000000;'>Iнвентарний номер вiдсутнiй</span></p>
    </td>
         <?php } if (isset($sl['borrow_date'])&&empty($sl['return_date'])) { ?>

    <td class='cell7'><p style='font-size:13px;line-height:16px;color:#000000;'>
    <span style='color:#000000;'>&nbsp;</span><span 
    style='color:#000000;'><?= $sl['borrow_date']?></span></p></td>
         <?php } else {?>
    
    <td class='cell7'><p style='font-size:13px;line-height:16px;color:#000000;'>
    <span style='color:#000000;'>&nbsp;</span><span
     style='color:#000000;'>Дата видачi вiдсутня</span></p></td></tr>

    <?php } }while($sl = mysqli_fetch_array($result_li)) ;
    
         }
    ?>
<input type="submit" id="Button3" name="" value="ОК" 
style="position:absolute;left:646px;top:118px;width:96px;height:25px;z-index:4;">

<div id="wb_Text1" style="position:absolute;left:41px;top:103px;width:117px;height:15px;z-index:5;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Прізвище та ім'я:</span></div>

<div id="wb_Text3" style="position:absolute;left:221px;top:101px;width:250px;height:15px;z-index:6;">
<span style="color:red;font-family:Arial;font-size:13px;"><?=$text?></span></div>

<div id="wb_Text4" style="position:absolute;left:41px;top:129px;width:117px;height:15px;z-index:7;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Дата народження:</span></div>

<div id="wb_Text5" style="position:absolute;left:221px;top:129px;width:250px;height:15px;z-index:8;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><?php
//виводимо дату народження
if (!$sn&&!$s) { echo "";} 
else { echo $sn['dn'];}?></span></div>

<tr>
<td class="cell4"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell5"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell6"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell7"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
</tr>
<tr>
<td class="cell4"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell5"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell6"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell7"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
</tr>
<tr>
<td class="cell4"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell5"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell6"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell7"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
</tr>
<tr>
<td class="cell4"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell5"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell6"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell7"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
</tr>
<tr>
<td class="cell4"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell5"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell6"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell7"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
</tr>
<tr>
<td class="cell4"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell5"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell6"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell7"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
</tr>
<tr>
<td class="cell4"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell5"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell6"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell7"><p style="font-size:13px;line-height:16px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
</tr> 
</table>
<div id="wb_Text6" style="position:absolute;left:41px;top:166px;width:250px;height:15px;z-index:10;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Перелік бібліотечних книжок:</span></div>
<hr id="Line1" style="position:absolute;left:16px;top:156px;width:867px;z-index:11;">
<div id="wb_Text7" style="position:absolute;left:409px;top:129px;width:105px;height:15px;z-index:12;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Учень класу:</span></div>

<?php
echo$look;//виводимо комбобокс з класами
?>
</form>
</div>
</script>
</div>
</body>
</html>
