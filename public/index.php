<?php
include '../config/config.php';

// Переменные
$page = 'login';
$params = [];

// Рендер шаблона
if(isset($_GET['page'])) {
    $page = $_GET['page'];
    $userName = $_GET['login'];
    $mainBlockParams = getMainBlockParams($page);
    switch($page){
        case 'home': 
            $params = [
                'header' => renderTemplate("header", ["userName" => $userName]),
                'sidebarMenu' => renderTemplate("sidebarMenu",["menu" => getMenu()]),
                'mainblock' => renderTemplate("mainblock", $mainBlockParams), //сделать отдельную функцию в конфиге с определением массива параметров и массива пунктов локального меню в зависимости от страницы
                'footer' => renderTemplate("footer", ["year" => 2021]),
            ];
            break;
        case 'login':
            $params = [];
            break;
        default: $params = [];
    }
}

echo render($page, $params);

