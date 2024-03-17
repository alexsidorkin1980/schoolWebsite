<?php
// добавление избражения  

if (!empty($_FILES['img']['name'])) {
    $imgName = time() . "_" . $_FILES['img']['name'];
    $fileTmpName = $_FILES['img']['tmp_name'];
    $fileType = $_FILES['img']['type'];
    $fileSize = $_FILES['img']['size'];
    $destination = ROOT_PATH . "\assets\images\posts\\" . $imgName;

    if (strpos($fileType, 'image') === false) {
        array_push($errMsg, "Можно загружать только изображения!!!");
    } else {
        if ($fileSize > 800000000) {
            array_push($errMsg, "Можно загружать  изображения только меньше 800 kb!!!");
        }
        $result = move_uploaded_file($fileTmpName, $destination); // добавление изображения в конечную папку сервера

        $imageInfo = getimagesize($destination); // анализирует изображение и возвращает информацию о его размерах и типе.
        $width = $imageInfo[0]; // Ширина изображения
        $height = $imageInfo[1]; // Высота изображения
        //   $imageType = $imageInfo[2]; // Тип изображения (1 = GIF, 2 = JPEG, 3 = PNG, и так далее)

        if ($width > 10000 && $height > 10000) {
            array_push($errMsg, "Можно загружать только изображения  высотой меньше 100 px и шириной меньше 100 px!!!");
        }
        // проверка на существование изображения в папке
        if ($result) {
            $_POST['img'] = $imgName;
        } else {
            array_push($errMsg, "Ошибка загрузки изображения на сервер!!!");
        }
    }
} else {
    array_push($errMsg, "Ошибка получения картинки!!!");
}

$img = isset($_POST['img']) ? trim($_POST['img']) : '';

if (!empty($img)) {
    update('posts', $id, ['img' => $_POST['img']]);
    header('location: ../../admin/posts/index.php ');
}