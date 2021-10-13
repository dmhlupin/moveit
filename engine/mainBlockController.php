<?php

function getFiles() {
    return array_splice(scandir('docs'), 2);
}


//рендер главного окна 
//результат - разные блоки, разное их количество, которые собираются
//склеиванием результатов renderTemplate
function getMainBlockContent($section, $action="")
{
    $userId = get_user_id();
    switch ($section) {
        case 'home':
            $items = getItems();
            $itemId = isset($_GET['itemId']) ? (int)$_GET['itemId'] : (int)$items[0]['id'];
            $item = getItem($itemId);

            if($action=="add_feedback") {
                $author = filterSecurity($_POST['name']);
                $text = filterSecurity($_POST['message']);
                $i = filterSecurity($_POST['item']);
                addFeedback($author, $text, $i);
            }
            if($action=="to_order") {
                $customer = $userId;
                $itemId = filterSecurity($_POST['orderedItem']);
                addOrder($customer, $itemId);
                
            }

            return renderTemplate("blockHeader",["title" => "Каталог"]).
                   renderTemplate("homepage",["items" => $items]).
                   renderTemplate("feedback",["feedback" => getAllFeedback($itemId),
                                             "itemId" => $itemId]).
                   renderTemplate("gallery",["itemImage" => $item['main_image']]).
                   renderTemplate("description",["itemId" => $itemId,
                                                 "itemTitle" => $item['title'],
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
        case 'orders':
            return renderTemplate("blockHeader",["title" => "Файлы"]) . 
            renderTemplate("orders", ["orders" => getUserOrders($userId)]);
            break;
        default: return 'Не готово!';
    }
}