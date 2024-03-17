<?php
session_start();

require_once '../../path.php';
require_once '../../app/controllers/teachers.php';

$address = trim($teacher['address']);
$phon_number = trim($teacher['phon_number']);
?>

<!doctype html>
<html lang="ru">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- font google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet">
  <!-- custom styling -->
  <link rel="stylesheet" href="../../assets/css/admin.css">
  <title>My blog</title>
</head>

<body>

  <!-- HEADER -->
  <?php
  require_once '../../app/include/header-admin.php';
  ?>
  <!-- END HEADER -->

  <div class="container">
    <!-- sidebar start -->
    <?php require_once '../../app/include/sidebar-admin.php'; ?>
    <!-- sidebar end -->
    <div class="posts col-8">
      <div class="button row">
        <a href="<?= BASE_URL . "admin/teachers/create.php" ?>" class="col-2 btn btn-success">Создать</a>
        <span class="col-1"></span>
        <a href="<?= BASE_URL . "admin/teachers/index.php" ?>" class="col-3 btn btn-warning">Изменить</a>
      </div>
      <div class="row title-table">
        <h2>Изменение данных учителя</h2>
      </div>
      <div class="row add-post">
        <div class="mb-12 col-12 col-md-12 err">
          <p>
            <?php require_once '../../app/helps/errorInfo.php'; ?>
          </p>
        </div>
        <form action="create.php" method='post'>
          <div class="col">
            <label for="formGroupExampleInput" class="form-label">ФИО</label>
            <input name="name" value="<?= $name; ?>" readonly type="text" class="form-control" id="formGroupExampleInput"
              placeholder="Введите фамилию имя отчество...">
            <input type="hidden" name='id' value='<?= $id ?>'>
          </div>
          <div class="w-100"></div>
          <div class="col">
            <label for="exampleInputPassword1" class="form-label">Класс</label>
            <?php require_once '../../app/helps/combobox.php'; ?>
            <div class="w-100"></div>
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" value="<?= $email; ?>" readonly type="email" class="form-control" id="exampleInputEmail1"
              aria-describedby="emailHelp" placeholder="Введите вашу почту...">
            <div id="emailHelp" class="form-text"></div>
          </div>
          <div class="w-100"></div>
          <div class="col">
            <label for="exampleInputPassword1" class="form-label">Адрес</label>
            <input name="address" type="text" value="<?= $address; ?>" class="form-control" id="exampleInputPassword1"
              placeholder="Введите домашний адрес...">
          </div>
          <div class="w-100"></div>
          <div class="col">
            <label for="exampleInputPassword1" class="form-label">Телефон</label>
            <input name="phon_number" type="tel" value="<?= $phon_number; ?>" class="form-control"
              id="exampleInputPassword1" placeholder="Введите номер телефона...">
          </div>
          <div class="w-100"></div>
          <div class="col">
            <button class="btn btn-primary" name='edit_teacher' type="submit">Создать</button>
          </div>
        </form>
      </div>

    </div>
  </div>

  <!-- FOOTER  -->

  <?php
  require_once '../../app/include/footer.php';
  ?>
  <!-- FOOTER end -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <!-- font avesom -->
  <script src="https://kit.fontawesome.com/1d9689321f.js" crossorigin="anonymous"></script>
</body>

</html>