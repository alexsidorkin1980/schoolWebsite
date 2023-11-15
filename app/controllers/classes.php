<?php  
require_once __DIR__ . '/../../app/database/db.php';
$errMsg=[];

if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['creat_class'])){
    $number=$_POST['number'];
    $letter=$_POST['letter'];

    if ($number==''||$letter==''){
        array_push($errMsg,"Введите данные!!!"); 
    }else{
   $examСlass= [
    'number'=>$number,
    'letter'=>$letter
];
    $existance=selectOne('classes',$examСlass);
    // tt($existance);
    //     exit();
   
    if($existance &&$existance['number']==$number&&$existance['letter']==$letter){
      array_push($errMsg,"Такой класс уже существует!!!");
    }
    else {

    $class=[
            'number'=>$number,
            'letter'=>$letter,

    ];

    insert('classes',$class);

}
    }
 }


// удаление классов
if ($_SERVER['REQUEST_METHOD']=='GET'&&isset($_GET['id'])){
$id=$_GET['id'];
deletes('classes',$id);
header('location: ../../admin/classes/index.php ');
}

// }
