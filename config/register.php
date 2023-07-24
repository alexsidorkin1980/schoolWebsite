<?php
$text='';
$role='';
$login=isset($_POST['login']) ? $_POST['login'] : '';
 
$pass=isset($_POST['pass']) ? $_POST['pass'] : '';
$email=isset($_POST['email']) ? $_POST['email'] : ''; 
//перевiрка на допустиму довжину
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   if (mb_strlen($login) < 3 || mb_strlen($login) > 90) {
       echo "Недопустимая длина логина";
       exit();
   } else if (strlen($pass) < 6 || strlen($pass) > 14) {
       echo "Недопустимая длина пароля (от 6 до 14 символов)";
       exit();
   }
}

$pass=md5($pass."qsrtuh319876");
require_once'../config/connect.php';
$db = connectDb($BD);
//запит на додавання даних логiна i паролю в базу
if (!empty($login) && !empty($pass)) {
   $sql = "INSERT INTO `register_bd` (`id`, `login`,`pass`,`email`) VALUES (NULL, '$login','$pass','$email')";
   mysqli_query($db, $sql);
   $text="РЕГИСТРАЦИЯ УСПЕШНО ПРОВЕДЕНА!!";
   //exit();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Форма регистрации</title>
<meta name="generator" content="WYSIWYG Web Builder 15 - http://www.wysiwygwebbuilder.com">
<link href="../css/Мододша_школа.css" rel="stylesheet">
<link href="../css/login.css" rel="stylesheet">
</head>
<body>
<div id="wb_Login1" style="position:absolute;left:375px;top:139px;width:220px;height:214px;z-index:0;">
<form name="loginform" method="post" accept-charset="UTF-8" action="" id="loginform">
<input type="hidden" name="form_name" value="loginform">
<table id="Login1">
<tr>
   <td class="header">РЕГIСТРАЦIЯ</td>
</tr>
<tr>
   <td class="label"><label for="username">ВВЕДIТЬ ЛОГIН</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="login" type="text" id="username"></td>
</tr>
<tr>
   <td class="label"><label for="password">ВВЕДIТЬ ПАРОЛЬ</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="pass" type="password" id="password"></td>
</tr>
<tr>
   <td class="label"><label for="password">ВВЕДIТЬ EMAIL</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="email" type="text" id="password"></td>
</tr>

<tr>
   <td style="text-align:center;vertical-align:bottom"><input class="button" type="submit" name="" value="Підтвердити" id="login"></td>
</tr>
<tr>
   <td style="text-align:center;vertical-align:bottom"><input class="button" type="reset" name="" value="Сброс пароля" id="login"></td>
</tr>
</table>
</form>
<p> <a href="../index.php" style='color:red;'>повернутися на головну</a> </p>
</div>
<div><span style='color:red;'><?php echo$text;?></span></div>
</body>
</html>