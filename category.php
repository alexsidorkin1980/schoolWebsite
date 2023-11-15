<?php 
session_start();

  require_once 'path.php'; 
  //  require_once 'app/database/db.php';
  require_once 'app/controllers/topics.php';        
  // require_once 'app/controllers/posts.php';   <?php }else{ <?php  } 
  
  
 $posts = selectAll('posts',['id_topic'=>$_GET['id']]);
//  tt($posts);
//  exit();

 $topTopics =selectTopTopicFromPostsOneIndex('posts');
 $category=selectOne('topics',['id'=>$_GET['id']]);

 if(empty($posts)){
  array_push($errMsg,"В разделе нет статей!!! ");

  }


  ?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->

  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
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

        <h2>Статьи раздела <?=$category['name'] ?></h2>

        <div class="mb-12 col-12 col-md-12 err"> 
              <!-- вывод массива с ошибками -->
              <?php require_once 'app/helps/errorInfo.php'; ?>
         </div>
         <?php    
foreach($posts as $post){
  ?><?php //tt($post);   exit()?>
        <div class="post row">
          <div class="img col-12 col-md-4">
          <img src="<?=BASE_URL."/assets/images/posts/" . $post['img'] ;?>" alt="<?=$post['title']?>" class="img-thumbnail">
          </div>
          <div class="post_text col-12 col-md-8">
            <h3>

            <?php 
            if(strlen($post['title'])<35){ 
?>
              <a href="<?=BASE_URL."single.php?post=" . $post['id'] ;?>"><?=$post['title']?></a>
              <?php }else{?>
              <a href="<?=BASE_URL."single.php?post=" . $post['id'] ;?>"><?= substr($post['title'],0,45).'...'?></a>
              <?php }?>
            </h3>
            <!-- <i class="far fa-user"><?//=$post['username']?></i> -->
            <i class="far fa-calendar "><?=$post['created_data']?></i>

            <!-- <p class="preview-text"><?//=substr($post['content'],0,420).'...'?></p> -->
            <p class="preview-text"><?=mb_substr($post['content'],0,254,'UTF-8').'...'?></p>
              
          </div>
        </div>
<?php }?>
         
        </div>

        <!-- sidebar content -->
 <div class="sidebar col-md-3 col-12 ">

<div class="section search">
  <h3>Search</h3>
  <form action="search.php" method="post">
    <input type="text" name="search-term" class="text-input" placeholder="Введите искомое слово...">
  </form>
</div>


<div class="section topics">
  <h3>Категории</h3>

  <ul>

  <?php
  foreach($topics as $key=> $topic){ ?>
    <li><a href="<?=BASE_URL."category.php?id=" .$topic['id']?>"> <?= $topic['name'] ;?></a></li>
   <?php  }?>
  </ul>

</div>


      </div>
<!-- sidebar content end-->


</div>
<!-- блок main content end   -->


 

 
    </div>

  </div>

  <!-- блок main end  -->


<!-- FOOTER  -->

<?php 
  require_once 'app/include/footer.php'; 
  ?>
<!-- FOOTER end -->



  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
  crossorigin="anonymous"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script> -->

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  <!-- font avesom -->
  <script src="https://kit.fontawesome.com/1d9689321f.js" crossorigin="anonymous"></script>
</body>

</html>





<?php //if(empty($post)){ ?>
         
              <!-- <p class="preview-text"><? //=array_push($errMsg,"В разделе нет статей!!! ")?></p>
             
              <div class="mb-12 col-12 col-md-12 err"> -->
              <!-- вывод массива с ошибками -->
              <?php // require_once 'app/helps/errorInfo.php'; ?>
            <!-- </div>
        -->
            <?php //}else{ ?> 