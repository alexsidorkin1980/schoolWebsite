<?php
session_start();
require_once 'path.php'; 
include("app/controllers/users.php");
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
//  $text='';
//  $role='';
//  $login=isset($_POST['login']) ? $_POST['login'] : '';
  
//  $pass=isset($_POST['pass']) ? $_POST['pass'] : '';
//  $email=isset($_POST['email']) ? $_POST['email'] : ''; 
//  //перевiрка на допустиму довжину
//  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if (mb_strlen($login) < 3 || mb_strlen($login) > 90) {
//         echo "Недопустимая длина логина";
//         exit();
//     } else if (strlen($pass) < 6 || strlen($pass) > 14) {
//         echo "Недопустимая длина пароля (от 6 до 14 символов)";
//         exit();
//     }
//  }
 
//  $pass=md5($pass."qsrtuh319876");
// //  require_once'../config/connect.php';
// //  $db = connectDb($BD);
//  //запит на додавання даних логiна i паролю в базу
//  if (!empty($login) && !empty($pass)) {
//     $sql = "INSERT INTO `register_bd` (`id`, `login`,`pass`,`email`) VALUES (NULL, '$login','$pass','$email')";
//     mysqli_query($db, $sql);
//     $text="РЕГИСТРАЦИЯ УСПЕШНО ПРОВЕДЕНА!!";
//     //exit();
//  }



?>



       <!-- FORM -->
  <div class="container reg_form">
  <form class="row justify-content-center" method="post" action="register.php">
    <h2>Форма регистрации</h2>
    <div class="mb-12 col-12 col-md-12 err">
<?php require_once 'app/helps/errorInfo.php'; ?>
</p></div>
    <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
        <label for="formGroupExampleInput" class="form-label">Логин</label>
        <input name="login" value="<?=$login;?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="Введите ваш логин...">
      </div>
      <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input name="email" value="<?=$email;?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
      <label for="exampleInputPassword2" class="form-label">Password</label>
      <input name="pass-second" type="password" class="form-control" id="exampleInputPassword2">
    </div>
    <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
    <button type="submit" class="btn btn-primary  btn-secondary" name="button-reg">Зарегистрироваться</button>
    <a href="login.php">Войти</a>
</div>
  </form>
</div>

  <!-- FORM END -->

<!-- footer -->
   <?php require_once './app/include/footer.php';?>
<!-- footer end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1d9689321f.js" crossorigin="anonymous"></script>

   </body>
</html>




