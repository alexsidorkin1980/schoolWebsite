<?php
// session_start();
require_once '../app/database/db.php';
require_once '../path.php';
require_once '../app/controllers/library.php';
$class = isset($_GET['class']) ? $_GET['class'] : '';
$classes = selectAll('library_teach', ['status' => 'issued']);
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
   <?php require_once '../app/include/header-admin.php'; ?>
   <!-- header end -->
   <!-- <div class="col-10"> -->
   <div class="button row">
      <a href="<?= BASE_URL . "library/add-book-teach.php" ?>" class="col-2 btn btn-success">Добавить книгу</a>
   </div>
   <div class="container ">
      <div class="row">
         <!-- sidebar start -->
         <?php require_once '../app/include/sidebar-librarian.php'; ?>
         <!-- sidebar end -->
         <div class=" col-md-8">
            <div class="accordion" id="tasks-accordion">
               <h2>Выданные книги для учителя</h2>
               <?php
               foreach ($classes as $key => $oneTask):
                  $teacher = selectOne('teachers', ['id' => $oneTask['id_teacher']]);
                  ?>
                  <div class="accordion-item mb-2">

                     <div class="accordion-header d-flex justify-content-between align-items-center row"
                        id="task-<?php echo $oneTask['id']; ?>">
                        <h2 class="accordion-header col-12 col-md-12">
                           <button style="background-color: <? //=$priorityColor  ?>;" class="accordion-button collapsed"
                              type="button" data-bs-toggle="collapse"
                              data-bs-target="#task-collapse-<?php echo $oneTask['id']; ?>" aria-expanded="false"
                              aria-controls="task-collapse-<?php echo $oneTask['id']; ?>"
                              data-priority="<?php //echo $oneTask['priority'];   ?>">
                              <strong>
                                 <?php echo $key + 1 ?>
                              </strong>
                              <span class="col-12 col-md-5"> .<strong>
                                    <?php echo $oneTask['title']; ?>
                                 </strong></span>
                           </button>
                        </h2>
                     </div>
                     <div id="task-collapse-<?php echo $oneTask['id']; ?>" class="accordion-collapse collapse row"
                        aria-labelledby="task-<?php echo $oneTask['id']; ?>" data-bs-parent="#tasks-accordion">
                        <div class="accordion-body">
                           <p class="row">
                              <span class="col-12 col-md-6"><strong><i class="fa-solid fa-layer-group"></i> Автор:</strong>
                                 <?php echo htmlspecialchars($oneTask['author']); ?>
                              </span>
                              <span class="col-12 col-md-6"><strong><i class="fa-solid fa-battery-three-quarters"></i>
                                    Инвентаризационный номер:</strong>
                                 <?php echo htmlspecialchars($oneTask['inv_number']); ?>
                              </span>
                           </p>
                           <p class="row">
                              <span class="col-12 col-md-6"><strong><i class="fa-solid fa-person-circle-question"></i> Год
                                    издания:</strong>
                                 <?php echo htmlspecialchars($oneTask['date_edition']); ?>
                              </span>
                              <span class="col-12 col-md-6"><strong><i class="fa-solid fa-hourglass-start"></i> Дата
                                    выдачи:</strong>
                                 <?php echo htmlspecialchars($oneTask['borrow_date']); ?>
                              </span>
                           </p>

                           <p class="row">
                              <span class="col-12 col-md-6"><strong><i class="fa-solid fa-person-circle-question"></i> Дата
                                    возврата:</strong>
                                 <?php echo htmlspecialchars($oneTask['return_date']); ?>
                              </span>
                              <span class="col-12 col-md-6"><strong><i class="fa-solid fa-hourglass-start"></i> У
                                    кого:</strong>
                                 <?php echo htmlspecialchars($teacher['name']); ?>
                              </span>
                           </p>
                           <hr>
                           <div class="d-flex justify-content-start action-task">
                              <a href="index-teach-issued-book.php?id_book_return=<?php echo $oneTask['id']; ?>"
                                 class="btn btn-primary me-2">Вернуть</a>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php endforeach; ?>
            </div>
         </div>
         <?php require_once '../app/include/sidebar-librarian2.php'; ?>
      </div>
   </div>
   <!-- footer -->
   <?php require_once '../app/include/footer.php'; ?>
   <!-- footer end -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
      crossorigin="anonymous"></script>
   <script src="https://kit.fontawesome.com/1d9689321f.js" crossorigin="anonymous"></script>
</body>

</html>