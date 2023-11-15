


<nav aria-label="Page navigation example">
  <ul class="pagination">
 
    <li class="page-item"><a class="page-link" href="?page=0">First</a></li>

    <?php if($page>1){?>
        <li class="page-item"><a class="page-link" href="?page=<?=$page-1?>">Prev</a></li>  
    <?php }else?>

    <?php if($page<$total_pages){?>
        <li class="page-item"><a class="page-link" href="?page=<?=$page+1?>">Next</a></li>  
    <?php }else?>

    <li class="page-item"><a class="page-link" href="?page=<?=$total_pages?>">Last</a></li>
    
  </ul>
</nav>




<?php 
// echo 'попал на пагинацию!!!!' ;