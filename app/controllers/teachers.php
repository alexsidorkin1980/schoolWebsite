<?php  
require_once __DIR__ . '/../../app/database/db.php';

$errMsg=[];
// $teachers=selectAll('teachers');
// tt($teacher);
// exit();

if($_SERVER['REQUEST_METHOD']==='POST' &&isset($_POST['create_teacher'])){
// tt($_POST);
// exit();

    $name=trim($_POST['name']);
    $combobox = trim($_POST['combobox']);
    $email =trim($_POST['email']);
    $address =trim($_POST['address']);
    $phon_number =trim($_POST['phon_number']);

    // tt($combobox);
    // exit();

    
// if($name===''||$email===''||$address===''||$phon_number===''||$combobox=''){
// array_push($errMsg,"Заполнены не все данные!!!");

// }else{
// if(strlen($number)>1||strlen($letter)>1){
//     array_push($errMsg,"Буква класса или цифра должны содержать один символ!!Введите корректное значение!!!");
// }else{
    // tt($combobox);
    // exit();
$teacher=[
    'name'=>$name,
    'class_id'=>$combobox,
    'email'=>$email,
    'address'=>$address,
    'phon_number'=>$phon_number,

];

insert('teachers',$teacher);
header('location: ../../admin/teachers/index.php ');
}
// }
// }
else{

    $name='';
   // $number ='';
    $address ='';
    $phon_number ='';
    

}
// данные для edit по id из $_GET
if ($_SERVER['REQUEST_METHOD'] === 'GET'&&isset($_GET['id'])){
$id=$_GET['id'];
// tt($id); exit();
$teacher = selectOne('teachers',['id'=>$_GET['id']]);
// tt($teacher);
//  exit();
// <br /><b>Warning</b>:  Undefined variable $email in
// <b>E:\OSPanel\domains\schoolWebsite\admin\teachers\edit.php</b> on line <b>97</b><br />
    $name=trim($teacher['name']);
    // $number =trim($teacher['number']);
    // $letter = trim($teacher['letter']);
    $email =trim($teacher['email']);
    $address =trim($teacher['address']);
    $phon_number =trim($teacher['phon_number']);
    // tt($name); exit();

    // $name=$teacher['name'];
    // $number =$teacher['number'];
    // $letter = $teacher['letter'];
    // $email =$teacher['email'];
    // $address =$teacher['address'];
    // $phon_number =$teacher['phon_number'];

}

// изменение данных учителя
if($_SERVER['REQUEST_METHOD']==='POST' &&isset($_POST['edit_teacher'])){
    // tt($_POST);
    // exit();
    
        // $name=trim($_POST['name']);
        
        $combobox = trim($_POST['combobox']);
        // $email =trim($_POST['email']);
        $address =trim($_POST['address']);
        $phon_number =trim($_POST['phon_number']);
        
    if($address===''||$phon_number===''){
    array_push($errMsg,"Заполнены не все данные!!!");
    
    }else{
    // if(strlen($number)>1||strlen($letter)>1){
    //     array_push($errMsg,"Буква класса или цифра должны содержать один символ!!Введите корректное значение!!!");
    // }else{
    $teacher=[
       
        
        'class_id'=>$combobox,
        'address'=>$address,
        'phon_number'=>$phon_number,
    
    ];
    $id=$_POST['id'];
    update('teachers',$id,$teacher);
    header('location: ../../admin/teachers/index.php ');
    }
    // }
    }else{
    
       
        // $number ='';
        // $letter = '';
       
        $address ='';
        $phon_number ='';
        
        // $number =trim($_POST['number']);
        // $letter = trim($_POST['letter']);
        // // $email =trim($_POST['email']);
        // $address =trim($_POST['address']);
        // $phon_number =trim($_POST['phon_number']);
    }

// данные для edit по id из $_GET
if ($_SERVER['REQUEST_METHOD']=== 'GET'&&isset($_GET['id_inf'])){
    $id=$_GET['id_inf'];
    $teacher=selectOne('teachers',['id'=>$id]);
    // tt($teacher); exit();
        $id=trim($teacher['id']);
        $name=trim($teacher['name']);
        // $number =trim($teacher['number']);
         $combobox = trim($teacher['class_id']);
        $email =trim($teacher['email']);
        $address =trim($teacher['address']);
        $phon_number =trim($teacher['phon_number']);
        // tt($name); exit();
    
        // $name=$teacher['name'];
        // $number =$teacher['number'];
        // $letter = $teacher['letter'];
        // $email =$teacher['email'];
        // $address =$teacher['address'];
        // $phon_number =$teacher['phon_number'];
    
    }




// удаление учителя
if ($_SERVER['REQUEST_METHOD'] === 'GET'&&isset($_GET['id_delete'])){
$id=$_GET['id_delete'];
deletes('teachers',$id);
header('location: ../../admin/teachers/index.php ');

}
