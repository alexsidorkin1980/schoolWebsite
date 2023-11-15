<?php  

                //рядок з  запитом до бази
                $sql = "SELECT * FROM `classes` WHERE `graduate` IS NULL ORDER BY `number` ASC";
                // Подготовка запроса
                $stmt = $pdo->prepare($sql);

                // Выполнение запроса
                $stmt->execute();
                
                // Получение результата
                $classes = $stmt->fetchAll();
                // tt($classes);exit();
//  foreach ($s as $item) {
//     $id = $item['id'];
//     $class = $item['class'];
//     $lit = $item['lit'];
//     $graduate = $item['graduate'];
// }
?>
        <select class="form-select" name='combobox' aria-label="Default select example">
        <?php foreach($classes as $class){
            if (isset($_POST['Combobox1']) and $_POST['Combobox1'] == $id ) {?>
        <option selected value="<?= $class['id']?>"><?= $class['number'].'-'.$class['letter']; ?></option>
        <?php  }else{ ?>
        <option  value="<?= $class['id']?>"><?= $class['number'].'-'.$class['letter']; ?></option>
        <?php } } ?>
            </select>





<?php
// $look = "
// <select name='Combobox1' size='1' id='Combobox1'
//  style='position:absolute;left:177px;top:153px;width:156px;height:28px;z-index:10'>";
// //перебираю отриманий масив		
//         foreach ($s as $item) {

//             $id = $item['id'];
//             $class = $item['class'];
//             $lit = $item['lit'];
//             $graduate = $item['graduate'];
        
//         //з кожного запису масиву будую рядок мого комбобоксу
// 		if (isset($_POST['Combobox1']) and $_POST['Combobox1'] == $id )
// 			$look = $look."<option selected value='".$id ."'>".$class."-".$lit."</option>"; 
// 		else 
// 		$look = $look."<option value='".$id ."'>".$class."-".$lit."</option>";        
// 	} 	

// //додаю закінчення комбобоксу 
// $look = $look."</select>";