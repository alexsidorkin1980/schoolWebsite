<?php 

include("app/database/db.php");

$isSubmit=false;
$errMsg='';
$regStatus='';

function loginUser($existance){
$_SESSION['id'] =$existance['id'];
$_SESSION['login'] =$existance['username'];
$_SESSION['admin'] =$existance['admin'];

if($_SESSION['admin']){
  header('Location: '.BASE_URL . 'admin/users/index.php');

}else {
header('Location: '.BASE_URL);
   }
}

// код для формы регистрации
if ($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['button-reg'])){
  // tt($_POST);
  // echo 'форма регистрации!!';
  //   exit();
$admin=0;  
$login=trim($_POST['login']);
$email=trim($_POST['email']);
$passF=trim($_POST['pass-first']);
$passS=trim($_POST['pass-second']);


// tt($_POST['login']);
// exit();

if($login===''||$email===''||$passF===''||$passS===''){// проверка на заполнение всех полей
  $errMsg='Не все поля заполнены!!!';
}
else if(mb_strlen($login,'UTF8')<2){// проверка на количество символов логина
  $errMsg='Логин должен быть больше 2-х символов!!!';
}
else if($passF!==$passS){// проверка на одинаковость паролей
  $errMsg='Пароли в обеих полях должны быть одинаковы!!!';
}
else {

$existance=selectOne('users',['email'=>$email]);
// tt($existance);
   //  exit();
if($existance &&$existance['email']===$email){
  $errMsg='Пользователь с такими данными уже существует!!!';
}else {

  $pass=password_hash($passS,PASSWORD_BCRYPT) ;
  $post=[
    'admin'=>$admin,
    'username'=>$login,
    'email'=>$email,
    'password'=>$pass,

    ];
  
       $id=insert('users',$post);
      $user=selectOne('users',['id'=>$id]);

      loginUser($existance);
  // tt($_SESSION);
  // die();
}
} 
}else{
// сохранение значений инпутов логин и имейл
$login='';
$email='';
}

// код для формы авторизации
if ($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['button-log'])){
    $email=trim($_POST['email']);
    $pass=trim($_POST['pass']);
    if($email===''||$pass===''){// проверка на заполнение всех полей
      $errMsg='Не все поля заполнены!!!';
    }else{

      $existance=selectOne('users',['email'=>$email]);
      if($existance && password_verify($pass,$existance['password'])){        
       //авторизовать
           loginUser($existance);
      }else {
        //ошибка авторизации
        
        $errMsg='Почта либо пароль введены не правильно!!!';
      }
    }
}
else{
  // сохранение значений инпутов логин и имейл
  
  $email='';
  }