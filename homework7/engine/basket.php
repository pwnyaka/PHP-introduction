<?php
function getBasket() {
    $session = session_id();
    return getAssocResult("SELECT basket.quantity, basket.id basket_id, goods.imgName, goods.id good_id, goods.prodName, 
    goods.description, goods.cost FROM basket, goods WHERE basket.good_id=goods.id AND session_id = '{$session}'");
}

function getBasketSum() {
    $session = session_id();
    return getAssocResult("SELECT SUM(goods.cost * basket.quantity) as result FROM basket, goods WHERE basket.good_id=goods.id
 AND session_id = '{$session}'")[0]["result"];

}

function addProduct($id) {
    $id = (int)$id;
    $session = session_id();
    if (empty(getAssocResult("SELECT * FROM basket WHERE good_id = {$id} AND session_id='{$session}'")[0])) {
        executeQuery("INSERT INTO `basket` (`good_id`, `session_id`) VALUES ({$id}, '{$session}')");
    } else {
        executeQuery("UPDATE basket SET quantity = quantity + 1 WHERE good_id = {$id} AND session_id = '{$session}'");
    }

}

function deleteProduct($id) {
    $id = (int)$id;
    $session = session_id();
    if (getAssocResult("SELECT quantity FROM basket WHERE id = {$id} AND session_id='{$session}'")[0]["quantity"] == 1) {
        executeQuery("DELETE FROM `basket` WHERE id={$id} AND session_id='{$session}'");
    } else {
        executeQuery("UPDATE basket SET quantity = quantity - 1 WHERE id = {$id} AND session_id = '{$session}'");
    }
}

function getBasketCount() {
    $session = session_id();
    return getAssocResult("SELECT SUM(quantity) as count FROM `basket` WHERE `session_id`='{$session}'")[0]["count"];
}

function getProductSum($id) {
    $session = session_id();
    return getAssocResult("SELECT basket.quantity * goods.cost as result FROM basket, goods WHERE basket.id = {$id} AND
 basket.session_id = '{$session}'")[0]["result"];
}