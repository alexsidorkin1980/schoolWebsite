<?php
session_start();

require_once '../../path.php';
require_once '../../app/controllers/students.php';
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
      <table class="table ">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">ФИО </th>
            <th scope="col">Дата рождения </th>
            <th scope="col">Email</th>
            <th scope="col">Адрес</th>
            <th scope="col">Телефон</th>
            <th scope="col"></th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <th scope="col">
              <?= $id ?>
            </th>
            <th scope="col">
              <?= $name ?>
            </th>
            <th scope="col">
              <?= $dateOfBirth ?>
            </th>
            <th scope="col">
              <?= $email ?>
            </th>
            <th scope="col">
              <?= $address ?>
            </th>
            <th scope="col">
              <?= $phon_number ?>
            </th>
            <th scope="col"></th>
          </tr>
        </tbody>
      </table>
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