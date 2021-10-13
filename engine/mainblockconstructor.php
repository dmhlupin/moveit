<?php

function getFiles() {
    return array_splice(scandir('docs'), 2);
}

//рендер главного окна 
//результат - разные блоки, разное их количество, которые собираются
//склеиванием результатов renderTemplate
function getMainBlockContent($section)
{
    switch ($section) {
        case 'home':
            $items = getItems();
            $itemId = isset($_GET['itemId']) ? (int)$_GET['itemId'] : $items[0]['id'];
            $item = getItem($itemId);
            return renderTemplate("blockHeader",["title" => "Домашняя"]).
                   renderTemplate("homepage",["items" => $items]).
                   renderTemplate("gallery",["itemImage" => $item['main_image']]).
                   renderTemplate("description",["itemTitle" => $item['title'],
                                                 "itemDesc" => $item['description'],
                                                 "itemStart" => $item['start_date'],
                                                 "itemSerial" => $item['serial_number'],
                                                 "itemBrand" => $item['brand']
                                               ]);
                                            
            break;
        case 'files':
            return renderTemplate("blockHeader",["title" => "Файлы"]) . 
            renderTemplate("filesContent",["files" => getFiles()]);
            break;
        default: return 'Не готово!';
    }
}
