<?php
//Функция проверяет загружаемый файл на тип файла и его размер,загружает файл в папку img и добавляет запись в ДБ
function loadImage() {
    if (empty(($_FILES["myfile"]["name"][0]))) {
        header("Location: /catalog");
        die();
    }
    for ($i = 0; $i < count($_FILES["myfile"]["name"]); $i++) {
        if (($_FILES["myfile"]["type"][$i] === "image/jpeg") ||
            ($_FILES["myfile"]["type"][$i] === "image/jpg") ||
            ($_FILES["myfile"]["type"][$i] === "image/png")) {
            if ($_FILES["myfile"]["size"][$i] < 10 * 1024 * 1024) {
                $path = "img/" . $_FILES["myfile"]["name"][$i];
                move_uploaded_file($_FILES["myfile"]["tmp_name"][$i], $path);
                executeQuery("INSERT INTO `pictures`(`name`) VALUES ('{$_FILES["myfile"]["name"][$i]}')");
            } else {
                return "Максимальный размер изображения 10 МБ";
            }
        } else {
            return "Неподходящий тип файла, только .jpg .png .jpeg";
        }
    }
    header("Location: /catalog");
    die();
}

//Функция возвращает массив, состоящий из имен содержимого папки, передаваемой в параметре
function getContent($dir) {
    return array_slice(scandir($dir), 2);
}

//Функция проверяет пустая ли база данных и заполняет ее
function initDb() {
    if (getAssocResult('SELECT COUNT(id) as count FROM pictures')[0]['count'] == '0') {
        $sql = "INSERT INTO `pictures`(`imgName`, `cost`, `prodName`, `description`) VALUES ";
        foreach (INIT_CATALOG as $item) {
            $sql .= "('{$item["imgName"]}', {$item["cost"]}, '{$item["prodName"]}', '{$item["description"]}'),";
        }
        $sql = substr($sql, 0, -1);
        executeQuery($sql);
    }
}

//Функци возвращает массив данных из БД
function getDbContent() {
    return getAssocResult("SELECT * FROM pictures ORDER BY views DESC");
}

function getProduct(int $id) {
    $sql = "SELECT * FROM pictures WHERE id = {$id}";
    executeQuery("UPDATE pictures SET views = views + 1 WHERE id = {$id}");
    $picture = getAssocResult($sql);
    return $picture[0];
}