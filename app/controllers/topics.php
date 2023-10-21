<?php 


require_once __DIR__ . '/../../app/database/db.php';

    $id='';
    $name_topic='';
    $description_topic='';
    $errMsg='';
    

    $topics=selectAll('topics');
   

    if ($_SERVER['REQUEST_METHOD']==='POST' &&isset($_POST['create_topic'])){
        // $id=$_POST['id'];
        $name_topic=$_POST['name_topic'];
        $description_topic=$_POST['description_topic'];
    // tt($description_topic);
    // exit();




    if($name_topic===''||$description_topic===''){// проверка на заполнение всех полей
        $errMsg='Не все поля заполнены!!!';
      }
      else if(mb_strlen($name_topic,'UTF8')<2){// проверка на количество символов логина
        $errMsg='Логин должен быть больше 2-х символов!!!';
      }
      else {
      
    //   $existance=selectOne('users',['email'=>$name_topic]);
    //   // tt($existance);
    //      //  exit();
    //   if($existance &&$existance['email']===$name_topic){
    //     $errMsg='Пользователь с такими данными уже существует!!!';
    //   }else {
        $topic=[
          'name'=>$name_topic,
          'description'=>$description_topic,
      
          ];
        
             $id=insert('topics',$topic);
            $topic=selectOne('topics',['id'=>$id]);

            header('location: ../../admin/topics/index.php '); 
    // tt($_SESSION);
      
            // loginUser($existance);
        // tt($_SESSION);
        // die();
      }
      } 
      else{
      // сохранение значений инпутов логин и имейл
      $name_topic='';
      $description_topic='';
      }




      if ($_SERVER['REQUEST_METHOD']==='GET' &&isset($_GET['id'])){
        // $id=$_POST['id'];
            $id=$_GET['id'];
            $topic=selectOne('topics' , ['id'=>$id]);
            $id=$topic['id'];
            $name_topic=$topic['name'];
            $description_topic=$topic['description'];
    // tt($id);
    // exit();


    
      }

      if ($_SERVER['REQUEST_METHOD']==='POST' &&isset($_POST['edit_topic'])){
        // tt($_POST);
        //  exit();

        $name_topic=trim($_POST['name_topic']);
        $description_topic=trim($_POST['description_topic']);

    if($name_topic===''||$description_topic===''){// проверка на заполнение всех полей
        $errMsg='Не все поля заполнены!!!';
      }
      else if(mb_strlen($name_topic,'UTF8')<2){// проверка на количество символов логина
        $errMsg='Логин должен быть больше 2-х символов!!!';
      }
    //   else {
      
    //   $existance=selectOne('users',['email'=>$name_topic]);
    //   // tt($existance);
    //      //  exit();
    //   if($existance &&$existance['email']===$name_topic){
    //     $errMsg='Пользователь с такими данными уже существует!!!';
    //   }
      else {
        $topic=[
          'name'=>$name_topic,
          'description'=>$description_topic,
      
          ];
        $id=$_POST['id'];
            //  $id=insert('topics',$topic);
            update('topics',$id,$topic);

            header('location: ../../admin/topics/index.php '); 
    // tt($_SESSION);
      
        // die();
      }
      } 

     
      if ($_SERVER['REQUEST_METHOD']==='GET' &&isset($_GET['delete_id'])){
        // $id=$_POST['id'];
            $id=$_GET['delete_id'];
            deletes('topics' , $id);

            header('location: ../../admin/topics/index.php '); 


    
      }

