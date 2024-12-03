<?php



// Определение переменной Params
function prepareVars($page, $section, $userName, $action = "") 
{
    switch($page){
        case 'main': 
            $params = [
                'header' => renderTemplate("header",["userName" => $userName]),
                'sidebarMenu' => renderTemplate("sidebarMenu",["menu" => getMenu()]),
                'mainblock' => renderTemplate("mainblock", ["blockContent" => getMainBlockContent($section, $action)]), //сделать отдельную функцию в конфиге с определением массива параметров и массива пунктов локального меню в зависимости от страницы
                'footer' => renderTemplate("footer", ["year" => 2021]),
            ];
            break;
        case 'login':
            $params = [];
            break;
        default: $params = [];
    }
return $params;

}