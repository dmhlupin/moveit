<?php
session_start();
include '../config/config.php';


// ЧПУ
$url_array = explode('/', $_SERVER['REQUEST_URI']);
if($url_array[1] == "") {
    $page = "main";
    $section = "home";
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
    
}
//Контроллер
$params = prepareVars($page, $section, $action);

// Выводим шаблон
echo render($page, $params);

