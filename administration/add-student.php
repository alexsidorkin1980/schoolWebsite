

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
  <link rel="stylesheet" href="/assets/css/add-student.css">

   </head>
  <body>
  <?php require_once '../app\include\access-check.php';?>
   <!-- header  -->
   <?php require_once '../app/include/header.php';?>

<!-- header end -->
<?php
//пiдключення до бази
require_once '../app/database/db.php';//пiдключення до бази
require_once '../app/database/connect.php';//пiдключення до бази
$text='';
$pip = isset($_POST['Editbox1']) ? $_POST['Editbox1'] : '';//присвоюемо даннi з форми в змiннi
$dn = isset($_POST['Editbox2']) ? $_POST['Editbox2'] : ''; 
$id_classes = isset($_POST['Combobox1']) ? $_POST['Combobox1'] : '';


//рядок з  запитом до бази
 $sql = "SELECT * FROM `classes` WHERE `graduate` IS NULL ORDER BY `class` ASC";
// Подготовка запроса
 $stmt = $pdo->prepare($sql);

 // Выполнение запроса
 $stmt->execute();
 
 // Получение результата
 $s = $stmt->fetchAll();

 foreach ($s as $item) {
    $id = $item['id'];
    $class = $item['class'];
    $lit = $item['lit'];
    $graduate = $item['graduate'];
}

$look = "
<select name='Combobox1' size='1' id='Combobox1'
 style='position:absolute;left:177px;top:153px;width:156px;height:28px;z-index:10'>";
//перебираю отриманий масив		
        foreach ($s as $item) {

            $id = $item['id'];
            $class = $item['class'];
            $lit = $item['lit'];
            $graduate = $item['graduate'];
        
        //з кожного запису масиву будую рядок мого комбобоксу
		if (isset($_POST['Combobox1']) and $_POST['Combobox1'] == $id )
			$look = $look."<option selected value='".$id ."'>".$class."-".$lit."</option>"; 
		else 
		$look = $look."<option value='".$id ."'>".$class."-".$lit."</option>";        
	} 	

//додаю закінчення комбобоксу 
$look = $look."</select>";
$post=[   
    'pip'=>$pip,
    'dn'=>$dn,
    'id_classes'=>$id_classes,
    ];
// перевiрка на присутнiсть значень в формi
if (!empty($pip) && !empty($dn)  && !empty($class)) {
   
      insert('schoolboys',$post);

}else $text='заполните поля!!'

?>
<!-- блок main start  -->
<div class="container">
    <div class="content row">
        <!-- блок main start  -->
<!-- блок main content    -->
<div class="main-conent col-md-9 col-12">
        <!-- блок main content    -->
   <div class="container">
     <div class="form-content row">
     <form name="Form1" method="post" action="" enctype="multipart/form-data" id="Form1"class="form-content row">

<div id="wb_Heading1" style="position:absolute;left:353px;top:210px;width:484px;height:39px;z-index:2;">
<h1 id="Heading1">Прийняти учня</h1></div>

<div id="wb_Text2" style="position:absolute;left:403px;top:283px;width:450px;height:15px;z-index:3;font-size:40px;">
<span style="color:#000000;font-family:Arial;font-size:40px;">Прізвище та ім'я учня:</span>
</div>
<div id="wb_Text1" style="position:absolute;left:403px;top:413px;width:450px;height:15px;z-index:4;">
<span style="color:#000000;font-family:Arial;font-size:40px;">Дата народження:</span></div>

<input type="submit"id="Button1"style="width:80px;background-color:gray;color:black;border-radius:15%;
    padding:5px;position:absolute;left:503px;top:550px;width:94px;z-index:5;font-size:15px;"value="Submit">
<input type="reset" id="Button2" name="" value="Reset" style="width:80px;background-color:gray;color:black;border-radius:15%;
    padding:5px;position:absolute;left:633px;top:550px;width:96px;z-index:6;font-size:15px;">
<input type="text" id="Editbox1" style="position:absolute;left:383px;;top:363px;width:485px;height:36px;z-index:7;" name="Editbox1" value="" spellcheck="false">
<input type="date" id="Editbox2" style="position:absolute;left:770px;top:420px;width:146px;height:36px;z-index:8;" name="Editbox2" value="" spellcheck="false">

<div id="wb_Text3" style="position:absolute;left:403px;top:475px;width:450px;height:15px;z-index:9;">
<span style="color:#000000;font-family:Arial;font-size:40px;">До класу:</span></div>

<div  style="position:absolute;left:453px;top:335px;width:450px;height:15px;z-index:9;"><?php echo $look?></div>
</form>
   <div style="position:absolute;left:450px;top:620px;width:450px;height:15px;z-index:9;font-size:40px; color:red;"><?=$text?></div>
</div>   
</div>

<!-- блок main content end   -->
</div>
<!-- блок main content end   -->

<!-- блок main end  -->
</div>

</div> 

<!-- блок main end  -->

<!-- footer -->

   <?php require_once '../app/include/footer.php';?> 
<!-- footer end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1d9689321f.js" crossorigin="anonymous"></script>

   </body>
</html>




