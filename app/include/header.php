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
<body> -->


<!-- <div id="wb_LoginName1" style="position:absolute;left:904px;top:20px;width:158px;height:20px;z-index:1;">
<span id="LoginName1">Welcome <?php
// if (isset($_COOKIE['user']))
// {
//    echo $_COOKIE['user'];
// }
// else
// {
//    echo 'Not logged in';
// }
?>

!
</span>
<a href="\administration\test.php">ссылка </a>
<div><a id="Button1" href="/config/login.php" style="position:absolute;left:150px;top:0px;width:157px;height:20px;z-index:1;">авторизация</a>
<a id="Button1" href="/config/register.php" style="position:absolute;left:320px;top:0px;width:157px;height:20px;z-index:1;">регистрация</a>
<a id="" href="../config/login.php?coock=update" style="position:absolute;left:520px;top:0px;font-size:20px;color:red;">выход</a>
</div>

</div> -->


<!-- <div class="container"> -->
<!-- <div id="PageHeader1" style="position:absolute;text-align:left;left:0px;top:0px;width:100%;height:108px;z-index:4;">
  
<div id="wb_TextArt1" style="position:absolute;left:167px;top:0px;width:637px;height:60px;z-index:0;"> -->

<header class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-12">

        <h1>Початкова школа</h1>

</div>
<nav class="col-12">

<ul>
<li><a href="/index.php">
                <i class="fa-solid fa-house"></i> Головна</a></li>
   <li><a href="#"><i class="fa-solid fa-lock"></></i>Адмiнiстрування</a>
              <ul>
                <li><a href="/administration/add-teacher.php">Додати вчителя/класс</a></li>
                <li><a href="\administration\add-student.php">Прийняти учня</a></li>
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
   <li><a href="#"><i class="fa fa-user"></i>Кабiнет</a>
              <ul>
                <li><a href="/login.php">Авторизация</a></li>
                <li><a href="/register.php">Регистрация</a></li>
                <li><a href="#">Админ панель</a></li>
                <li><a href="#">Выход</a></li>
              </ul>
            </li>
</ul>
<div id="wb_LoginName1" style="position:absolute;left:1104px;top:20px;
width:158px;height:20px;z-index:1;color:red;">
<span id="LoginName1" style="color:red;">Ласкаво просимо: 
  
  <?php
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

<!-- <ul style="display:block;">
<li><span></span><a href="/index.php" target="_self">&#1043;&#1086;&#1083;&#1086;&#1074;&#1085;&#1072;</a>
</li>
<li><span></span><span>&#1040;&#1076;&#1084;&#1110;&#1085;&#1110;&#1089;&#1090;&#1088;&#1091;&#1074;&#1072;&#1085;&#1085;&#1103;</span>
<ul>
<li><span></span><a href="/administration/add-teacher.php" target="_self">&#1044;&#1086;&#1076;&#1072;&#1090;&#1080;&nbsp;&#1074;&#1095;&#1080;&#1090;&#1077;&#1083;&#1103;&#1082;&#1083;&#1072;&#1089;</a></li>
<li><span></span><span><a href="
/administration/school_graduate.php?action=update" target="_self">&#1050;&#1110;&#1085;&#1077;&#1094;&#1100;&nbsp;&#1085;&#1072;&#1074;&#1095;&#1072;&#1083;&#1100;&#1085;&#1086;&#1075;&#1086;&nbsp;&#1088;&#1086;&#1082;&#1091;</a></span></li>
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
</ul> -->

</nav>

</div>
</div>
</header>






<!-- <img src="/assets/images/img0001.png" id="TextArt1" class="text-center"> -->

 <!-- alt="&#1055;&#1086;&#1095;&#1072;&#1090;&#1082;&#1086;&#1074;&#1072; 
&#1096;&#1082;&#1086;&#1083;&#1072;" title="&#1055;&#1086;&#1095;&#1072;&#1090;&#1082;&#1086;
&#1074;&#1072; &#1096;&#1082;&#1086;&#1083;&#1072;" style="width:637px;height:60px;"-->

<!-- <div id="wb_MenuBar1" style="position:absolute;left:342px;top:76px;width:311px;height:40px;z-index:1003;">
<div id="MenuBar1"> -->


<!-- <ul style="display:none;">
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
</ul> -->



<!-- </div>


</div> -->


<!-- </body>
</html> -->
