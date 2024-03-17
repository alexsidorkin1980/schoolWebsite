<?php

//рядок з  запитом до бази
$sql = "SELECT * FROM `classes` WHERE `graduate` IS NULL ORDER BY `number` ASC";
// Подготовка запроса
$stmt = $pdo->prepare($sql);

// Выполнение запроса
$stmt->execute();

// Получение результата
$classes = $stmt->fetchAll();
?>
<select class="form-select" name='combobox' aria-label="Default select example">
    <?php foreach ($classes as $class) {
        if (isset($_POST['Combobox1']) and $_POST['Combobox1'] == $id) { ?>
            <option selected value="<?= $class['id'] ?>">
                <?= $class['number'] . '-' . $class['letter']; ?>
            </option>
        <?php } else { ?>
            <option value="<?= $class['id'] ?>">
                <?= $class['number'] . '-' . $class['letter']; ?>
            </option>
        <?php }
    } ?>
</select>