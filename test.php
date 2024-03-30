<?php  

require_once 'app/database/db.php';

$data = "Данные, которые вы хотите записать в файл";
$file = 'history-book.txt';

writeHistory($data, $file);



