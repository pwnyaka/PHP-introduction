<?php
if ($_POST["send"]) {
    for ($i = 0; $i < count($_FILES["myfile"]["name"]); $i++) {
        if (($_FILES["myfile"]["type"][$i] === "image/jpeg") ||
            ($_FILES["myfile"]["type"][$i] === "image/jpg") ||
            ($_FILES["myfile"]["type"][$i] === "image/png")) {
            if ($_FILES["myfile"]["size"][$i] < 10000000) {
                $path = "img/" . $_FILES["myfile"]["name"][$i];
                move_uploaded_file($_FILES["myfile"]["tmp_name"][$i], $path);
            }
        }
    }
    header("Location: ?page=gallery");
    die();
}