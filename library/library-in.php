<?php

session_start();

// Перевiрка наявностi ролi в сесii
if (!isset($_SESSION['role'])) {
    header('Location: login.php');
    exit();
}

// Перевiрка ролi для user
if ($_SESSION['role'] == 'user') {
    echo'доступ закрыт';
    exit();
}

require_once '../index.php';

require_once '../config/connect.php';

$text='';$text1='';
$db = connectDb($BD); // подключение к базе данных
//обэднуемо таблицi
$sql = "SELECT id, pip, 'students' AS type FROM schoolboys  WHERE `graduate` IS NULL
        UNION ALL 
        SELECT id, pip, 'teachers' AS type FROM teachers";

$result = mysqli_query($db, $sql);
//комбобокс
$look = "
<select name='Combobox1' size='1' id='Combobox1' 
style='position:absolute;left:177px;top:112px;width:323px;height:28px;z-index:8;'>";

while ($s = mysqli_fetch_array($result)) {	
    if (isset($_POST['Combobox1']) && $_POST['Combobox1'] == $s['id']) {
  //додаемо тип до кожного option для визначення кого вибрано учня чи вчителя      
        $look .= "<option selected value='".$s['id'].$s['type']."'>".$s['pip']." (".$s['type'].")</option>"; 
    } else {
        $look .= "<option value='".$s['id'].$s['type']."'>".$s['pip']." (".$s['type'].")</option>"; 
    }   
}
$look .= "</select>";

$name = ''; 

//перевiрка на вiдправлення методом post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['Combobox1'])) {
        $selectedValue = $_POST['Combobox1'];//зберiгаемо у змiнну значення комбобоксу
        $selectedType = substr($selectedValue, -8); //видiляемо тип iз значення 



        if (isset($_POST['Editbox3']) && !empty($_POST['Editbox3'])) {
            $invNumber = isset($_POST['Editbox3']) ? $_POST['Editbox3'] : '';//iнв.номер iз форми

            if (!empty($invNumber)) {//перевiрка на вiдсутнiсть invNumber
                
                $sql = "SELECT * FROM library WHERE inv_number = '$invNumber'";
                $result = mysqli_query($db, $sql);

                if (mysqli_num_rows($result) > 0) {
            // Запрос для выборки значения id из таблицы library
            $sqlSelect = "SELECT id FROM library WHERE inv_number = ' $invNumber '";
            $resultSelect = mysqli_query($db, $sqlSelect);

            $sqlborr = "SELECT * FROM library WHERE inv_number = ' $invNumber '"; 
            $resultborr = mysqli_query($db, $sqlborr);
             $sqlbr = mysqli_fetch_assoc($resultborr);
             $return=$sqlbr['return_date'];

            if(empty($sqlbr['id_teachers'])&&!empty($sqlbr['id_schoolboys'])){
             $id_schoolboy=$sqlbr['id_schoolboys'];
             $sqlboys = "SELECT * FROM schoolboys WHERE id_classes=' $id_schoolboy'";
             $result_sc = mysqli_query($db, $sqlboys);
             $rsb = mysqli_fetch_assoc($result_sc);
             $name=$rsb['pip'];
            } 
            else  
            if(empty($sqlbr['id_schoolboys'])&&!empty($sqlbr['id_teachers'])){
                $id_teachers=$sqlbr['id_teachers'];
                $sqlv = "SELECT * FROM teachers WHERE class_id=' $id_teachers'";
                $result_scv = mysqli_query($db, $sqlv);
                $rsb = mysqli_fetch_assoc($result_scv);
                $name=$rsb['pip'];
            }

             if ($return!=null) {
                $text=' Книга вже повернута ';
             }
             else{
                $text='';   
                
            if ($resultSelect && mysqli_num_rows($resultSelect) > 0) {
                $row = mysqli_fetch_assoc($resultSelect);
                $idValue = $row['id'];//id library
        
        }

        if ($selectedType == 'students') {
            $selectedValue = substr($selectedValue, 0, -8);
if($selectedValue==$sqlbr['id_schoolboys']){//перевiрка на знаходження книги в iншого користувача
            $sql = "UPDATE library
            SET return_date = NOW(),borrow_date = null,id_schoolboys=null
            WHERE  `library`.`id` = $idValue";
             $result_schoolb = mysqli_query($db, $sql);
            }else{$text='Книга знаходиться в iншого користувача!!';}
            
        } else if ($selectedType == 'teachers') {
            $selectedValue = substr($selectedValue, 0, -8);
if($selectedValue==$sqlbr['id_teachers']){//перевiрка на знаходження книги в iншого користувача        
            $sql = "UPDATE library
            SET return_date = NOW(),borrow_date = null,id_teachers=null
            WHERE  `library`.`id` = $idValue";
            $result_teach = mysqli_query($db, $sql);
}else{$text='Книга знаходиться в iншого користувача!!';}
        }
        

    }
    } else {
        $text1= "Книгу з iнв.номером $invNumber не найдено в базi данних.";
    }
}
        }        
    }
    }
?>
<div id="wb_Form1" style="position:absolute;left:140px;top:133px;width:733px;height:252px;z-index:10;">
<form name="Form1" method="post" action="" enctype="multipart/form-data" id="Form1">
<div id="wb_Heading1" style="position:absolute;left:103px;top:10px;width:484px;height:39px;z-index:1;">
<h1 id="Heading1">Повернення книги</h1></div>
<div id="wb_Text2" style="position:absolute;left:31px;top:75px;width:157px;height:15px;z-index:2;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Інв номер:</span></div>

<input type="submit" id="Button1" name="" value="Submit" style="position:absolute;left:216px;top:199px;width:96px;height:25px;z-index:3;">
<input type="reset" id="Button2" name="" value="Reset" style="position:absolute;left:376px;top:199px;width:96px;height:25px;z-index:4;">

<div id="wb_Text3" style="position:absolute;left:31px;top:124px;width:123px;height:15px;z-index:5;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Від кого:</span></div>
<input type="text" id="Editbox3" style="position:absolute;left:177px;top:64px;width:79px;height:16px;z-index:6;" name="Editbox3" value="" spellcheck="false">

<?php echo $look;?>

 <div id="wb_Text1" style="position:absolute;left:177px;top:160px;width:244px;height:15px;text-align:center;z-index:8;">
<span style="background-color:#FBFBFB;color:#FF0000;font-family:Arial;font-size:13px;">
<em><u><?php echo $text;?></u></em></span>
<span style="background-color:#FBFBFB;color:#FF0000;font-family:Arial;font-size:13px;">
<em><u><?php echo $text1;?></u></em></span>
</div>
</form>
</div>
</div>
</body>
</html>