<?php

function getAllOrders() {
    $sql = "SELECT * FROM orders ORDER BY order_time DESC";
    return getAssocResult($sql);
}

function getUserOrders($user) {
    $sql = "SELECT * FROM orders WHERE userId = $user ORDER BY order_time DESC";
    return getAssocResult($sql);
}

function addOrder($user, $itemId) {
    $sql = "INSERT INTO `orders` (`userId`, `itemId`) VALUES ('{$user}', '{$itemId}')";
    executeSql($sql);
}

function getOrdersCount($user) {
    $sql = "SELECT COUNT(*) AS count FROM orders WHERE userId = $user";
    $result = getOneResult($sql);
    return 'Заказов: '. $result['count'];

}