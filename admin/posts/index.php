<?php
session_start();

require_once '../../path.php';
require_once '../../app/controllers/posts.php';
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
    <?php require_once '../../app/include/sidebar-admin.php'; ?>

    <div class="posts col-8">
      <div class="button row">
        <a href="<?= BASE_URL . "admin/posts/create.php" ?>" class="col-2 btn btn-success">Создать</a>
        <span class="col-1"></span>
        <a href="<?= BASE_URL . "admin/posts/index.php" ?>" class="col-3 btn btn-warning">Изменить</a>

      </div>

      <div class="row title-table">
        <h2>Управление записями</h2>
        <div class=" col-1">ID</div>
        <div class=" col-3">Название</div>
        <div class="  col-2">Автор</div>
        <div class=" col-6">Управление</div>
      </div>

      <?php foreach ($postsAdm as $key => $post) { ?>
        <div class="row post">
          <div class="id col-1">
            <?= $key + 1 ?>
          </div>
          <div class="id col-3">
            <?= $post['title'] ?>
          </div>
          <div class="title  col-2">
            <?= $post['username'] ?>
          </div>
          <div class="red  col-2"><a href="edit.php?id=<?= $post['id'] ?>">edit</a></div>
          <div class="del col-2"><a href="edit.php?delete_id=<?= $post['id'] ?>">delete</a></div>

          <?php if ($post['status']) { ?>
            <div class="status col-2"><a href="edit.php?publish=0&id_pub=<?= $post['id'] ?>">unpublish</a></div>
          <?php } else { ?>
            <div class="status col-2"><a href="edit.php?publish=1&id_pub=<?= $post['id'] ?>">publish</a></div>
          <?php } ?>
        </div>
      <?php } ?>

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