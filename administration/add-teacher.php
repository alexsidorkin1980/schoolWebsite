
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
  <link rel="stylesheet" href="/assets/css/add-teacher.css">

   </head>
  <body>
  <?php

require_once '../app\include\access-check.php';
?>
   <!-- header  -->
   <?php require_once '../app/include/header.php';?>
<!-- header end -->
<?php
require_once '../app/database/connect.php';//пiдключення до бази
 require_once '../app/database/db.php';//пiдключення до бази

$class = isset($_POST['Combobox1']) ? $_POST['Combobox1'] : '';//присвоюемо даннi з форми в змiннi
$litt = isset($_POST['Combobox2']) ? $_POST['Combobox2'] : ''; 
$boss = isset($_POST['Editbox1']) ? $_POST['Editbox1'] : '';
$text='';

$post=[    
    'pip'=>$boss,
    ];  
if (!empty($boss) ) {//додаемо вчителя до таблицi teachers
insert('teachers',$post);
}
    $post1=[
    
        'class'=>$class,
        'lit'=>$litt,
        
        ];
if (!empty($class) && !empty($litt)) { 
    $result=selectAll('classes',$post1);
    if ( count($result) == 0) {//перевiрка на наявнiсть в таблицi классу та лiтери
        insert('classes',$post1);

    } else {
        $text= "Такий клас вже знаходиться в базi!!!!";
    }
}
?>

<!-- блок main start  -->
<div class="container">
    <div class="content row">
        <!-- блок main start  -->
<!-- блок main content    -->
<div class="main-conent col-md-9 col-12">
        <!-- блок main content    --> 
   <div class="container">
     <div class="form-content row">
<form action="" method="post">
<div><h1 id="Heading1">Додати клас або вчителя</h1></div>

<div id="wb_Text2" style="width:600px;height:5px;margin-bottom: 25px;text-align:center;">

    <span style="position:absolute;left:520px;color:#000000;font-family:Arial;font-size:40px;text-align:center;">Назва класу:</span>
   
  </div>
<div>
  <select name="Combobox1" style="position:absolute;left:540px;bottom:300px;width:65px;height:28px;font-size:20px;">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option selected value="0"><не вибрано></option>
      </select>
  <select name="Combobox2" style="position:absolute;left:640px;bottom:300px;width:65px;height:28px;font-size:20px;">
  <option value="А">А</option>
    <option value="Б">Б</option>
    <option value="В">В</option>
      <option selected value="0"><не вибрано></option>
      </select><br>
</div>

<div id="wb_Text1" style="width:93px;height:15px;z-index:6;">
    <span style="position:absolute;left:450px;bottom :200px;color:#000000;font-family:Arial;font-size:40px;margin:20px;">
    Введiть пiп вчителя</span>
</div>

<div style="position:absolute;bottom:200px;">
   <input type="text" id="Editbox1" style="position:absolute;left:150px;width:485px;height:36px;z-index:7;" name="Editbox1" value="" spellcheck="false">  
  
    <input type="submit"id="Button1"style="width:80px;background-color:gray;color:black;border-radius:15%;
    padding:5px;z-index:8;position:absolute;left:288px;top:100px;font-size:15px;"value="Submit">

    <input type="reset" id="Button2" name="" value="Reset" style="width:80px;height:32px; padding:5px;
    background-color:gray;color:black;border-radius:15%;
    z-index:9;position:absolute;left:388px;top:100px;font-size:15px;">
    </div> 
</form>
<div><h2 style='color:red;position:absolute;left:388px;top:580px;'><?=$text?></h2></div>
   </div>
</div>
<!-- блок main content end   -->
        </div>
        <!-- блок main content end   -->
        <!-- блок main end  -->
    </div>
</div>
<!-- блок main end  -->
<!-- footer -->
   <?php require_once '../app/include/footer.php';?>
<!-- footer end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1d9689321f.js" crossorigin="anonymous"></script>

   </body>
</html>




