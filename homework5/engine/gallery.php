<?php
//Функция проверяет загружаемый файл на тип файла и его размер,загружает файл в папку img и добавляет запись в ДБ
function loadImage() {
    if (empty(($_FILES["myfile"]["name"][0]))) {
        header("Location: ?page=gallery");
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
    header("Location: ?page=gallery");
    die();
}

//Функция возвращает массив, состоящий из имен содержимого папки, передаваемой в параметре
function getContent($dir) {
    return array_slice(scandir($dir), 2);
}

//Функция проверяет пустая ли база данных (не совсем корректно, я понимаю :) ) и заполняет ее
function initDb() {
    if (empty(getAssocResult('SELECT `name` FROM `pictures` WHERE id = 1'))) {
        foreach (getContent('img') as $item) {
            executeQuery("INSERT INTO `pictures`(`name`) VALUES ('{$item}')");
        }
    }
}

//Функци возвращает массив данных из БД
function getDbContent() {
    return getAssocResult("SELECT * FROM pictures ORDER BY views DESC");
}

function getOnePic(int $id) {
    $sql = "SELECT * FROM pictures WHERE id = {$id}";
    $picture = getAssocResult($sql);
    return $picture[0];
}