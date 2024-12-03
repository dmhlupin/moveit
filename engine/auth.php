<?php

session_start();

$allow = false;

function getDb() 
{
    static $db = '';
    if(isset($db)) {
        $db = mysqli_connect('localhost', 'test', '12345', 'moveit');
    }
    return $db;
}

function get_user() 
{
    return $_SESSION['login'];
}

function is_admin() 
{
    return $_SESSION['login'] == 'admin';
}

function is_auth()
{
    //оптимизировать if 1:58:40
    if(isset($_COOKIE["hash"])) {
        $hash = $_COOKIE["hash"];
        $db = GetDb();
        $sql = "SELECT * FROM `users` WHERE `hash`='{$hash}'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        $user = $row['login'];
        if (!empty($user)) {
            $_SESSION['login'] = $user;
            $_SESSION['id'] = $row['id'];
        }
    }
    return isset($_SESSION['login']);
}

function auth($login, $pass) {
    $db = GetDb();
    $login = mysqli_real_escape_string($db, strip_tags(stripslashes($login)));
    $result = mysqli_query($db, "SELECT * FROM users WHERE login = '{$login}'");
    $row = mysqli_fetch_assoc($result);
    //сделать через password_verify
    if ($pass == $row['pass']) {
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $row['id'];
        return true;
    }
    return false;
}

if (isset($_GET['logout'])) {
    setcookie('hash', '', time() - 3600, '/');
    session_destroy();
    header("Location: /login"); //??
    die();
}

if (is_auth()) {
    $allow = true;
    $login = get_user();
}

if (isset($_POST['ok'])) { //кнопка формы  1:52 Я уже не могу!
    $login = strip_tags($_POST['login']);
    $pass = strip_tags($_POST['pass']);

    if(auth($login, $pass)) {
        if(isset($_POST['checked'])) { // Реализовать чекбокс на странице логина
            $hash = uniqid(rand(), true);
            $db = GetDb();   // уже есть функция - перепиши код выше!
            $id = $_SESSION['id'];
            $sql = "UPDATE `users` SET `hash` = '{$hash}' WHERE `users` . `id` = {$id}"; // запрос в функцию и в model
            $result = mysqli_query($db, $sql);
            setcookie("hash", $hash, time() + 3600, '/');
        }


        header('Location: main');
        die();
    } else {
        die('!!!');
    }
}