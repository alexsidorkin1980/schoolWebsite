<?php 
session_start();
require_once 'path.php'; 
require_once 'app/controllers/topics.php'; 
// require_once 'app/controllers/posts.php'; 

$page=isset($_GET['page']) ? $_GET['page']:1 ;
  $limit=4;
  $offset= $limit * $page;
  $total_pages= round(countRow('posts')/$limit,0);
    
  $posts = selectAllFromPostsWithUsersOneIndex('posts','users', $limit , $offset);
  $topTopics =selectTopTopicFromPostsOneIndex('posts');

// $posts=selectAllFromPostsWithUsersOneIndex('posts','users');
  //  tt($total_pages);
  ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Початкова школа</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/style.css">

   </head>
  <body>


  
   <!-- header  -->
   <?php require_once 'app/include/header.php';?>
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
  foreach($topics as $key=>$topic){ ?>
    <li><a href="<?=BASE_URL."category.php?id=" .$topic['id']?>"><?=$topic['name'];?></a></li>
    <?php }?>
  </ul>

</div>


      </div>
<!-- sidebar content end-->

<!-- блок main content    -->
    <div class="main-conent col-md-9 col-12">

        <h2>Последние публикации</h2>
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
            <i class="far fa-user"><?=$post['username']?></i>
            <i class="far fa-calendar "><?=$post['created_data']?></i>

            <!-- <p class="preview-text"><?//=substr($post['content'],0,420).'...'?></p> -->
            <p class="preview-text"><?=mb_substr($post['content'],0,254,'UTF-8').'...'?></p>
          </div>
        </div>
<?php }?>
         
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

   <?php require_once 'app/include/footer.php';?>
<!-- footer end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1d9689321f.js" crossorigin="anonymous"></script>

   </body>
</html>









<!-- <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Безымянная страница</title>
<meta name="generator" content="WYSIWYG Web Builder 15 - http://www.wysiwygwebbuilder.com">

<link href="/assets/css/Мододша_школа.css" rel="stylesheet">
<link href="/assets/css/index.css" rel="stylesheet">
<link href="/assets/css/add-teacher.css" rel="stylesheet" >
<link href="/assets/css/student-guide.css" rel="stylesheet">
<link href="/assets/css/class-guide.css" rel="stylesheet">
<link href="/assets/css/teacher-guide.css" rel="stylesheet">
<link href="../css/library-out.css" rel="stylesheet">
<link href="../css/library_fund.css" rel="stylesheet">
<link href="css/library-add-book.css" rel="stylesheet">
<link href="../css/library-in.css" rel="stylesheet">
<link href="css/add-student.css" rel="stylesheet">
<script src="/assets/js/jscookmenu.min.js"></script>
</head>
<body>
<div id="PageHeader1" style="position:absolute;text-align:left;left:0px;top:0px;width:100%;height:108px;z-index:4;">
<div id="wb_TextArt1" style="position:absolute;left:167px;top:0px;width:637px;height:60px;z-index:0;">
<img src="/assets/images/img0001.png" id="TextArt1" 
alt="&#1055;&#1086;&#1095;&#1072;&#1090;&#1082;&#1086;&#1074;&#1072; 
&#1096;&#1082;&#1086;&#1083;&#1072;" title="&#1055;&#1086;&#1095;&#1072;&#1090;&#1082;&#1086;
&#1074;&#1072; &#1096;&#1082;&#1086;&#1083;&#1072;" style="width:637px;height:60px;"></div>
<div id="wb_LoginName1" style="position:absolute;left:904px;top:20px;width:158px;height:20px;z-index:1;">
<span id="LoginName1">Welcome <?php
if (isset($_COOKIE['user']))
{
   echo $_COOKIE['user'];
}
else
{
   echo 'Not logged in';
}
?>

!
</span>
<a href="\administration\test.php">ссылка </a>
<div><a id="Button1" href="/config/login.php" style="position:absolute;left:150px;top:0px;width:157px;height:20px;z-index:1;">авторизация</a>
<a id="Button1" href="/config/register.php" style="position:absolute;left:320px;top:0px;width:157px;height:20px;z-index:1;">регистрация</a>
<a id="" href="../config/login.php?coock=update" style="position:absolute;left:520px;top:0px;font-size:20px;color:red;">выход</a>
</div>

</div>
</div>


<div id="wb_MenuBar1" style="position:absolute;left:342px;top:76px;width:311px;height:40px;z-index:1003;">
<div id="MenuBar1">


