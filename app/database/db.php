<?php
session_start();
require('connect.php');



function tt($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}
// проверка выполнения запроса к бд
function tte($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}
// проверка выполнения запроса к бд
function dbCheckError($query)
{
    $errInfo = $query->errorInfo();

    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
    return true;
}


function combobox($table)
{
    global $pdo;
    //рядок з  запитом до бази
    $sql = "SELECT * FROM $table ORDER BY `name` ASC";
    // Подготовка запроса
    $stmt = $pdo->prepare($sql);

    // Выполнение запроса
    $stmt->execute();

    // Получение результата
    $users = $stmt->fetchAll();

    // tte($_POST);
    ?>
    <select class="form-select" name='combobox' aria-label="Default select example">
        <?php foreach ($users as $user) {
            // tt($user);
            if (isset($_POST['combobox']) and $_POST['combobox'] == $user['id']) { ?>
                <option selected value="<?= $user['id'] ?>">
                    <?= $user['name']; ?>
                </option>
            <?php } else { ?>
                <option value="<?= $user['id'] ?>">
                    <?= $user['name']; ?>
                </option>
            <?php }
        } ?>
    </select>
<?php
}

// запрос на прлучение данных с одной таблицы

function selectAllQuery($table, $params = [], $orderBy = '')
{
    global $pdo;
    $sql = "SELECT * FROM $table ";


    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if ($value === null && $i !== 0) {
                $sql .= " AND $key IS NULL"; // Для NULL значения


            } else {

                if (!is_numeric($value)) {
                    $value = "'" . $value . "'";
                }
                if ($i === 0) {
                    if ($value === null) {
                        $sql = $sql . " WHERE $key=$value";
                    }
                    $sql .= " WHERE $key IS NULL";

                } else {
                    $sql = $sql . " AND $key=$value";
                }
                $i++;
            }
        }
    }
    if (!empty($orderBy)) {
        $sql .= " ORDER BY $orderBy";
    }

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}







function selectAll($table, $params = [])
{
    global $pdo;
    $sql = "SELECT * FROM $table ";
    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key=$value";
            } else {
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}


// запрос на получение одной строки с выбранной таблицы
function selectOne($table, $params = [])
{
    global $pdo;
    $sql = "SELECT * FROM $table ";
    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key=$value";
            } else {
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();


}


//запись в таблицу бд

function insert($table, $params)
{
    global $pdo;
    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $coll = $coll . "$key";
            $mask = $mask . "'" . "$value" . "'";
        } else {
            $coll = $coll . ", $key";
            $mask = $mask . ", '" . "$value" . "'";
        }
        $i++;
    }


    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $pdo->lastInsertId();
}


// обновление строки в таблице
function update($table, $id, $params)
{
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {

            $str = $str . $key . " = '" . $value . "'";
        } else {

            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }

    $sql = "UPDATE $table SET $str WHERE id=$id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

}


// удаление строки в таблице
function deletes($table, $id)
{
    global $pdo;
    $sql = "DELETE FROM $table WHERE `id` = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

}
function removeClassIdForTeacher($teacherId)
{
    global $pdo;

    try {
        $sql = "UPDATE teachers SET class_id = NULL WHERE id = :teacherId";
        $query = $pdo->prepare($sql);
        $query->bindParam(':teacherId', $teacherId, PDO::PARAM_INT);
        $query->execute();
        // Обработка успешного выполнения запроса, если необходимо
    } catch (PDOException $e) {
        // Обработка ошибок, если они возникнут
        echo "Ошибка при удалении class_id для учителя с id $teacherId: " . $e->getMessage();
    }
}

//   выборка записей (posts) с автором в админку
function selectAllFromPostsWithUsers($table1, $table2)
{
    global $pdo;

    $sql = "SELECT 
    t1 .id,
    t1 .title,
    t1 .img,
    t1 .content,
    t1 .status,
    t1 .id_topic,
    t1 .created_data,
    t2 .username

    FROM $table1 t1 
    JOIN $table2 t2 
    ON t1.id_user=t2.id";




    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();

}



function selectAllFromPostsWithUsersOneIndex($table1, $table2, $limit, $offset)
{
    global $pdo;

    $sql = "SELECT p.*, u.username
    FROM $table1 AS P
    JOIN $table2 AS u
    ON p.id_user=u.id
    WHERE p.status=1
    LIMIT $limit 
    OFFSET $offset";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();

}


// выборка записей (post ) с автором на главную
function selectTopTopicFromPostsOneIndex($table1)
{
    global $pdo;

    $sql = "SELECT *
    FROM $table1
    WHERE id_topic = 16 ";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();

}

// поиск по заголовкам и содержимому (простой)
function searchInTitleAndContent($text, $table1, $table2)
{
    global $pdo;
    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
    $sql = "SELECT p.*, u.username
    FROM $table1 AS P
    JOIN $table2 AS u
    ON p.id_user=u.id
    WHERE p.status=1
    AND p.title LIKE '%$text%'
    OR p.content LIKE '%$text%'";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();

}

//
function selectAllFromClassesWithTeachersOneIndex($table1, $table2)
{
    global $pdo;
    $sql = "SELECT p.*, u.name
    FROM $table1 AS p
    LEFT JOIN $table2 AS u ON p.id = u.class_id
    UNION 
    SELECT p.*, u.name
    FROM $table1 AS p
    RIGHT JOIN $table2 AS u ON p.id = u.class_id;";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();

}


function selectAllFromClasssWithStudentsOneIndex($table1, $table2)
{
    global $pdo;

    $sql = "SELECT p.number,p.letter, u.*
    FROM $table1 AS P
    JOIN $table2 AS u
    ON p.id=u.class_id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();

}
function selectAllFromClasssWithTeachersOneIndex($table1, $table2)
{
    global $pdo;

    $sql = "SELECT p.number,p.letter, u.*
    FROM $table1 AS P
    JOIN $table2 AS u
    ON p.id=u.class_id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();

}

function selectPostFromPostsWithUsersOneSingle($table1, $table2, $id)
{
    global $pdo;

    $sql = "SELECT p.*, u.username
    FROM $table1 AS P
    JOIN $table2 AS u
    ON p.id_user=u.id
    WHERE p.id=$id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();

}
// выборка записи (post ) с автором для single
function countRow($table)
{
    global $pdo;

    $sql = "SELECT COUNT(*)
    FROM $table WHERE status = 1";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchColumn();

}

function writeHistory($data, $file)
{
    $handle = fopen($file, 'a');

    if ($handle !== false) {
        if (fwrite($handle, $data) !== false) {
            echo "Данные успешно записаны в файл.";
        } else {
            echo "Произошла ошибка при записи в файл.";
        }

        fclose($handle);
    } else {
        echo "Не удалось открыть файл для записи.";
    }
}
