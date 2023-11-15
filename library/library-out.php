
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
  <link rel="stylesheet" href="/assets/css/library-add-book.css">

   </head>
  <body>
  <?php require_once '../app\include\access-check.php';?>
   <!-- header  -->
   <?php require_once '../app/include/header.php';?>
<!-- header end -->
<?php
require_once '../app/database/connect.php';//пiдключення до бази
 require_once '../app/database/db.php';//пiдключення до бази
 $text='';$text1='';
// $db = connectDb($BD); // подключение к базе данных
//обэднуемо таблицi
$sql = "SELECT id, name, 'students' AS type FROM students WHERE `graduate` IS NULL
        UNION ALL 
        SELECT id, name, 'teachers' AS type FROM teachers";

$stmt = $pdo->prepare($sql);
// Выполнение запроса
$stmt->execute();
// проверка на ошибки
dbCheckError($stmt);
// Получение результата
$s = $stmt->fetchAll();

$look = "
<select name='Combobox1' size='1' id='Combobox1' 
style='position:absolute;left:530px;top:345px;width:323px;height:28px;z-index:8;'>";

// while ($s = mysqli_fetch_array($result)) {	

    foreach ($s as $item) {
        $id = $item['id'];
        $pip = $item['name'];
        // $dn=$item['dn'];
        // $class_id = $item['id_classes'];
        // $graduate = $item['graduate'];	
        $type=$item['type'];
    if (isset($_POST['Combobox1']) && $_POST['Combobox1'] == $id) {
        //до кожного значення селекту додаемо тип вчитель чи учень
        $look .= "<option selected value='".$id.$type."'>".$pip." (".$type.")</option>"; 
    } else {
        $look .= "<option value='".$id.$type."'>".$pip." (".$type.")</option>"; 
    }   
}
$look .= "</select>";
$name = ''; 
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     if (isset($_POST['Combobox1'])) {
//         $selectedValue = $_POST['Combobox1'];
//         $selectedType = substr($selectedValue, -8); // Получаемо тип из вибранного значення



//         if (isset($_POST['Editbox3']) && !empty($_POST['Editbox3'])) {
//            //iнв.номер из формы
//             $invNumber = isset($_POST['Editbox3']) ? $_POST['Editbox3'] : '';

//             if (!empty($invNumber)) {
                
//                 $sql = "SELECT * FROM library WHERE inv_number = '$invNumber'";
//                 $result = mysqli_query($db, $sql);

//                 if (mysqli_num_rows($result) > 0) {
//             // Запрос для выборки значения id из таблицы library
//             $sqlSelect = "SELECT id FROM library WHERE inv_number = '$invNumber'";
//             $resultSelect = mysqli_query($db, $sqlSelect);
//             //знаходимо дату видачi книги
//             $sqlborr = "SELECT * FROM library WHERE inv_number = '$invNumber'"; 
//             $resultborr = mysqli_query($db, $sqlborr);
//              $sqlbr = mysqli_fetch_assoc($resultborr);
//              $borrow=$sqlbr['borrow_date'];
//             //роздiляемо учителя i учня
//                 if(empty($sqlbr['id_teachers'])&&!empty($sqlbr['id_schoolboys'])){
//                 $id_schoolboy=$sqlbr['id_schoolboys'];
//              $sqlboys = "SELECT * FROM schoolboys WHERE id_classes=' $id_schoolboy'";
//              $result_sc = mysqli_query($db, $sqlboys);
//              $rsb = mysqli_fetch_assoc($result_sc);
//              $name=$rsb['pip'];
//             } 
//             else  
//             if(empty($sqlbr['id_schoolboys'])&&!empty($sqlbr['id_teachers'])){
//                 $id_teachers=$sqlbr['id_teachers'];
//                 $sqlv = "SELECT * FROM teachers WHERE class_id=' $id_teachers'";
//                 $result_scv = mysqli_query($db, $sqlv);
//                 $rsb = mysqli_fetch_assoc($result_scv);
//                 $name=$rsb['pip'];
//             }

//              if ($borrow!=null) {
//                 $text=' Книга вже видана '.$name;
//              }
//              else{
//                 $text='';    
//             if ($resultSelect && mysqli_num_rows($resultSelect) > 0) {
//                 $row = mysqli_fetch_assoc($resultSelect);
//                 $idValue = $row['id'];//знаходимо id library
        
//         }
//       //якщо студент виконуемо запрос
//         if ($selectedType == 'students') {
//             $selectedValue = substr($selectedValue, 0, -8);
//             //замiнюемо в таблицi значення
//             $sql = "UPDATE library
//             SET borrow_date = NOW(),return_date=null, id_schoolboys = '$selectedValue' 
//             WHERE  `id` = $idValue";
//              $result_schoolb = mysqli_query($db, $sql);

//             //якщо вчитель виконуемо запрос$selectedValue[0];
//         } else
//          if ($selectedType == 'teachers') {
//             $selectedValue = substr($selectedValue, 0, -8);
//             $sql = "UPDATE library
//             SET borrow_date = NOW(),return_date=null, id_teachers = $selectedValue
//             WHERE  `id` = $idValue";
//             $result_teach = mysqli_query($db, $sql);
//         }
//         }
//      }
// else {
//         $text1= "Книгу з iнв.номером $invNumber не найдено в базi данних.";
//     }
// }
//          }        
//     }
// }
?>

<!-- блок main start  -->
<div class="container">
    <div class="content row">
        <!-- блок main start  -->
<!-- блок main content    -->
<div class="main-content col-md-9 col-12">
        <!-- блок main content   position:absolute;left:207px;top:150px; --> 
        <!-- <div class="table-content"> -->

        <div class="form-content row">
       
        <!-- <div id="wb_Form1" style="position:absolute;left:140px;top:133px;width:733px;height:252px;z-index:11;"> -->
<form name="Form1" method="post" action="" enctype="multipart/form-data" id="Form1">
<!-- <div id="wb_Heading1" style="position:absolute;left:103px;top:10px;width:484px;height:39px;z-index:2;"> -->
<h1 id="Heading1">Видати книгу</h1>
<!-- </div> -->
<div id="wb_Text2" style="position:absolute;left:431px;top:300px;width:157px;height:15px;z-index:3;">
<span style="color:#000000;font-family:Arial;font-size:15px;">Інв номер:</span></div>
<input type="submit"id="Button1"style="position:absolute;left:530px;top:454px;width:94px;height:23px;z-index:4;"value="Submit">
<input type="reset" id="Button2" name="" value="Reset" style="position:absolute;left:630px;top:454px;width:96px;height:25px;z-index:5;">
<div id="wb_Text3" style="position:absolute;left:431px;top:354px;width:123px;height:15px;z-index:6;">
<span style="color:#000000;font-family:Arial;font-size:15px;">Кому:</span></div>
<input type="text" id="Editbox3" 
style="position:absolute;left:530px;top:290px;width:79px;height:36px;z-index:7;" 
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
<!-- </div> -->

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




