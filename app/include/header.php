<?php
session_start();
$_SESSION['id'] = 1;
$_SESSION['login'] = 'max';
$_SESSION['admin'] = 2;
?>

<header class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Початкова школа</h1>
      </div>
      <nav class="col-12">
        <ul>
          <li><a href="/index.php"><i class="fa-solid fa-house"></i> Головна</a></li>
          <li><a href="#"><i class="fa-solid fa-book"></i>Войти</a>
            <ul>
              <li><a href="/library/library-add-book.php"><a href="<?php echo BASE_URL . 'login.php' ?>"><i
                      class="fa fa-user"></i>Войти</a></a></li>
              <li><a href="/library/library-out.php"><a href="<?php echo BASE_URL . 'register.php' ?>">Регистрация</a></a>
              </li>
            </ul>
          </li>
          <li>
            <?php if (isset($_SESSION['id'])) { ?>
              <a href="#"><i class="fa fa-user"></i>
                <?= $_SESSION['login']; ?>
              </a>

              <?php
              if ($_SESSION['admin'] == 1) { ?>
                <ul>
                  <li><a href="/admin/topics/index.php">Админ панель</a></li>
                  <li><a href="logout.php">Выход</a></li>
                </ul>

              <?php } else if ($_SESSION['admin'] == 2) { ?>

                  <ul>
                    <li><a href="library/index.php">Библиотека</a></li>

                    <li><a href="logout.php">Выход</a></li>
                  </ul>

              <?php } ?>

            <?php }
            ?>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</header>