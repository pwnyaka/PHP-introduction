<?php

function getOrders()
{
    return getAssocResult("SELECT * FROM orders");
}

function getUserOrders() {
    $login = $_SESSION['login'];
    return getAssocResult("SELECT * FROM orders WHERE login = '{$login}'");

}

function makeOrder() {
    $session = session_id();
    $db = getDb();
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST["name"])));
    $phone = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST["phone"])));
    if (is_auth()) {
        if (executeQuery("INSERT INTO `orders` (`name`, `phone`, `session_id`, `login`) VALUES ('{$name}', '{$phone}', '{$session}', '{$_SESSION["login"]}')")) {
            header("Location: /basket/?message=OK");
            session_regenerate_id();
        } else {
            header("Location: /basket/?message=error");
        }
    } else {
        if (executeQuery("INSERT INTO `orders` (`name`, `phone`, `session_id`) VALUES ('{$name}', '{$phone}', '{$session}')")) {
            header("Location: /basket/?message=OK");
            session_regenerate_id();
        } else {
            header("Location: /basket/?message=error");
        }
    }

}
function getUserOrdersDetails() {
    $login = $_SESSION['login'];
    return getAssocResult("SELECT orders.id, basket.quantity, goods.prodName FROM basket, goods, orders WHERE
orders.login = '{$login}' AND orders.session_id=basket.session_id AND basket.good_id=goods.id");

}

function getOrderDetail($id)
{
    $id = (int) $id;
    return getAssocResult("SELECT orders.session_id, basket.quantity, goods.id good_id
  FROM basket, goods, orders WHERE basket.good_id=goods.id AND basket.session_id = orders.session_id AND orders.id = {$id}");
}

function acceptOrder($id) {
    $id = (int) $id;
    executeQuery("UPDATE `orders` SET `status`= 1 WHERE id={$id}");
}