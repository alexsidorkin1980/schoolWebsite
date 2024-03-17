<?php
session_start();

require_once '../../path.php';
require_once '../../app/controllers/classes.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/css/admin.css">
  <title>My blog</title>
</head>

<body>

  <?php
  require_once '../../app/include/header-admin.php';
  ?>

  <div class="container">
    <?php require_once '../../app/include/sidebar-admin.php'; ?>
    <div class="posts col-8">
      <div class="button row">
        <a href="<?= BASE_URL . "admin/classes/create.php" ?>" class="col-2 btn btn-success">Создать</a>
        <span class="col-1"></span>
        <a href="<?= BASE_URL . "admin/classes/index.php" ?>" class="col-3 btn btn-warning">Изменить</a>

      </div>


      <div class="row title-table">
        <h2>Добавление класса</h2>
      </div>

      <div class="row add-post">
        <div class="mb-12 col-12 col-md-12 err">
          <?php require_once '../../app/helps/errorInfo.php'; ?>
          </p>
        </div>

        <form action="create.php" method='post'>

          <div class="col">
            <label for="formGroupExampleInput" class="form-label">Введите класс</label>
            <select class="form-select" name="number" aria-label="Default select example">
              <option selected></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>

          <div class="w-100"></div>
          <div class="col">
            <label for="exampleInputEmail1" class="form-label">Введите букву</label>
            <select class="form-select" name="letter" aria-label="Default select example">
              <option selected></option>
              <option value="А">А</option>
              <option value="Б">Б</option>
              <option value="В">В</option>
              <option value="Г">Г</option>
            </select>
            <div id="emailHelp" class="form-text"></div>
          </div>
          <div class="col">
            <button class="btn btn-primary" name="creat_class" type="submit">Создать</button>
          </div>

        </form>
      </div>
    </div>
  </div>
  </div>

  <?php
  require_once '../../app/include/footer.php';
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <script src="https://kit.fontawesome.com/1d9689321f.js" crossorigin="anonymous"></script>
</body>

</html>