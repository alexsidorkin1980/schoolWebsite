<?php
session_start();

require_once '../path.php';
require_once '../app/controllers/library.php';
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- font google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet">
  <!-- custom styling -->
  <link rel="stylesheet" href="/assets/css/admin.css">
  <title>My blog</title>
</head>

<body>

  <!-- HEADER -->
  <?php
  require_once '../app/include/header-admin.php';
  ?>
  <!-- END HEADER -->
  <div class="container">
    <!-- sidebar start -->
    <div class="row">
      <?php require_once '../app/include/sidebar-librarian.php'; ?>
      <!-- sidebar end -->
      <div class="posts col-8">

        <div class="row title-table">
          <h2>Выдача книги ученику </h2>
        </div>
        <div class="row add-post">
          <div class="mb-12 col-12 col-md-12 err">
            <?php require_once '../app/helps/errorInfo.php'; ?>
            </p>
          </div>
          <form action="book-out.php?id=<?php echo $_GET['id']; ?>&class=<?php echo $_GET['class']; ?>" method='post'>
            <div class="col">
              <label for="formGroupExampleInput" class="form-label">ФИО</label>
              <?php combobox('students'); ?>
            </div>
            <div class="col">
              <label for="formGroupExampleInput" class="form-label">Предполагаемая дата возврата книги</label>
              <input name="return_date" value="<? //= $title;  ?>" type="date" class="form-control"
                id="formGroupExampleInput" placeholder="Введите дату возврата книги...">
            </div>
            <div class="w-100"></div>
            <div class="col">
              <button class="btn btn-primary" name="book-out" type="submit">Выдать</button>
            </div>
          </form>
        </div>
      </div>
      <?php require_once '../app/include/sidebar-librarian2.php'; ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <!-- font avesom -->
  <script src="https://kit.fontawesome.com/1d9689321f.js" crossorigin="anonymous"></script>
</body>

</html>















<?php
// require_once '../app/database/connect.php';//пiдключення до бази
//  require_once '../app/database/db.php';//пiдключення до бази
//  $text='';$text1='';
// // $db = connectDb($BD); // подключение к базе данных
// //обэднуемо таблицi
// $sql = "SELECT id, name, 'students' AS type FROM students WHERE `graduate` IS NULL
//         UNION ALL 
//         SELECT id, name, 'teachers' AS type FROM teachers";

// $stmt = $pdo->prepare($sql);
// // Выполнение запроса
// $stmt->execute();
// // проверка на ошибки
// dbCheckError($stmt);
// // Получение результата
// $s = $stmt->fetchAll();

// $look = "
// <select name='Combobox1' size='1' id='Combobox1' 
// style='position:absolute;left:530px;top:345px;width:323px;height:28px;z-index:8;'>";

// // while ($s = mysqli_fetch_array($result)) {	

//     foreach ($s as $item) {
//         $id = $item['id'];
//         $pip = $item['name'];
//         // $dn=$item['dn'];
//         // $class_id = $item['id_classes'];
//         // $graduate = $item['graduate'];	
//         $type=$item['type'];
//     if (isset($_POST['Combobox1']) && $_POST['Combobox1'] == $id) {
//         //до кожного значення селекту додаемо тип вчитель чи учень
//         $look .= "<option selected value='".$id.$type."'>".$pip." (".$type.")</option>"; 
//     } else {
//         $look .= "<option value='".$id.$type."'>".$pip." (".$type.")</option>"; 
//     }   
// }
// $look .= "</select>";
// $name = ''; 




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