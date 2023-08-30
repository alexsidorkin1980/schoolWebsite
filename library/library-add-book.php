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
require_once'../index.php';
require_once'../config/connect.php';// Пiдключення до бази
$text='';
$db = connectDb($BD);
$name = isset($_POST['Editbox1']) ? $_POST['Editbox1'] : '';
$date_edition = isset($_POST['Editbox2']) ? $_POST['Editbox2'] : ''; 
$number = isset($_POST['Editbox3']) ? $_POST['Editbox3'] : '';
$number_end = isset($_POST['Editbox4']) ? $_POST['Editbox4'] : '';
if ( !empty($name) && !empty($date_edition)&& !empty($number)) {
    if (empty($number_end)) {
      $number_end = $number;
  }
    for($i=$number;$i<=$number_end ;$i++){// цикл для додавання декiлька книг
      try {
    $sql = "INSERT INTO `library` (`id`, `inv_number`, `name_book`, `date_edition`, `borrow_date`,
     `return_date`, `id_teachers`, `id_schoolboys`) VALUES (NULL, '$i', '$name', '$date_edition', NULL,
      NULL, NULL, NULL)";

    mysqli_query($db, $sql);

  } catch (mysqli_sql_exception $e) {
    // Перевiрка на помилку дублювання запису
    if (strpos($e->getMessage(), "Duplicate entry") !== false) {
      $text= "Книга з таким iнв. номером вже знаходиться в бiблiотецi!!! ";
     break;
    }
}
$text= "Книга успiшно додана в бiблiотеку!!! ";
    }

  }
?>


<div id="wb_Form1" style="position:absolute;left:92px;top:133px;width:733px;height:252px;z-index:14;">
<form name="Form1" method="post" action="" enctype="multipart/form-data" id="Form1">
<div id="wb_Heading1" style="position:absolute;left:103px;top:10px;width:484px;height:39px;z-index:2;">
<h1 id="Heading1">Додати книгу</h1></div>
<div id="wb_Text2" style="position:absolute;left:31px;top:75px;width:157px;height:15px;z-index:3;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Назва книги:</span></div>
<div id="wb_Text1" style="position:absolute;left:31px;top:121px;width:123px;height:15px;z-index:4;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Рік видання:</span></div>
<input type="submit"id="Button1"style="position:absolute;left:216px;top:199px;width:94px;height:23px;z-index:5;"value="Submit";>
<input type="reset" id="Button2" name="" value="Reset" style="position:absolute;left:376px;top:199px;width:96px;height:25px;z-index:6;">
<input type="text" id="Editbox1" style="position:absolute;left:177px;top:64px;width:485px;height:16px;z-index:7;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox2" style="position:absolute;left:177px;top:113px;width:146px;height:16px;z-index:8;" name="Editbox2" value="20" maxlength="4" spellcheck="false">
<div id="wb_Text3" style="position:absolute;left:31px;top:160px;width:123px;height:15px;z-index:9;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Інв. номер з:</span></div>
<div id="wb_Text4" style="position:absolute;left:278px;top:160px;width:46px;height:15px;z-index:10;">
<span style="color:#000000;font-family:Arial;font-size:13px;">по:</span></div>
<input type="text" id="Editbox3" style="position:absolute;left:177px;top:149px;width:79px;height:16px;z-index:11;" name="Editbox3" value="" spellcheck="false">
<input type="text" id="Editbox4" style="position:absolute;left:312px;top:149px;width:86px;height:16px;z-index:12;" name="Editbox4" value="" spellcheck="false">
</form>
</div>

<h1 style='color:red;position:absolute;left:277px;top:449px;';><?=$text?></h1>
</body>
</html>