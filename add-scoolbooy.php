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
require_once'connect.php';//пiдключення до бази
$db = connectDb($BD);
$pip = isset($_POST['Editbox1']) ? $_POST['Editbox1'] : '';//присвоюемо даннi з форми в змiннi
$dn = isset($_POST['Editbox2']) ? $_POST['Editbox2'] : ''; 
$id_classes = isset($_POST['Combobox1']) ? $_POST['Combobox1'] : '';
//рядок з  запитом до бази
$sql = "SELECT * FROM `classes` WHERE `graduate` IS NULL ORDER BY `class` ASC";
$result = mysqli_query($db, $sql);//виконання запиту до бази
$s = mysqli_fetch_array($result);//результат виконання запиту повернути до ассаціативного масиву
	
$look = "
<select name='Combobox1' size='1' id='Combobox1'
 style='position:absolute;left:177px;top:153px;width:156px;height:28px;z-index:10'>";
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
// перевiрка на присутнiсть значень в формi
if (!empty($pip) && !empty($dn) && !empty($id_classes)) {
   $sql = "INSERT INTO `schoolboys` (`id`, `pip`, `dn`, `id_classes`) VALUES (NULL, '$pip', '$dn', '$id_classes')";
   mysqli_query($db, $sql);
   
}

?>

<div id="wb_Form1" style="position:absolute;left:103px;top:133px;width:733px;height:252px;z-index:12;">
<form name="Form1" method="post" action="" enctype="multipart/form-data" id="Form1">
<div id="wb_Heading1" style="position:absolute;left:103px;top:10px;width:484px;height:39px;z-index:2;">
<h1 id="Heading1">Прийняти учня</h1></div>
<div id="wb_Text2" style="position:absolute;left:31px;top:75px;width:157px;height:15px;z-index:3;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Прізвище та ім'я учня:</span></div>
<div id="wb_Text1" style="position:absolute;left:31px;top:121px;width:123px;height:15px;z-index:4;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Дата народження:</span></div>
<input type="submit"id="Button1"style="position:absolute;left:216px;top:199px;width:94px;height:23px;z-index:5;"value="Submit">
<input type="reset" id="Button2" name="" value="Reset" style="position:absolute;left:376px;top:199px;width:96px;height:25px;z-index:6;">
<input type="text" id="Editbox1" style="position:absolute;left:177px;top:64px;width:485px;height:16px;z-index:7;" name="Editbox1" value="" spellcheck="false">
<input type="date" id="Editbox2" style="position:absolute;left:177px;top:113px;width:146px;height:16px;z-index:8;" name="Editbox2" value="" spellcheck="false">
<div id="wb_Text3" style="position:absolute;left:31px;top:160px;width:123px;height:15px;z-index:9;">
<span style="color:#000000;font-family:Arial;font-size:13px;">До класу:</span></div>

<?php echo $look?>

</select>
</form>
</div>
</body>
</html>