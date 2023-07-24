<?php
session_start();
$login=isset($_POST['login']) ? $_POST['login'] : '';
$pass=isset($_POST['pass']) ? $_POST['pass'] : '';
$text='';

$pass=md5($pass."qsrtuh319876");//хеширование

require_once'connect.php';

$db = connectDb($BD);

if (!empty($login) && !empty($pass)) {
   $sql = "SELECT * FROM `register_bd` WHERE `login` LIKE '$login' AND `pass` LIKE '$pass'";
   $result = mysqli_query($db, $sql);
   $s = mysqli_fetch_array($result);

   if ($s !== null) {
      setcookie('user',$s['login'],time()+3600*24*30,"/");
       $_SESSION['role'] = $s['role'];

       if ($_SESSION['role'] == 'admin'||$_SESSION['role'] == 'librarian'
       ||$_SESSION['role'] == 'user') {
           header('Location: index.php');
           exit();
       } else {
       // Неверный логин или пароль
       $text= "Неверный логин или пароль";
   }
} 
}

else {
   // Не заполнены логин или пароль
   $text= "Введите логин и пароль";
}
//видалення куки при натисненнi выход
if(isset($_GET['coock'])&&$_GET['coock']=='update'){
   setcookie('user', '', time() - 3600, '/');
   unset($_SESSION['role']);
    header('Location: ../index.php');
    exit(); 
}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Безымянная страница</title>
<meta name="generator" content="WYSIWYG Web Builder 15 - http://www.wysiwygwebbuilder.com">
<link href="../css/Мододша_школа.css" rel="stylesheet">
<link href="../css/login.css" rel="stylesheet">
</head>
<body>
<div id="wb_Login1" style="position:absolute;left:375px;top:139px;width:220px;height:214px;z-index:0;">
<form name="loginform" method="post" accept-charset="UTF-8" action="<?php echo basename(__FILE__); ?>" id="loginform">
<input type="hidden" name="form_name" value="loginform">
<table id="Login1">
<tr>
   <td class="header">Авторізація</td>
 
</tr>
<tr>
   <td class="label"><label for="username">Ім'я користувача</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="login" type="text" id="username" ></td>
</tr>
<tr>
   <td class="label"><label for="password">Пароль</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="pass" type="password" id="password" ></td>
</tr>
<!-- <tr>
   <td class="row"><input id="rememberme" type="checkbox" name="rememberme"><label for="rememberme">Запам'ятати</label></td>
</tr> -->
<tr>
   <td style="text-align:center;vertical-align:bottom"><input class="button" type="submit" name="" value="Підтвердити" id="login"></td>
</tr>
</table>
</form>


<p> <a href="/public/index.php" style="color:red;">повернутися на головну</a> </p>
</div>

<h4 style="color:blue;position:absolute;left:341px;top:66px;"><?=$text;?></h4>
</body>
</html>