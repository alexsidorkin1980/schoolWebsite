<?php  

require_once 'E:\OSPanel\domains\schoolWebsite\index.php';
?>
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
<li><span></span><a href="/library/library/library-out.php" target="_self">&#1042;&#1080;&#1076;&#1072;&#1090;&#1080;&nbsp;&#1082;&#1085;&#1080;&#1075;&#1091;</a>
</li>
<li><span></span><a href="/library/library-in.php" target="_self">&#1055;&#1086;&#1074;&#1077;&#1088;&#1085;&#1091;&#1090;&#1080;&nbsp;&#1082;&#1085;&#1080;&#1075;&#1091;</a>
</li>
<li><span></span><a href="/library/library_fund.php" target="_self">&#1041;&#105;&#1073;&#1083;&#105;&#1086;&#1090;&#1077;&#1095;&#1085;&#1080;&#1081;&#32;&#1092;&#1086;&#1085;&#1076;</a>
</li>
</ul>
</li>
</ul>


<div id="wb_Form1" style="position:absolute;left:140px;top:133px;width:733px;height:252px;z-index:11;">
<form name="Form1" method="post" action="" enctype="multipart/form-data" id="Form1">
<div id="wb_Heading1" style="position:absolute;left:103px;top:10px;width:484px;height:39px;z-index:2;">
<h1 id="Heading1">Видати книгу</h1></div>
<div id="wb_Text2" style="position:absolute;left:31px;top:75px;width:157px;height:15px;z-index:3;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Інв номер:</span></div>
<input type="submit"id="Button1"style="position:absolute;left:216px;top:199px;width:94px;height:23px;z-index:4;"value="Submit">
<input type="reset" id="Button2" name="" value="Reset" style="position:absolute;left:376px;top:199px;width:96px;height:25px;z-index:5;">
<div id="wb_Text3" style="position:absolute;left:31px;top:124px;width:123px;height:15px;z-index:6;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Кому:</span></div>
<input type="text" id="Editbox3" 
style="position:absolute;left:177px;top:64px;width:79px;height:16px;z-index:7;" 
name="Editbox3" value="" spellcheck="false">
<?php
echo $look;

?>
<div id="wb_Text1" style="position:absolute;left:177px;top:158px;width:244px;height:15px;z-index:9;">
<span style="background-color:#FBFBFB;color:#FF0000;font-family:Arial;font-size:13px;">
<em><u><?php echo $text;?> </u></em></span>
<span style="background-color:#FBFBFB;color:#FF0000;font-family:Arial;font-size:13px;"><?=$text1?></span>
</div>


</form>
</div>