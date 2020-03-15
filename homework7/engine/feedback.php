<?php
function getAllFeedback() {
    $sql = "SELECT * FROM `feedback` ORDER BY id DESC";
    return getAssocResult($sql);
}

function doFeedbackAction(&$params, $action) {
    if ($action == 'add') {
        addFeedback();
    }

    if ($action == 'delete') {
        deleteFeedback();
    }

    if ($action == "edit") {
        $params["action"] = 'save';
        $params["buttonText"] = 'Править';
        $params["editFeedback"] = editFeedback();
    }

    if ($action == 'save') {
        updateFeedback();
    }

    switch ($_GET['message']) {
        case 'OK':
            return "Отзыв добавлен!";
            break;
        case 'edit':
            return "Отзыв изменен!";
            break;
        case 'deleted':
            return "Отзыв удален!";
            break;
        case 'del_error':
            return "Ошибка при удалении отзыва!";
            break;
        case 'add_error':
            return "Заполните пустые поля!";
            break;
        case 'add_name_error':
            return "Введите свое имя!";
            break;
        case 'add_feedback_error':
            return "Введите текст отзыва!";
            break;
    }
}

function addFeedback() {
    $db = getDb();
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST["name"])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST["message"])));
    if ($name == '' && $feedback == '') {
        header("Location: /feedback/?message=add_error");
    } elseif ($name == '' && $feedback !== '') {
        header("Location: /feedback/?message=add_name_error");
    } elseif ($name !== '' && $feedback == '') {
        header("Location: /feedback/?message=add_feedback_error");
    } else {
        executeQuery("INSERT INTO `feedback` (`name`, `feedback`) VALUES ('{$name}', '{$feedback}')");
        header("Location: /feedback/?message=OK");
    }
}

function deleteFeedback() {
    $id = (int)$_GET["id"];
    executeQuery("DELETE FROM `feedback` WHERE id={$id}");
    if (mysqli_affected_rows(getDb()) == 0) {
        header("Location: /feedback/?message=del_error");
    } else {
        header("Location: /feedback/?message=deleted");
    }
}

function editFeedback() {
    $id = (int)$_GET["id"];
    $feedback = getAssocResult("SELECT * FROM `feedback` WHERE id={$id}");
    return $feedback[0];
}

function updateFeedback() {
    $id = (int)$_POST["id"];
    $db = getDb();
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST["name"])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST["message"])));
    executeQuery("UPDATE `feedback` SET `name`='{$name}',`feedback`='{$feedback}' WHERE id = {$id}");
    header("Location: /feedback/?message=edit");
}