<?php // require_once'../app/include/path.php';?>
<header class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-12">

        <h1>Початкова школа</h1>

</div>
<nav class="col-12">

<ul>

<li><a href="/index.php"><i class="fa-solid fa-house"></i> Головна</a></li>

   <li><a href="#"><i class="fa-solid fa-lock"></></i>Адмiнiстрування</a>
              <ul>
                <li><a href="/administration/add-teacher.php">Додати вчителя/класс</a></li>
                <li><a href="/administration\add-student.php">Прийняти учня</a></li>
                <li><a href="/administration/school_graduate.php?action=update">Кiнець навчального року</a></li>
              </ul>
            </li>

   <li><a href="#"><i class="fa-solid fa-folder"></i>Довiдники</a>
              <ul>
                <li><a href="/referenseSheet/teacher-guide.php">Вчителiв</a></li>
                <li><a href="/referenseSheet/student-guide.php">Учня</a></li>
                <li><a href="/referenseSheet/class-guide.php">Класу</a></li>
              </ul>
            </li>

   <li><a href="#"><i class="fa-solid fa-book"></i>Бiблiотека</a>
              <ul>
                <li><a href="/library/library-add-book.php">Додати книгу</a></li>
                <li><a href="/library/library-out.php">Видати книгу</a></li>
                <li><a href="/library/library-in.php">Повернути книгу</a></li>
                <li><a href="/library/library_fund.php">Бiблiотечний фонд</a></li>
              </ul>
            </li>


   <li>

   <?php if(isset($_SESSION['id'])): ?>

<a href="#"><i class="fa fa-user"></i><?=$_SESSION['login'];?></a>

<ul>


<?php  if($_SESSION['admin']):   ?>
  <li><a href="/admin/topics/index.php">Админ панель</a></li>
  <?php  endif; ?>

  <li><a href="logout.php">Выход</a></li>
</ul>

<?php  else: ?>

  

  <a href="<?php echo BASE_URL.'login.php'?>"><i class="fa fa-user"></i>Войти</a>

<ul>
  <li><a href="<?php echo BASE_URL. 'register.php'?>">Регистрация</a></li>
  <!-- <li><a href="#">Выход</a></li> -->
</ul>
<?php  endif; ?>

    
   
   
  </li>
</ul>
<!-- <div id="wb_LoginName1" style="position:absolute;left:1104px;top:20px;
width:158px;height:20px;z-index:1;color:red;">
<span id="LoginName1" style="color:red;">Ласкаво просимо: 
   -->
  <?php
// if (isset($_COOKIE['user']))
// {
//    echo $_COOKIE['user'];
// }
// else
// {
//    echo 'Not logged in';
// }
?>

<!-- ! -->
</span>
</nav>
</div>
</div>
</header>




<!-- <a href="#"><i class="fa fa-user"></i>Кабiнет</a>
              <ul>
                <li><a href="/login.php">Авторизация</a></li>
                <li><a href="/register.php">Регистрация</a></li>
                <li><a href="#">Админ панель</a></li>
                <li><a href="#">Выход</a></li>
              </ul> -->