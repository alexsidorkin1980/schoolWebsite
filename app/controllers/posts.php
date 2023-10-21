<?php 


require_once __DIR__ . '/../../app/database/db.php';

    $id='';
    $title='';
    $errMsg='';
    $content='';
    $img='';
    $topic='';
 

    $topics=selectAll('topics');
    $posts=selectAll('posts');
    $postsAdm=selectAllFromPostsWithUsers('posts','users');
    // $user=selectOne('users',['id'=>$_SESSION ['id']]);
//    tt($posts);
//    exit();


    if ($_SERVER['REQUEST_METHOD']==='POST' &&isset($_POST['add_post'])){
        $id=$_SESSION['id'];
        $title=$_POST['title'];
        $content=$_POST['content'];
        $img=$_POST['img'];
        $topic=$_POST['topic'];
        $publish=isset($_POST['publish']) && trim($_POST['publish']) !==null ? 1:0;
        // $title=$_POST['description_topic'];
        // $title=$_POST['description_topic'];
    // tt($description_topic);
    // exit();




    if($title===''||$title===''||$topic===''){// проверка на заполнение всех полей
        $errMsg='Не все поля заполнены!!!';
      }
      else if(mb_strlen($title,'UTF8')<7){// проверка на количество символов
        $errMsg='Название статьи должено быть больше 7-ми символов!!!';
      }
      else {
        $post=[
            'id_user' =>$id,
            'title' => $title,
            'img' =>  $img,
            'content' =>$content,
            'status' => $publish,
            'id_topic' =>  $topic,
      
          ];
        
             $post=insert('posts',$post);
            // $posts=selectOne('posts',['id'=>$id]);

            header('location: ../../admin/posts/index.php '); 
    // tt($_SESSION);
      }
      } 
      else{
      // сохранение значений инпутов 
      $title='';
      $content='';
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

