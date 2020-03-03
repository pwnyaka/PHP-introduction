<?php
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