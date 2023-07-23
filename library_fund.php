<?php
session_start();
// Перевiрка наявностi ролi в сесii
if (!isset($_SESSION['role'])) {   
    header('Location: login.php');
    exit();
}
// Перевiрка ролi для user
if ($_SESSION['role'] == 'user') {
  echo'доступ закрыт';
  exit();
}
require_once'index.php';
?>
<pre>
  
<div id="wb_Form1" style="position:absolute;left:100px;top:119px;width:733px;height:447px;z-index:13;">
<form name="Form1" method="get" action="" enctype="multipart/form-data" id="Form1">
<div id="wb_Heading1" style="position:absolute;left:413px;top:16px;width:484px;height:39px;z-index:4;">
<h1 id="Heading1">Бiблiотечний фонд</h1></div>
<table style="position:absolute;left:249px;top:66px;width:955px;height:220px;z-index:5;" id="Table1">

<tr>
<td class="cell0"><p style="font-size:13px;line-height:16px;color:#000000;">
<span style="color:#000000;">&nbsp;</span><span 
style="font-family:Segoe UI Symbol;color:#000000;">№</span></p></td>

<td class="cell1"><p style="font-size:13px;line-height:16px;color:#000000;">
<span style="color:#000000;">&nbsp;</span><span 
style="color:#000000;">інв. номер</span></p></td>

<td class="cell2"><p style="font-size:13px;line-height:16px;color:#000000;">
<span style="color:#000000;">&nbsp;</span><span style="color:#000000;">назва книги</span></p></td>

<td class="cell2"><p style="font-size:13px;line-height:16px;color:#000000;">
<span style="color:#000000;">&nbsp;</span><span style="color:#000000;">місце знаходження</span></p></td>
</tr>

<?php
require_once 'connect.php';
$db = connectDb($BD);
$sql = "SELECT * FROM `library` ";
$result = mysqli_query($db, $sql);
$s = mysqli_fetch_array($result);
  $count=1;

do{
if(!empty($s['id_schoolboys'])&&empty($s['id_teachers'])){
  $sql_boy = "SELECT * FROM `schoolboys` WHERE `id`='" . $s['id_schoolboys'] . "'";
  $result_boy = mysqli_query($db, $sql_boy);
  $sb = mysqli_fetch_array($result_boy);
  $name=$sb['pip'].' (student)';
  
}

if(empty($s['id_schoolboys'])&&!empty($s['id_teachers'])){
  $sql_teach = "SELECT * FROM `teachers` WHERE `id`='" . $s['id_teachers'] . "'";
  $result_teach = mysqli_query($db, $sql_teach);
  $st = mysqli_fetch_array($result_teach);
  $name=$st['pip'].' (teacher)';
  
}

if(!empty($s['return_date'])||empty($s['return_date'])&&empty($s['borrow_date'])){
  
  $name='Книга в бiблiотецi!';
  
}
$inv = $s['inv_number']; 

  ?>
<tr>
<td class="cell7"><p style="font-size:13px;line-height:16px;color:#000000;">
<span style="color:#000000;">&nbsp;<?= $count++;?></span></p></td>

<td class="cell8"><p style="font-size:13px;line-height:16px;color:#000000;text-align:center;">
<span style="color:#000000;">&nbsp;
<a href="book_card.php?inv_number=<?= $inv;?>"><?= $s['inv_number']?></a></span></p></td>

<td class="cell9"><p style="font-size:13px;line-height:16px;color:#000000;">
<!-- додаемо параметр inv_number до url для передачi в iнший файл  -->
<span style="color:#000000;">&nbsp;<a href="book_card.php?inv_number=<?php echo$s['inv_number'];
?>"><?= $s['name_book']?></a></span></p></td>

<td class="cell9"><p style="font-size:13px;line-height:16px;color:#000000;">
<span style="color:#000000;">&nbsp;<?=$name?></span></p></td>
</tr>

<?php
}while($s = mysqli_fetch_array($result));

?>
</table>
 </form>
</div>
</body>
</html>