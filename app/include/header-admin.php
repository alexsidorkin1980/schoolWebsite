
<?php //unset($_SESSION['login']);
session_start(); 

?>
<header class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-4">
          <h1><a href=" <?php echo BASE_URL ?> ">Початкова школа</a></h1>
        </div>
        <nav class="col-8">      
          <ul>   
            <li>

<a href="#">
  <i class="fa fa-user"></i>
  <?=$_SESSION['login'];?>
</a></li>

  <li><a href="../../logout.php">Выход</a></li>
        
          </ul>
        </nav>
      </div>
    </div>
  </header>