<ul style="display:none;">
<li><span></span><a href="/index.php" target="_self">&#1043;&#1086;&#1083;&#1086;&#1074;&#1085;&#1072;</a>
</li>
<li><span></span><span>&#1040;&#1076;&#1084;&#1110;&#1085;&#1110;&#1089;&#1090;&#1088;&#1091;&#1074;&#1072;&#1085;&#1085;&#1103;</span>
<ul>
<li><span></span><a href="/administration/add-teacher.php" target="_self">&#1044;&#1086;&#1076;&#1072;&#1090;&#1080;&nbsp;&#1074;&#1095;&#1080;&#1090;&#1077;&#1083;&#1103;&#1082;&#1083;&#1072;&#1089;</a></li>
<li><span></span><a href="/administration/add-student.php" target="_self">&#1055;&#1088;&#1080;&#1081;&#1085;&#1103;&#1090;&#1080;&nbsp;&#1091;&#1095;&#1085;&#1103;</a></li>
<li><span></span><span><a href="/administration/school_graduate.php?action=update" target="_self">&#1050;&#1110;&#1085;&#1077;&#1094;&#1100;&nbsp;&#1085;&#1072;&#1074;&#1095;&#1072;&#1083;&#1100;&#1085;&#1086;&#1075;&#1086;&nbsp;&#1088;&#1086;&#1082;&#1091;</a></span></li>
</ul>
</li>
<li><span></span><span>&#1044;&#1086;&#1074;&#1110;&#1076;&#1085;&#1080;&#1082;&#1080;</span>
<ul>
<li><span></span><a href="/referenseSheet/teacher-guide.php" target="_self">&#1042;&#1095;&#1080;&#1090;&#1077;&#1083;&#1110;&#1074;</a>
</li>
<li><span></span><a href="/referenseSheet/student-guide.php" target="_self">&#1059;&#1095;&#1085;&#1103;</a>
</li>
<li><span></span><a href="/referenseSheet/class-guide.php" target="_self">&#1050;&#1083;&#1072;&#1089;&#1091;</a>
</li>
</ul>
</li>
<li><span></span><span>&#1041;&#1110;&#1073;&#1083;&#1110;&#1086;&#1090;&#1077;&#1082;&#1072;</span>
<ul>
<li><span></span><a href="/library/library-add-book.php" target="_self">&#1044;&#1086;&#1076;&#1072;&#1090;&#1080;&nbsp;&#1082;&#1085;&#1080;&#1075;&#1091;</a>
</li>
<li><span></span><a href="/library/library-out.php" target="_self">&#1042;&#1080;&#1076;&#1072;&#1090;&#1080;&nbsp;&#1082;&#1085;&#1080;&#1075;&#1091;</a>
</li>
<li><span></span><a href="/library/library-in.php" target="_self">&#1055;&#1086;&#1074;&#1077;&#1088;&#1085;&#1091;&#1090;&#1080;&nbsp;&#1082;&#1085;&#1080;&#1075;&#1091;</a>
</li>
<li><span></span><a href="/library/library_fund.php" target="_self">&#1041;&#105;&#1073;&#1083;&#105;&#1086;&#1090;&#1077;&#1095;&#1085;&#1080;&#1081;&#32;&#1092;&#1086;&#1085;&#1076;</a>
</li>
</ul>
</li>
</ul>



</div>

<script>
var cmMenuBar1 =
{
   mainFolderLeft: '',
   mainFolderRight: '',
   mainItemLeft: '',
   mainItemRight: '',
   folderLeft: '',
   folderRight: '',
   itemLeft: '',
   itemRight: '',
   mainSpacing: 0,
   subSpacing: 0,
   delay: 100,
   offsetHMainAdjust: [0, 0],
   offsetSubAdjust: [0, 0]
};
var cmMenuBar1HSplit = [_cmNoClick, '<td class="MenuBar1MenuSplitLeft"><div></div></td>' +
                                       '<td class="MenuBar1MenuSplitText"><div></div></td>' +
                                       '<td class="MenuBar1MenuSplitRight"><div></div></td>'];
var cmMenuBar1MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar1HorizontalSplit">|</td></tr></table></div>'];
var cmMenuBar1MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar1MainSplitText"><div></div></td>'];
cmDrawFromText('MenuBar1', 'hbr', cmMenuBar1, 'MenuBar1');
</script>
</div>


</body>
</html>
 -->
