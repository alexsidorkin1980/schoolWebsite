
<?


 $s = selectAll('classes',['graduate'=>null],$orderBy = 'classes.class ASC');
 //рядок з  запитом до бази на класс
 
 $look = "<div >";
 $look.= "
 <form action='' method='post'>
 <select name='Combobox1' size='1' id='Combobox1' 
 style='width:99px;height:28px;z-index:13;margin:0 0 30px'>";//будую шапку комбобоксу	
         foreach ($s as $item) {
             $id = $item['id'];
             $class = $item['class'];
             $lit = $item['lit'];
             $graduate = $item['graduate'];	
         //з кожного запису масиву будую рядок мого комбобоксу   
       if (isset($_POST['Combobox1']) and $_POST['Combobox1'] == $id)
       $look = $look."<option selected value='".$id."'>".$class."-".$lit."</option>"; 
    else 
    $look = $look."<option value='".$id."'>".$class."-".$lit."</option>";        
 
     }
 
 //додаю закінчення комбобоксу style='position:absolute;top:145px;left:100px;'
 
 $look = $look."</select>
 
 <button type='submit' >Пошук</button>
     </form>";
     $look.= "</div>";