<?php

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

