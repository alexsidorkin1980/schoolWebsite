<?php
session_start();

// Перевiрка наявностi ролi в сесii
// if (!isset($_SESSION['role'])) {
//     header('Location:login.php');
//     // include '..\config\login.php';
//     exit();
// }

// // Перевiрка ролi для бiблiотекаря
// if ($_SESSION['role'] == 'librarian') {
//     echo'доступ закрыт';
//     exit();
// }

// // Перевiрка ролi для user
// if ($_SESSION['role'] == 'user') {
//     echo'доступ закрыт';
//     exit();
// }
// require_once '../index.php';


// session_start();
$login=isset($_POST['login']) ? $_POST['login'] : '';
$pass=isset($_POST['pass']) ? $_POST['pass'] : '';
$text='';

$pass=md5($pass."qsrtuh319876");//хеширование

require_once'app/database/connect.php';
require_once'app/database/db.php';

// $db = connectDb($BD);

if (!empty($login) && !empty($pass)) {
   $sql = "SELECT * FROM `register_bd` WHERE `login` LIKE '$login' AND `pass` LIKE '$pass'";
   // $result = mysqli_query($db, $sql);
   // $s = mysqli_fetch_array($result);
// подготовка запроса
$stmt = $pdo->prepare($sql);
// Выполнение запроса
$stmt->execute();
// проверка на ошибки
dbCheckError($stmt);
// Получение результата
$s = $stmt->fetchAll();

$item = $s[0];
    $id = $item['id'];
  $login=$item['login'];
  $role=$item['role'];

   if ($s !== null) {
      setcookie('user',$login,time()+3600*24*30,"/");
       $_SESSION['role'] = $role;

       if ($_SESSION['role'] == 'admin'||$_SESSION['role'] == 'librarian'
       ||$_SESSION['role'] == 'user') {
           header('Location: ../index.php');
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
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Початкова школа</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/login.css">
  
   </head>
  <body>
   <!-- header  -->
   <?php require_once './app/include/header.php';?>
<!-- header end -->
<?php
require_once './app/database/connect.php';//пiдключення до бази
 require_once './app/database/db.php';//пiдключення до бази




?>



        <!-- FORM -->
  <div class="container reg_form"> 
  <form class="row justify-content-center" method="post" action="log.php">
    <h2 col-12>Авторизация</h2>
    <div class="mb-3 col-12 col-md-4">
        <label for="formGroupExampleInput" class="form-label">Ваш логин</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Введите ваш логин...">
      </div>
    <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
      <label for="exampleInputPassword1" class="form-label">Пароль</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите ваш пароль...">
    </div>
    <div class="w-100"></div>
    <!-- <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> -->
    <div class="mb-3 col-12 col-md-4">
    <button type="submit" class="btn btn-primary  btn-secondary">Войти</button>
    <a href="reg.php">Зарегистрироваться</a>
</div>
  </form>
</div>

  <!-- FORM END -->

        <!-- <div id="wb_Login1" style="position:absolute;left:375px;top:139px;width:220px;height:214px;z-index:0;">
<form name="loginform" method="post" accept-charset="UTF-8" action="<?php echo basename(__FILE__); ?>" id="loginform">
<input type="hidden" name="form_name" value="loginform">
<table id="Login1">
<tr>
   <td class="header">Авторизація</td>
 
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
<tr>
   <td class="row"><input id="rememberme" type="checkbox" name="rememberme"><label for="rememberme">Запам'ятати</label></td>
</tr> 
<tr>
   <td style="text-align:center;vertical-align:bottom"><input class="button" type="submit" name="" value="Підтвердити" id="login"></td>
</tr>
</table>
</form> -->


<!-- <p> <a href="/index.php" style="color:red;">повернутися на головну</a> </p>
</div> -->

<!-- <h4 style="color:blue;position:absolute;left:341px;top:66px;"><?=$text;?></h4> -->

        

       

<!-- footer -->
   <?php require_once './app/include/footer.php';?>
<!-- footer end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1d9689321f.js" crossorigin="anonymous"></script>

   </body>
</html>




