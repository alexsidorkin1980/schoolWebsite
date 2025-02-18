<?php
session_start();

require_once '../../path.php';
require_once '../../app/controllers/students.php';

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
    <div class="posts col-10">
      <div class="button row">
        <a href="<?= BASE_URL . "admin/students/create.php" ?>" class="col-2 btn btn-success">Создать</a>
        <span class="col-1"></span>
        <a href="<?= BASE_URL . "admin/students/index.php" ?>" class="col-3 btn btn-warning">Изменить</a>

      </div>


      <div class="row title-table">
        <h2>Добавление ученика</h2>
      </div>

      <div class="row add-post">

        <div class="mb-12 col-12 col-md-12 err">
          <p>
            <?php require_once '../../app/helps/errorInfo.php'; ?>
          </p>
        </div>
        <form action="edit.php" method='post'>
          <input type="hidden" name='id' value='<?= $id ?>'>
          <div class="col">
            <label for="formGroupExampleInput" class="form-label">ФИО</label>
            <input name="name" value="<?= $name; ?>" type="text" class="form-control" id="formGroupExampleInput"
              placeholder="Введите фамилию имя отчество ...">
          </div>
          <div class="w-100"></div>
          <div class="col">
            <div class="col">
              <label for="exampleInputPassword1" class="form-label">Дата рождения</label>
              <input name="dateOfBirth" type="date" value="<?= $dateOfBirth; ?>" class="form-control"
                id="exampleInputPassword1" placeholder="Введите дату рождения...">
            </div>
            <div class="col">
              <label for="exampleInputPassword1" class="form-label">Класс</label>

              <?php require_once '../../app/helps/combobox.php'; ?>

            </div>
            <div class="w-100"></div>
            <label for="exampleInputEmail1" class="form-label">Почта</label>
            <input name="email" value="<?= $email; ?>" type="email" class="form-control" id="exampleInputEmail1"
              aria-describedby="emailHelp" placeholder="Введите вашу почту...">
            <div id="emailHelp" class="form-text"></div>
          </div>
          <div class="w-100"></div>
          <div class="col">
            <label for="exampleInputPassword1" class="form-label">Адрес</label>
            <input name="address" value="<?= $address; ?>" type="text" class="form-control" id="exampleInputPassword1"
              placeholder="Введите домашний адрес...">
          </div>
          <div class="w-100"></div>
          <div class="col">
            <label for="exampleInputPassword1" class="form-label">Телефон</label>
            <input name="phon_number" value="<?= $phon_number; ?>" type="tel" class="form-control"
              id="exampleInputPassword1" placeholder="Введите номер телефона...">
          </div>
          <div class="w-100"></div>

          <div class="col">
            <button class="btn btn-primary" name="edit_student" type="submit">Обновить</button>
          </div>

        </form>
      </div>
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