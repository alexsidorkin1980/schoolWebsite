<?php
session_start();

require_once 'path.php';
require_once 'app/database/db.php';
$errMsg = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search-term'])) {

  $posts = searchInTitleAndContent($_POST['search-term'], 'posts', 'users');
  if (empty($posts)) {
    header('Location: ' . BASE_URL . 'index.php');
  } else {


    //  tt($posts);
//     exit();
  }


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
        <div class="main-conent  col-12">

          <h2>Результаты поиска</h2>
          <?php foreach ($posts as $post) { ?>
            <div class="post row">
              <div class="img col-12 col-md-4">
                <img src="<?= BASE_URL . "/assets/images/posts/" . $post['img']; ?>" alt="<?= $post['title'] ?>"
                  class="img-thumbnail">
              </div>
              <div class="post_text col-12 col-md-8">
                <h3>

                  <?php
                  if (strlen($post['title']) < 35) { ?>
                    <a href="<?= BASE_URL . "single.php?post=" . $post['id']; ?>">
                      <?= $post['title'] ?>
                    </a>
                  <?php } else { ?>
                    <a href="<?= BASE_URL . "single.php?post=" . $post['id']; ?>">
                      <?= substr($post['title'], 0, 45) . '...' ?>
                    </a>
                  <?php } ?>
                </h3>
                <i class="far fa-user">
                  <?= $post['username'] ?>
                </i>
                <i class="far fa-calendar ">
                  <?= $post['created_data'] ?>
                </i>
                <p class="preview-text"><?= mb_substr($post['content'], 0, 1243, 'UTF-8') . '...' ?></p>
              </div>
            </div>
          <?php } ?>

        </div>
      </div>
      <!-- блок main content end   -->
    </div>

    </div>

    <!-- блок main end  -->

    <!-- FOOTER  -->
    <?php
    require_once 'app/include/footer.php';
}
?>
  <!-- FOOTER end -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <!-- font avesom -->
  <script src="https://kit.fontawesome.com/1d9689321f.js" crossorigin="anonymous"></script>
</body>

</html>