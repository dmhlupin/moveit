<?php
// Константы
define('TEMPLATES_DIR', 'templates/');
define('LAYOUTS_DIR', 'layouts/');


// Переменные
$page = 'login';
$params = [];
// $header = renderTemplate("header", ["userName" => "Dmitry"]);
// $sidebarMenu = renderTemplate("sidebarMenu");
// $mainform = renderTemplate("mainform");
// $gallery = renderTemplate("gallery");
// $description = renderTemplate("description");
// $footer = renderTemplate("footer", ["year" => 2021]);

// Рендер шаблона
if(isset($_GET['page'])) {
    $page = $_GET['page'];
    $userName = $_GET['login'];
    switch($page){
        case 'mainpage': 
            $params = [
                'header' => renderTemplate("header", ["userName" => $userName]),
                'sidebarMenu' => renderTemplate("sidebarMenu",["menu" => getMenu()]),
                'mainform' => renderTemplate("mainform"),
                'footer' => renderTemplate("footer", ["year" => 2021]),
            ];
            break;
        case 'login':
            $params = [];
            break;
        default: $params = [];
    }
}
// var_dump($_GET);
echo render($page, $params);


// Функция рендера всей страницы
function render($page, $params = [])
{
    return renderTemplate(LAYOUTS_DIR . 'main', [
        'content' => renderTemplate($page, $params)
    ]);
}
// функция рендера подшаблона
function renderTemplate($page, $params = []) 
{
    extract($params);
    ob_start();
    include TEMPLATES_DIR . $page . ".php";
    return ob_get_clean();
}

// функция получения массива меню
function getMenu() 
{
    return [
        [
            'name' => 'Home',
            'link' => '#'
        ],
        [
            'name' => 'Catalog',
            'link' => '#'
        ],
        [
            'name' => 'Orders',
            'link' => '#'
        ]
    ];
}