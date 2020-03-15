<?php

function get_user()
{
    return $_SESSION['login'];

}

function getUsers()
{
    $id = $_SESSION['id'];
    return getAssocResult("SELECT * FROM `users` WHERE id != {$id}");
}

function is_auth() {
    if (isset($_COOKIE["hash"]) && !isset($_SESSION['login'])) {
        $hash = $_COOKIE["hash"];
        $user = getAssocResult("SELECT * FROM `users` WHERE `hash`='{$hash}'")[0]['login'];
        if (!empty($user)) {
            $_SESSION['login'] = $user;
        }
    }
    return isset($_SESSION['login']);
}

function auth($login, $pass) {
    $login = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($login)));
    $passDb = getAssocResult("SELECT * FROM users WHERE login = '{$login}'")[0];
    if (password_verify($pass, $passDb['pass'])) {

        $_SESSION['login'] = $login;
        $_SESSION['id'] = $passDb['id'];
        $_SESSION['role'] = $passDb['role'];
        return true;
    }
    return false;
}

function updateHash() {
    $hash = uniqid(rand(), true);
    $id = (int)$_SESSION['id'];
    executeQuery("UPDATE `users` SET `hash` = '{$hash}' WHERE `users`.`id` = {$id}");
    setcookie("hash", $hash, time() + 36000, '/');
}

function is_admin() {
    return ($_SESSION['role'] == 1) ? true : false;
}