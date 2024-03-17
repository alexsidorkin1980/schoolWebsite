<?php
session_start();
require_once 'path.php';
require_once 'app/controllers/topics.php';

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 4;
$offset = $limit * $page;
$total_pages = round(countRow('posts') / $limit, 0);

$posts = selectAllFromPostsWithUsersOneIndex('posts', 'users', $limit, $offset);
$topTopics = selectTopTopicFromPostsOneIndex('posts');
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
  <link rel="stylesheet" href="/assets/css/style.css">

</head>

<body>

  <!-- header  -->
  <?php require_once 'app/include/header.php'; ?>
  <!-- header end -->

  <!-- блок main start  -->
  <div class="container">
    <div class="content row">

      <!-- sidebar content -->
      <div class="sidebar col-md-3 col-12 ">
        <div class="section search">
          <h3>Пошук</h3>
          <form action="search.php" method="post">
            <input type="text" name="search-term" class="text-input" placeholder="Введiть слово для пошуку...">
          </form>
        </div>
        <div class="section topics">
          <h3>Категорii</h3>
          <ul>
            <?php
            foreach ($topics as $key => $topic) { ?>
              <li><a href="<?= BASE_URL . "category.php?id=" . $topic['id'] ?>">
                  <?= $topic['name']; ?>
                </a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <!-- sidebar content end-->

      <!-- блок main content    -->
      <div class="main-conent col-md-9 col-12">
        <h2>Последние публикации</h2>
        <?php

        foreach ($posts as $post) {
          ?>
          <div class="post row">
            <div class="img col-12 col-md-4">
              <img src="<?= BASE_URL . "/assets/images/posts/" . $post['img']; ?>" alt="<?= $post['title'] ?>"
                class="img-thumbnail">
            </div>
            <div class="post_text col-12 col-md-8">
              <h3>
                <?php
                if (strlen($post['title']) < 35) {
                  ?>
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
              <p class="preview-text"><?= mb_substr($post['content'], 0, 254, 'UTF-8') . '...' ?></p>
            </div>
          </div>
        <?php } ?>

        <!-- пагинация start -->
        <?php
        require_once 'app/include/pagination.php';
        ?>
        <!-- пагинация end -->
      </div>
      <!-- блок main content end   -->
    </div>
  </div>

  <!-- блок main end  -->

  <!-- footer -->

  <?php require_once 'app/include/footer.php'; ?>
  <!-- footer end -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/1d9689321f.js" crossorigin="anonymous"></script>

</body>

</html>