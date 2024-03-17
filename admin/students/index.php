<?php
session_start();

require_once '../../path.php';
require_once '../../app/controllers/students.php';
$students = selectAllFromClasssWithStudentsOneIndex('classes', 'students');
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Початкова школа</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/css/admin.css">

</head>

<body>
  <!-- header  -->
  <?php require_once '../../app/include/header-admin.php'; ?>
  <!-- header end -->

  <div class="container">
    <!-- sidebar start -->
    <?php require_once '../../app/include/sidebar-admin.php'; ?>
    <!-- sidebar end -->

    <div class="posts col-10">
      <div class="button row">
        <a href="<?= BASE_URL . "admin/students/create.php" ?>" class="col-2 btn btn-success">Добавить</a>
        <span class="col-1"></span>
        <a href="<?= BASE_URL . "admin/students/index.php" ?>" class="col-3 btn btn-warning">Изменить</a>

      </div>

      <div class="row title-table">
        <h2>Управление учениками</h2>
        <div class=" col-1">ID</div>
        <div class=" col-3">ФИО</div>
        <div class="  col-1">класс</div>
        <div class="del col-2"><a href="">Управление</a></div>
        <div class="  col-5">Доп. сведения</div>

      </div>

      <?php foreach ($students as $student) { ?>
        <div class="row post">
          <div class="id col-1">
            <?= $student['id'] ?>
          </div>
          <div class="id col-3"><a href="">
              <?= $student['name'] ?>
            </a></div>
          <div class="title  col-1"><?= $student['number'] . '-' . $student['letter'] ?></div>
          <div class="del col-1"><a href="edit.php?id=<?= $student['id'] ?>">edit</a></div>
          <div class="del col-1"><a href="index.php?id_delete=<?= $student['id'] ?>">delete</a></div>
          <div class="title  col-5"><a href="info.php?id_inf=<?= $student['id'] ?>">>>>></a></div>
        </div>
      <?php } ?>

    </div>
  </div>
  <!-- footer -->

  <?php require_once '../../app/include/footer.php'; ?>
  <!-- footer end -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/1d9689321f.js" crossorigin="anonymous"></script>

</body>

</html>