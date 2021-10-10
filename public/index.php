<?php
include '../config/config.php';

// Переменные
$page = 'login';
$params = [];
$section = "home";

// Рендер шаблона
$url_array = explode('/', $_SERVER['REQUEST_URI']);
if($url_array[1] == "") {
    $page = "login";
} else {
    $page = $url_array[1];
    if($url_array[2] == "") {
        $section = "home";
    } else {
        $section = $url_array[2];
        if($url_array[3] == ""){
            $action = "";
        } else {
            $action = $url_array[3];
        }
    }
    $userName = (isset($_POST['login']))?$_POST['login']:'Guest';
}
//Контроллер
$params = prepareVars($page, $section, $userName, $action);

// Выводим шаблон
echo render($page, $params);

