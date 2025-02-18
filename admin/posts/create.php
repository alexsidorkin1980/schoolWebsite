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
        <h2>Добавление записи</h2>
      </div>

      <div class="row add-post">
        <div class="mb-12 col-12 col-md-12 err">
          <p>
            <?php require_once '../../app/helps/errorInfo.php'; ?>
          </p>
        </div>

        <form action="create.php" method='post' enctype="multipart/form-data">
          <div class="col mb-4">
            <input type="text" name='title' value='<?= $title ?>' class="form-control" placeholder="Название"
              aria-label="Название">
          </div>
          <div class="col">
            <label for="editor" class="form-label ">Содержимое записи</label>
            <textarea id='editor' name='content' class="form-control" rows="6"><?= $content ?></textarea>
          </div>
          <div class="input-group col mb-4 mt-4">
            <input type="file" class="form-control" name='img' id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
          </div>
          <select class="form-select mb-2" name='topic' aria-label="Default select example">
            <option selected disabled>Выбор категории:</option>
            <?php foreach ($topics as $topic) { ?>
              <option value=" <?= $topic['id'] ?>">
                <?= $topic['name'] ?>
              </option>
            <?php } ?>
          </select>

          <div class="form-check">
            <input name='publish' class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckChecked">
              Publish
            </label>
          </div>
          <div class="col mb-4">
            <button class="btn btn-primary" name='add_post' type="submit">Сохранить запись</button>
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

  <!-- добавление визуального редактора к текстовому полю админки -->
  <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
  <script src="../../assets/js/script.js"></script>
</body>

</html>