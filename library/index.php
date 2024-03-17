<?php
// session_start();
require_once '../app/database/db.php';
require_once '../path.php';
require_once '../app/controllers/library.php';
$class=isset($_GET['class']) ? $_GET['class'] : '';
$classes = selectAll('library', ['class' => $class]);
//   tt($classes);
?>

<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Початкова школа</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="../../assets/css/admin.css">
</head>
<body>
   <!-- header  -->
   <?php   require_once '../app/include/header-admin.php'; ?>
   <!-- header end -->




<div class="container ">

   <div class="row">

           
      <!-- sidebar start -->
      <?php require_once '../app/include/sidebar-librarian.php'; ?>
      <!-- sidebar end -->

      

      <div class=" col-10">
         <div class="button row">
            <a href="<?=  BASE_URL . "library/add-book.php" ?>" class="col-2 btn btn-success">Добавить</a>
            <span class="col-1"></span>
            <a href="<? //=BASE_URL . "admin/users/index.php" ?>" class="col-3 btn btn-warning">Изменить</a>
         </div>




<div class=" col-md-10">

         <div class="accordion" id="tasks-accordion">
        <?php 
        // tte($tasks);
        foreach ($classes as $oneTask): 
            //  tte($task);
            ?>              
         <div class="accordion-item mb-2">

               <div class="accordion-header d-flex justify-content-between align-items-center row" id="task-<?php echo $oneTask['id']; ?>">
                    <h2 class="accordion-header col-12 col-md-12">
                        <button style="background-color: <? //=$priorityColor?>;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#task-collapse-<?php echo $oneTask['id']; ?>"
                         aria-expanded="false" aria-controls="task-collapse-<?php echo $oneTask['id']; ?>" data-priority="<?php //echo $oneTask['priority']; ?>"> 
                            <span class="col-12 col-md-5"><i class="fa-solid fa-square-up-right"></i> <strong><?php echo $oneTask['title']; ?> </strong></span>
                            <!-- <span class="col-5 col-md-3"><i class="fa-solid fa-person-circle-question"></i> <?php //echo $oneTask['status']; ?> </span>
                            <span class="col-5 col-md-3"><i class="fa-solid fa-hourglass-start"></i><span class="due-date"><?php //echo $oneTask['finish_date']; ?></span></span> -->
                        </button>
                    </h2>
               </div>


            <div id="task-collapse-<?php echo $oneTask['id']; ?>" class="accordion-collapse collapse row" 
                aria-labelledby="task-<?php echo $oneTask['id']; ?>" data-bs-parent="#tasks-accordion">
                 <div class="accordion-body">
                        <p class="row">
                            <span class="col-12 col-md-6"><strong><i class="fa-solid fa-layer-group"></i> Автор:</strong> <?php echo htmlspecialchars($oneTask['author']); ?></span>
                            <span class="col-12 col-md-6"><strong><i class="fa-solid fa-battery-three-quarters"></i> Инвентаризационный номер:</strong> <?php echo htmlspecialchars($oneTask['inv_number']); ?></span>
                        </p>
                        <p class="row">
                            <span class="col-12 col-md-6"><strong><i class="fa-solid fa-person-circle-question"></i> Дата издания:</strong> <?php echo htmlspecialchars($oneTask['date_edition']); ?></span>
                            <span class="col-12 col-md-6"><strong><i class="fa-solid fa-hourglass-start"></i> Дата выдачи:</strong> <?php //echo htmlspecialchars($oneTask['finish_date']); ?></span>
                        </p>
                        
                        <p class="row">
                            <span class="col-12 col-md-6"><strong><i class="fa-solid fa-person-circle-question"></i>  Дата возврата:</strong> <?php //echo htmlspecialchars($oneTask['priority']); ?></span>
                            <span class="col-12 col-md-6"><strong><i class="fa-solid fa-hourglass-start"></i>  У кого:</strong> <?php //echo htmlspecialchars($oneTask['finish_date']); ?></span>
                        </p>
                        <hr>

                    <div class="d-flex justify-content-start action-task">
                            <a href="/todo/tasks/edit/<?php //echo $oneTask['id']; ?>" class="btn btn-primary me-2">Edit</a>
                            <a href="/todo/tasks/delete/<?php //echo $oneTask['id']; ?>" class="btn btn-danger me-2">Delete</a>
                     </div>
                  </div>
            </div>


      </div>
        
                            <?php endforeach; ?>
         </div>

</div>






   </div>




</div>




        <!-- footer -->
   <?php //require_once '../app/include/footer.php'; ?>
   <!-- footer end -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
      crossorigin="anonymous"></script>
   <script src="https://kit.fontawesome.com/1d9689321f.js" crossorigin="anonymous"></script>
</body>
</html> 







            <!-- <div class="row post">
               <div class="id col-1">
                  <? //= $key + 1 ?>
               </div>
               <div class="id col-2">
                  <a href="<? //= BASE_URL . "library/library_fund.php" ?>"><? //= $class['title'] ?></a>
             </div>
               <div class="id col-5">
                  <? //= $class['class'] ?>
               </div>
               <div class="id col-2">
                  <? //= $class['class'] ?>
               </div>
              
               <div class="red  col-1"><a href="edit.php?id=<? //= $class['id'] ?>">edit</a></div>
               <div class="del col-1"><a href="index.php?id_delete=<? //= $class['id'] ?>">delete</a></div>
            </div> -->
         <?php // } ?>
      <!-- </div> -->
   <!-- </div> -->
   <!-- </div> -->


 <!-- <div class="row title-table">
            <h2>Управление библиотекой</h2>
            <div class=" col-1">№</div>
            <div class=" col-2">Название</div>
            <div class=" col-5">У кого</div>
            <div class="  col-2">Класс</div>-->
            <!-- <div class="  col-2">Дата</div> -->
           <!--  <div class=" col-2">Управление</div>
         </div> -->
  