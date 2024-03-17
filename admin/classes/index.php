<?php
session_start();

require_once '../../path.php';
require_once '../../app/controllers/classes.php';
$teacherClass = selectAllFromClassesWithTeachersOneIndex('classes', 'teachers');
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

  <?php require_once '../../app/include/header-admin.php'; ?>


  <div class="container">

    <?php require_once '../../app/include/sidebar-admin.php'; ?>

    <div class="posts col-8">
      <div class="button row">
        <a href="<?= BASE_URL . "admin/classes/create.php" ?>" class="col-2 btn btn-success">Добавить</a>
        <span class="col-1"></span>
        <a href="<?= BASE_URL . "admin/classes/index.php" ?>" class="col-3 btn btn-warning">Изменить</a>

      </div>

      <div class="row title-table">
        <h2>Управление классами</h2>
        <div class=" col-1">ID</div>
        <div class=" col-2">Класс</div>
        <div class="  col-4">Учитель</div>
        <div class=" col-5">Управление</div>
      </div>

      <?php foreach ($teacherClass as $key => $teach) { ?>
        <div class="row post">
          <div class="id col-1">
            <?= $key + 1 ?>
          </div>
          <div class="id col-2">
            <?= $teach['number'] . '-' . $teach['letter'] ?>
          </div>
          <?php if (!empty($teach['name'])) { ?>
            <div class="title  col-4">
              <?= $teach['name'] ?>
            </div>
          <?php } else { ?>
            <div class="title  col-4">
              <?= 'учитель отсутствует' ?>
            </div>
          <?php } ?>
          <div class="del col-5"><a href="index.php?id=<?= $teach['id'] ?>">delete</a></div>
        </div>
      <?php } ?>
    </div>
  </div>
  </div>

  <?php require_once '../../app/include/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/1d9689321f.js" crossorigin="anonymous"></script>

</body>

</html>