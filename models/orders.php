<?php

function getAllOrders() {
    $sql = "SELECT 
                o.id, 
                o.order_time,
                o.itemId,
                i.title,
                u.name as userName, 
                i.id as itemId,
                s.value as `status`
            FROM orders o
            JOIN `status` s ON s.id = o.status_id
            JOIN `items` i ON i.id = o.itemId
            JOIN `users` u ON u.id = o.userId
            ORDER BY order_time DESC";
    return getAssocResult($sql);
}

function getUserOrders($user) {
    $sql = "SELECT 
                o.id, 
                o.order_time,
                o.itemId,
                i.title,
                i.id as itemId,
                s.value as `status`
            FROM orders o 
            JOIN `status` s ON s.id = o.status_id
            JOIN `items` i ON i.id = o.itemId
            WHERE userId = $user 
            ORDER BY order_time DESC";
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

function getOrderStatus($orderId) {
    $sql = "SELECT 
                o.id, 
                s.value AS `status` 
            FROM orders o 
            JOIN `status` s ON s.id = o.status_id 
            WHERE o.id = $orderId";
    return getOneResult($sql);
}