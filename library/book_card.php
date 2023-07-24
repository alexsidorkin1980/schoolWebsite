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
require_once '../config/connect.php';
//получаемо iнв.номер 
if (isset($_GET['inv_number'])) {
  $inv = $_GET['inv_number'];

$db = connectDb($BD);
$sql = "SELECT * FROM `library`WHERE `inv_number`= ' $inv ' ";
$result = mysqli_query($db, $sql);
$s = mysqli_fetch_array($result);
//визначаемо учня
if(!empty($s['id_schoolboys'])&&empty($s['id_teachers'])){
  $sql_boy = "SELECT * FROM `schoolboys` WHERE `id`='" . $s['id_schoolboys'] . "'";
  $result_boy = mysqli_query($db, $sql_boy);
  $sb = mysqli_fetch_array($result_boy);
  $name=$sb['pip'].' (student)';//додаемо до пiп пояснення учень 
}
//визначаемо учителя
if(empty($s['id_schoolboys'])&&!empty($s['id_teachers'])){
  $sql_teach = "SELECT * FROM `teachers` WHERE `id`='" . $s['id_teachers'] . "'";
  $result_teach = mysqli_query($db, $sql_teach);
  $st = mysqli_fetch_array($result_teach);
  $name=$st['pip'].' (teacher)';//додаемо до пiп пояснення учитель
}
?>

 <div style="background-color:grey;border:2px solid black;color:blue;text-align:center;
 position:absolute;left:241px;top:214px;width:;z-index:6;padding: 30px;font-size:30px;">
  <p style="margin-bottom: 50px; "><h1>дата видачі:   <span><?=$s['borrow_date'];?></span> </h1></p>
  <p style="margin: 50px; "><h1>кому видана: <span><?php if($s['borrow_date']==null)
  echo'Книга в библиотеке!!';
  else
  echo$name;?></span> </h1></p>
  <p style="margin: 50px; "><h1>дата повернення: <span><?=$s['return_date'];?></span> </h1></p>
</div> 



<?php
}
?>
</div>
</body>
</html>