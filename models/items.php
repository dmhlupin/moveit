<?php
function getItems() {
    $items = getAssocResult("SELECT `id`, `title`, `main_image`, `description`, `start_date`, `brand`, `serial_number` FROM items;");
    return $items;
}

function getItem($id) {
    $item = getOneResult("SELECT `id`, `title`, `main_image`, `description`, `start_date`, `brand`, `serial_number` FROM items WHERE id = {$id}");
    return $item;
}