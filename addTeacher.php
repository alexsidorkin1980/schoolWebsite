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
$class = isset($_POST['Combobox1']) ? $_POST['Combobox1'] : '';//присвоюемо даннi з форми в змiннi
$litt = isset($_POST['Combobox2']) ? $_POST['Combobox2'] : ''; 
$boss = isset($_POST['Editbox1']) ? $_POST['Editbox1'] : '';
$text='';

if (!empty($boss) ) {//додаемо вчителя до таблицi teachers
   $sql = "INSERT INTO `teachers` (`id`, `pip`) VALUES (NULL, '$boss')";
   mysqli_query($db, $sql);
  
}

if (!empty($class) && !empty($litt)) { 
    
    $selectSql = "SELECT * FROM `classes` WHERE `class` = '$class' AND `lit` = '$litt'";
    $result = mysqli_query($db, $selectSql);

    if ( mysqli_num_rows($result) == 0) {//перевiрка на наявнiсть в таблицi классу та лiтери
        $insertSql = "INSERT INTO `classes` (`id`, `class`, `lit`) VALUES (NULL, '$class', '$litt')";
        mysqli_query($db, $insertSql);
    } else {
        $text= "Такий клас вже знаходиться в базi!!!!";
    }
}

?>
<div id="wb_Form1" style="position:absolute;left:163px;top:127px;width:644px;height:252px;z-index:11;">
<form name="Form1" method="post" action="" enctype="multipart/form-data" id="Form1">
<div id="wb_Heading1" style="position:absolute;left:75px;top:12px;width:484px;height:39px;z-index:2;">
<h1 id="Heading1">Додати клас або вчителя</h1></div>
<div id="wb_Text2" style="position:absolute;left:31px;top:75px;width:93px;height:15px;z-index:3;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Назва класу:</span></div>
<select name="Combobox1" size="1" id="Combobox1" style="position:absolute;left:124px;top:68px;width:65px;height:28px;z-index:4;">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option selected value="0"><не вибрано></option>
</select>
<select name="Combobox2" size="1" id="Combobox2" style="position:absolute;left:204px;top:68px;width:65px;height:28px;z-index:5;">
<option value="А">А</option>
<option value="Б">Б</option>
<option value="В">В</option>
<option selected value="0"><не вибрано></option>
</select>
<div id="wb_Text1" style="position:absolute;left:31px;top:121px;width:93px;height:15px;z-index:6;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Вчителя</span></div>
<input type="text" id="Editbox1" style="position:absolute;left:124px;top:110px;width:485px;height:16px;z-index:7;" name="Editbox1" value="" spellcheck="false">
<input type="submit"id="Button1"style="position:absolute;left:188px;top:174px;width:94px;height:23px;z-index:8;"value="Submit">
<input type="reset" id="Button2" name="" value="Reset" style="position:absolute;left:376px;top:174px;width:96px;height:25px;z-index:9;">
<h2 style='color:red;position:absolute; left:124px;top:250px;'><?=$text?></h2>

</form>
</div>
</body>
</html>