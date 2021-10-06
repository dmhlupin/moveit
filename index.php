<?php

$header = renderTemplate("header");
$sidebarMenu = renderTemplate("sidebarMenu");
$mainform = renderTemplate("mainform");
$gallery = renderTemplate("gallery");
$description = renderTemplate("description");
$footer = renderTemplate("footer");


echo renderTemplate("layout", [
        'header' => $header,
        'sidebarMenu' => $sidebarMenu,
        'mainform' => $mainform,
        'footer' => $footer,
]);

function renderTemplate($page, $params = []) 
{
    extract($params);
    ob_start();
    include $page . ".php";
    return ob_get_clean();
}

