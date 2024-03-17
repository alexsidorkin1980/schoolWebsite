<?php
require_once __DIR__ . '/../../app/database/db.php';

$errMsg = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_teacher'])) {

    $name = trim($_POST['name']);
    $combobox = trim($_POST['combobox']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $phon_number = trim($_POST['phon_number']);

    $teacher = [
        'name' => $name,
        'class_id' => $combobox,
        'email' => $email,
        'address' => $address,
        'phon_number' => $phon_number,

    ];

    insert('teachers', $teacher);
    header('location: ../../admin/teachers/index.php ');
} else {

    $name = '';
    $address = '';
    $phon_number = '';
}
// данные для edit по id из $_GET
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $teacher = selectOne('teachers', ['id' => $_GET['id']]);
    $name = trim($teacher['name']);
    $email = trim($teacher['email']);
    $address = trim($teacher['address']);
    $phon_number = trim($teacher['phon_number']);
}

// изменение данных учителя
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_teacher'])) {
    $combobox = trim($_POST['combobox']);
    $address = trim($_POST['address']);
    $phon_number = trim($_POST['phon_number']);

    if ($address === '' || $phon_number === '') {
        array_push($errMsg, "Заполнены не все данные!!!");

    } else {
        $teacher = [
            'class_id' => $combobox,
            'address' => $address,
            'phon_number' => $phon_number,

        ];
        $id = $_POST['id'];
        update('teachers', $id, $teacher);
        header('location: ../../admin/teachers/index.php ');
    }
} else {

    $address = '';
    $phon_number = '';
}

// данные для edit по id из $_GET
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_inf'])) {
    $id = $_GET['id_inf'];
    $teacher = selectOne('teachers', ['id' => $id]);
    $class =selectOne('classes' , ['id' => $teacher['class_id']]);
    $number= $class['number'];
    $letter= $class['letter'];
    $id = trim($teacher['id']);
    $name = trim($teacher['name']);
    $combobox = trim($teacher['class_id']);
    $email = trim($teacher['email']);
    $address = trim($teacher['address']);
    $phon_number = trim($teacher['phon_number']);
}
// удаление учителя
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_delete'])) {
    $id = $_GET['id_delete'];
    deletes('teachers', $id);
    header('location: ../../admin/teachers/index.php ');

}
