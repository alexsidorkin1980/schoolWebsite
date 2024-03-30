<?php
session_start();

require_once '../path.php';
require_once '../app/controllers/library.php';
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- font google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet">
  <!-- custom styling -->
  <link rel="stylesheet" href="../assets/css/admin.css">
  <title>My blog</title>
</head>

<body>

  <!-- HEADER -->
  <?php
  require_once '../app/include/header-admin.php';
  ?>
  <!-- END HEADER -->

  <div class="container">
    <!-- sidebar start -->
    <div class="row">
      <?php require_once '../app/include/sidebar-librarian.php'; ?>
      <!-- sidebar end -->
      <div class="posts col-8">
        <div class="row title-table">
          <h2>Добавление книги для учителя в библиотеку</h2>
        </div>
        <div class="row add-post">
          <div class="mb-12 col-12 col-md-12 err">
            <?php require_once '../app/helps/errorInfo.php'; ?>
            </p>
          </div>
          <form action="add-book-teach.php" method='post'>
            <div class="col">
              <label for="formGroupExampleInput" class="form-label">Автор</label>
              <input name="author" value="<?= $author; ?>" type="text" class="form-control" id="formGroupExampleInput"
                placeholder="Введите автора книги...">
            </div>
            <div class="col">
              <label for="formGroupExampleInput" class="form-label">Название</label>
              <input name="title" value="<?= $title; ?>" type="text" class="form-control" id="formGroupExampleInput"
                placeholder="Введите название книги...">
            </div>
            <div class="w-100"></div>
            <div class="col">
              <label for="exampleInputEmail1" class="form-label">Инвентаризационный номер</label>
              <input name="inv_number" value="<?= $inv_number; ?>" type="number" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите класс...">
              <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="w-100"></div>
            <div class="col">
              <label for="exampleInputPassword1" class="form-label">Год издания</label>
              <input name="date_edition" type="number" class="form-control" id="exampleInputPassword1"
                placeholder="Введите год издания...">
            </div>
            <div class="col">
              <button class="btn btn-primary" name="create-book-teach" type="submit">Добавить</button>
            </div>
          </form>
        </div>
      </div>
      <?php require_once '../app/include/sidebar-librarian2.php'; ?>
    </div>
  </div>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <!-- font avesom -->
  <script src="https://kit.fontawesome.com/1d9689321f.js" crossorigin="anonymous"></script>
</body>

</html>


























<!-- <!doctype html>
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
  <body> -->
<?php //require_once '../app\include\access-check.php'; ?>
<!-- header  -->
<?php // require_once '../app/include/header.php'; ?>
<!-- header end -->
<?php
//require_once '../app/database/connect.php';//пiдключення до бази
//require_once '../app/database/db.php';//пiдключення до бази
//$text='';
//  $db = connectDb($BD);
// $name = isset($_POST['Editbox1']) ? $_POST['Editbox1'] : '';
// $date_edition = isset($_POST['Editbox2']) ? $_POST['Editbox2'] : ''; 
// $number = isset($_POST['Editbox3']) ? $_POST['Editbox3'] : '';
// $number_end = isset($_POST['Editbox4']) ? $_POST['Editbox4'] : '';
// if ( !empty($name) && !empty($date_edition)&& !empty($number)) {
//     if (empty($number_end)) {
//       $number_end = $number;
//   }
//     for($i=$number;$i<=$number_end ;$i++){// цикл для додавання декiлька книг
//       try {

// $params=[
//     // 'id'=>NULL,
//     'inv_number'=>$i,
//      'name_book'=>$name,
//      'date_edition'=>$date_edition,

// ];
//  insert('library',$params);

//   } catch (PDOException $e) {
//     // Проверка на ошибку дублирования записи
//     if ($e->getCode() === '23000') {
//       $text= "Книга з таким iнв. номером вже знаходиться в бiблiотецi!!! ";

//     }
//   }
// $text= "Книга успiшно додана в бiблiотеку!!! ";
//     }
//   }

?>

<!-- блок main start  -->
<!-- <div class="container">
    <div class="content row"> -->
<!-- блок main start  -->
<!-- блок main content    -->
<!-- <div class="main-conent col-md-9 col-12"> -->
<!-- блок main content    -->
<!-- <div class="container">
     <div class="form-content row"> -->
<!-- <form action="" method="post"> -->

<!-- <div id="wb_Form1" style="position:absolute;left:92px;top:133px;width:733px;height:252px;z-index:14;"> -->
<!-- <form name="Form1" method="post" action="" enctype="multipart/form-data" id="Form1"> -->
<!-- <div id="wb_Heading1" style="position:absolute;left:103px;top:10px;width:484px;height:39px;z-index:2;"> -->
<!-- <h1 id="Heading1">Додати книгу</h1> -->
<!-- </div> -->
<!-- <div id="wb_Text2" style="position:absolute;left:331px;top:305px;width:157px;height:15px;z-index:3;">
<span style="color:#000000;font-family:Arial;font-size:15px;">Назва книги:</span></div>
<div id="wb_Text1" style="position:absolute;left:331px;top:350px;width:123px;height:15px;z-index:4;">
<span style="color:#000000;font-family:Arial;font-size:15px;">Рік видання:</span></div>
<input type="submit"id="Button1"style="position:absolute;left:531px;top:499px;width:94px;height:23px;z-index:5;"value="Submit";>
<input type="reset" id="Button2" name="" value="Reset" style="position:absolute;left:681px;top:499px;width:96px;height:25px;z-index:6;">
<input type="text" id="Editbox1" style="position:absolute;left:477px;top:290px;width:485px;height:36px;z-index:7;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox2" style="position:absolute;left:477px;top:335px;width:146px;height:36px;z-index:8;" name="Editbox2" value="20" maxlength="4" spellcheck="false">
<div id="wb_Text3" style="position:absolute;left:331px;top:395px;width:123px;height:15px;z-index:9;">
<span style="color:#000000;font-family:Arial;font-size:15px;">Інв. номер з:</span></div>
<div id="wb_Text4" style="position:absolute;left:580px;top:395px;width:46px;height:15px;z-index:10;">
<span style="color:#000000;font-family:Arial;font-size:13px;">по:</span></div>
<input type="text" id="Editbox3" style="position:absolute;left:477px;top:380px;width:79px;height:36px;z-index:11;" name="Editbox3" value="" spellcheck="false">
<input type="text" id="Editbox4" style="position:absolute;left:620px;top:380px;width:86px;height:36px;z-index:12;" name="Editbox4" value="" spellcheck="false">
</form> -->
<!-- </div> -->

<!-- <h1 style='color:red;position:absolute;left:0px;top:549px;';><? //=$text ?></h1> -->

<!-- </div>
</div> -->
<!-- блок main content end   -->
<!-- </div> -->
<!-- блок main content end   -->
<!-- блок main end  -->
<!-- </div>
</div> -->
<!-- блок main end  -->
<!-- footer -->
<?php //require_once '../app/include/footer.php'; ?>
<!-- footer end -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1d9689321f.js" crossorigin="anonymous"></script>

   </body>
</html> -->