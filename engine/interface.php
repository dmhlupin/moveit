<?php
// функция получения массива меню
function getMenu() 
{
    return [
        [
            'name' => 'Home',
            'link' => '/?page=main&section=home',
            'active' => ''
        ],
        [
            'name' => 'Files',
            'link' => '/?page=main&section=files',
            'active' => 'active'
        ],
        [
            'name' => 'Orders',
            'link' => '#',
            'active' => ''
        ]
    ];
}

//рендер главного окна 
//результат - разные блоки, разное их количество, которые собираются
//склеиванием результатов renderTemplate
function getMainBlockContent($section){
    switch ($section) {
        case 'home':
            return renderTemplate("blockHeader").
                                renderTemplate("homepage").
                                renderTemplate("gallery").
                                renderTemplate("description");
                                            
            break;
        case 'files':
            return renderTemplate("blockHeader") . 
            renderTemplate("filesContent",["files" => getFiles()]);
            break;
        default: return 'Не готово!';
    }
}