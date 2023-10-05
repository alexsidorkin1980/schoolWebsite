<?php  
session_start();
require_once 'app/database/connect.php';//пiдключення до бази
require_once 'app/database/db.php';//пiдключення до бази

$teacherId = isset($_POST['teacher_id']) ? $_POST['teacher_id'] : null;
if (isset($_POST['delete_teacher'])) {
  removeClassIdForTeacher($teacherId);
  header('Location:  /teacher-guide.php');
   exit();
}else{

  if (isset($_POST['teacher_id'])) {
      // Получите id учителя из $_POST['teacher_id']
      $_SESSION['teachId'] = $_POST['teacher_id'];
    

  }


  $params = [
    'graduate' => NULL 
    ,
  ];
  //запрос на комбобокс с классами
  $s = selectAll('classes',$params);
  $look='';
  $look.= "<form action='' method='post'><select name='Combobox1'>";
  //	
           foreach ($s as $item) {
  
              $id = $item['id'];
              $class = $item['class'];
              $lit = $item['lit'];
              $graduate = $item['graduate'];
          
          //
      if (isset($_POST['Combobox1']) and $_POST['Combobox1'] == $id )
        $look = $look."<option selected value='".$id ."'>".$class."-".$lit."</option>";     
      else 
      $look .="<option value='".$id ."'>".$class."-".$lit."</option>";        
    } 	
  
        //додаю закінчення комбобоксу 
        $look .="</select><button type='submit'  name='save_changes'>Сохранить изменения</button>
  </form>"; 
  echo $look;
//   echo$a="<a href='referenseSheet\comb-teacher-guide.php'>назад</a>"; 

   if (isset($_POST['Combobox1'])) {
    $teacherId = $_SESSION['teachId'];
   
        $id_classes = $_POST['Combobox1'];

        //  обновление class_id только если выбран класс и была отправлена форма
        if (!empty($id_classes)) {
          
            $params = [
                  'class_id' => $id_classes,
                ];
              update('teachers', $teacherId ,$params);
            

            header('Location: /teacher-guide.php');
                   exit();
        }
}
}