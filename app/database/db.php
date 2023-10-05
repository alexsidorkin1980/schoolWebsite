<?php 
session_start();
require('connect.php');



function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}
// проверка выполнения запроса к бд
function dbCheckError($query){
    $errInfo = $query->errorInfo();

    if($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
}


// запрос на прлучение данных с одной таблицы

function selectAll($table,$params=[],$orderBy = ''){
    global $pdo;
$sql="SELECT * FROM $table ";


if(!empty($params)){
   $i=0;
   foreach($params as $key=>$value){
    if ($value === null&&$i!==0) {
        $sql .= " AND $key IS NULL"; // Для NULL значения

       
    } else {
       
if(!is_numeric($value)){
    $value="'".$value."'";
}
 if($i===0){
    if($value === null){
        $sql=$sql." WHERE $key=$value";  
    }
    $sql .= " WHERE $key IS NULL";

}
else{
     $sql=$sql." AND $key=$value";
 }
 $i++;
   }
}
}
if (!empty($orderBy)) {
    $sql .= " ORDER BY $orderBy";
}
// tt($sql);
// exit();
$query=$pdo->prepare($sql);
$query->execute();
dbCheckError($query);
return $query->fetchAll();
}

// tt($sql);
// exit();


// function selectAll($table, $params = [], $orderBy = '') {
//     global $pdo;
//     $sql = "SELECT * FROM $table ";

//     if (!empty($params)) {
//         $i = 0;
//         foreach ($params as $key => $value) {
//             if ($value === null && $i !== 0||$value === null) {
//                 $sql .= " AND $key IS NULL"; // Для NULL значения
//             } else {
//                 if (!is_numeric($value)) {
//                     $value = "'" . $value . "'";
//                 }
//                 if ($i === 0) {
//                     $sql .= " WHERE ";
//                 } else {
//                     $sql .= " AND ";
//                 }
//                 if ($value === null) {
//                     $sql .= "$key IS NULL";
//                 } else {
//                     $sql .= "$key=$value";
//                 }
//                 $i++;
//             }
//         }
//     }

//     if (!empty($orderBy)) {
//         $sql .= " ORDER BY $orderBy";
//     }

//     tt($sql); // Отладочный вывод SQL-запроса
//     exit();

//     $query = $pdo->prepare($sql);
//     $query->execute();
//     dbCheckError($query);
//     return $query->fetchAll();
// }



// запрос на получение одной строки с выбранной таблицы
function selectOne($table,$params=[]){
    global $pdo;
    $sql="SELECT * FROM $table ";
    if(!empty($params)){
       $i=0;
       foreach($params as $key=>$value){
    if(!is_numeric($value)){
        $value="'".$value."'";
    }
    // SELECT * FROM `classes` WHERE `graduate` IS NULL ORDER BY `class` ASC
     if($i===0){
    $sql=$sql." WHERE $key=$value";
    }
    else{
         $sql=$sql." AND $key=$value";
     }
     $i++;
       }
    }
    // $sql=$sql."LIMIT 1";
    $query=$pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
     return $query->fetch();

   
    }


    //запись в таблицу бд

    function insert($table,$params){
        global $pdo;
//INSERT INTO `users` (admin, username, email, password)VALUES ('0', 'fatal', 'fgjjhfh@com.ua', 'jjjjjjj');
//  $sql="INSERT INTO $table (admin, username, email, password , created)VALUES (:admin, :username, :email, :password, :created)";
$i=0;
$coll='';
$mask='';
foreach($params as $key=>$value){
if($i===0){
    $coll=$coll."$key";
    $mask=$mask."'"."$value"."'"; 
}else{
    $coll=$coll.", $key";
    $mask=$mask.", '"."$value"."'";
}
$i++;
}


 $sql="INSERT INTO $table ($coll) VALUES ($mask)";

// tt($sql);
// exit();

$query=$pdo->prepare($sql);
$query->execute();
dbCheckError($query);
 return $pdo->lastInsertId();
}


// обновление строки в таблице
function update($table,$id,$params){
    global $pdo;
$i=0;
$str='';
foreach($params as $key=>$value){
if($i===0){

$str=$str.$key." = '".$value."'"; 
}else{

    $str=$str.", ".$key." = '".$value."'";
}
$i++;
}


$sql="UPDATE $table SET $str WHERE id=$id";

// tt($sql);
// exit();

$query=$pdo->prepare($sql);
$query->execute();
dbCheckError($query);

}


// удаление строки в таблице
function deletes ($table,$id){
    global $pdo;
//DELETE FROM `users` WHERE `users`.`id` = 26

$sql="DELETE FROM $table WHERE `id` = $id";

// tt($sql);
// exit();

$query=$pdo->prepare($sql);
$query->execute();
dbCheckError($query);

}
function removeClassIdForTeacher($teacherId) {
    global $pdo;

    try {
        $sql = "UPDATE teachers SET class_id = NULL WHERE id = :teacherId";
        $query = $pdo->prepare($sql);
        $query->bindParam(':teacherId', $teacherId, PDO::PARAM_INT);
        $query->execute();
        // Обработка успешного выполнения запроса, если необходимо
    } catch (PDOException $e) {
        // Обработка ошибок, если они возникнут
        echo "Ошибка при удалении class_id для учителя с id $teacherId: " . $e->getMessage();
    }
}

// $arrData=[
//     'admin'=>'1',
//     'username'=>'bubka-krummsa',
//     'email'=>'ljbubajm@com.ua',
//     'password'=>'rrrrrrrrr',
//     'created'=>'2022-08-24 20:17:08'
// ];

// $params=[
//     'id'=>'9',
//     'admin'=>'0',
//      'email'=>'sanyok1234@rambler.r4u',
//      'username'=>'alexandr-soikl',
// ];

// tt(selectOne('users',$params));
// tt(selectAll('users',$params));
 //insert('users',$arrData);
 //update('users',2,$arrData);
 //deletes ('users', 6);