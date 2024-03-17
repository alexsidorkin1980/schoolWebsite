<?php
session_start();

require_once 'path.php';
require_once 'app/database/db.php';
require_once 'app/controllers/topics.php';
require_once 'app/controllers/posts.php';

$post = selectOne('posts', ['id' => $_GET['post']]);
$user = selectOne('users', ['id' => $post['id_user']]);
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
  <link rel="stylesheet" href="assets/css/style.css">
  <title>My blog</title>
</head>

<body>
  <!-- HEADER -->
  <?php
  require_once 'app/include/header.php';
  ?>
  <!-- END HEADER -->

  <!-- блок main start  -->
  <div class="container">
    <div class="content row">
      <!-- main content -->
      <div class="main-conent col-md-9 col-12">
      </div>
      <!-- блок main content end   -->
      <h2>
        <?= $post['title'] ?>
      </h2>
      <div class="single_post row">
        <div class="img col-12">
          <img src="<?= BASE_URL . "/assets/images/posts/" . $post['img']; ?>" alt="<?= $post['title'] ?>"
            class="img-thumbnail">
        </div>
        <div class="info">
          <i class="far fa-user">
            <?= $user['username'] ?>
          </i>
          <i class="far fa-calendar ">
            <?= $post['created_data'] ?>
          </i>
        </div>
        <div class="single_post_text col-12 ">
          <h3>
            <?= $post['content'] ?>
          </h3>
        </div>
      </div>
    </div>
  </div>

  <!-- блок main end  -->

  <!-- FOOTER  -->

  <?php
  require_once 'app/include/footer.php';
  ?>
  <!-- FOOTER end -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <!-- font avesom -->
  <script src="https://kit.fontawesome.com/1d9689321f.js" crossorigin="anonymous"></script>
</body>

</html>