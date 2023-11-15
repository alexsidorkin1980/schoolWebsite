<?php  

require_once __DIR__ . '/../../app/database/db.php';
$errMsg=[];
$students=selectAll('students');
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_student'])){

//  tt($_POST);

    $name=trim($_POST['name'] );
    $dateOfBirth=trim($_POST['dateOfBirth'] );
    $combobox=trim($_POST['combobox'] );
    $email=trim($_POST['email'] );
    $address=trim($_POST['address'] );
    $phon_number=trim($_POST['phon_number'] );
    

    if($name==''||$dateOfBirth==''||$email==''||$address==''||$phon_number==''||$combobox=='Введите класс'){
     array_push($errMsg,"Введены не все данные!!!");
    }else{
   //  if(strlen($number)>1||strlen($number)>1){

   //    array_push($errMsg,"Введены не все данные!!!");
   //  }else{
  
    $student=[
       'name' => $name,
       'dateOfBirth' => $dateOfBirth,
       'class_id' => $combobox,
       'email' => $email,
       'address' => $address,
       'phon_number' => $phon_number,
    ];
   insert('students', $student);
   header('location: ../../admin/students/index.php ');
}
   //  }
}else{

}

if($_SERVER['REQUEST_METHOD']==='GET'&&isset($_GET['id'])){
$id=$_GET['id'];
$student=selectOne('students',['id' => $id]);
$name=$student['name'];
$dateOfBirth=$student['dateOfBirth'];
// $combobox=$student['combobox'];
$email=$student['email'];
$address=$student['address'];
$phon_number=$student['phon_number'];


}

if($_SERVER['REQUEST_METHOD']==='POST'&&isset($_POST['edit_student'])){

   $name=trim($_POST['name'] );
   $dateOfBirth=trim($_POST['dateOfBirth'] );
   $combobox=trim($_POST['combobox'] );
   $email=trim($_POST['email'] );
   $address=trim($_POST['address'] );
   $phon_number=trim($_POST['phon_number'] );
   

   if($name==''||$dateOfBirth==''||$email==''||$address==''||$phon_number==''||$combobox==''){
    array_push($errMsg,"Введены не все данные!!!");
   }else{
  //  if(strlen($number)>1||strlen($number)>1){

  //    array_push($errMsg,"Введены не все данные!!!");
  //  }else{
 
   $student=[
      'name' => $name,
      'dateOfBirth' => $dateOfBirth,
      'class_id' => $combobox,
      'email' => $email,
      'address' => $address,
      'phon_number' => $phon_number,
   ];
   $id=$_POST['id'];
  update('students',$id, $student);
  header('location: ../../admin/students/index.php ');
   }
}

// данные для edit по id из $_GET
if ($_SERVER['REQUEST_METHOD']=== 'GET'&&isset($_GET['id_inf'])){
   $id=$_GET['id_inf'];
   $students=selectOne('students',['id'=>$id]);
//    tt($students);
//   exit();
       $id=trim($students['id']);
       $name=trim($students['name']);
       $dateOfBirth =trim($students['dateOfBirth']);
       // $class_id = trim($students['class_id']);
       $email =trim($students['email']);
       $address =trim($students['address']);
       $phon_number =trim($students['phon_number']);
       // tt($name); exit();
   
       // $name=$teacher['name'];
       // $number =$teacher['number'];
       // $letter = $teacher['letter'];
       // $email =$teacher['email'];
       // $address =$teacher['address'];
       // $phon_number =$teacher['phon_number'];
   
   }



if($_SERVER['REQUEST_METHOD'] === 'GET'&&isset($_GET['id_delete'])){
   
 $id=$_GET['id_delete'];
//  tt($id);
 deletes('students',$id);
  header('location: ../../admin/students/index.php ');
}