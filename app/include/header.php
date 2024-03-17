
<header class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-12">
        <h1>Початкова школа</h1>
</div>
<nav class="col-12">
<ul>
<li><a href="/index.php"><i class="fa-solid fa-house"></i> Головна</a></li>
   <li><a href="#"><i class="fa-solid fa-book"></i>Бiблiотека</a>
              <ul>
                <li><a href="/library/library-add-book.php">Додати книгу</a></li>
                <li><a href="/library/library-out.php">Видати книгу</a></li>
                <li><a href="/library/library-in.php">Повернути книгу</a></li>
                <li><a href="/library/library_fund.php">Бiблiотечний фонд</a></li>
              </ul>
            </li>
   <li>
   <?php if(isset($_SESSION['id'])){ ?>
<a href="#"><i class="fa fa-user"></i><?=$_SESSION['login'];?></a>



<?php 
if ($_SESSION['admin']==1){    ?>
    <!-- header('Location: ' . BASE_URL . 'admin/users/index.php'); -->
    <ul> <li><a href="/admin/topics/index.php">Админ панель</a></li>
    <li><a href="logout.php">Выход</a></li></ul>

    <?php }else if ($_SESSION['admin']==2){  ?>

    <ul><li><a href="library/index.php">Библиотека</a></li>
    <li><a href="logout.php">Выход</a></li></ul>
    
    <?php } else{ ?>
    


  <a href="<?php echo BASE_URL.'login.php'?>"><i class="fa fa-user"></i>Войти</a>

  <ul><li><a href="<?php echo BASE_URL. 'register.php'?>">Регистрация</a></li></ul>

<?php  } }?>
  </li>
</ul>
</nav>
</div>
</div>
</header>
