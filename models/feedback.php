<?php

function getAllFeedback($itemId) {
    $sql = "SELECT feedback_text, created_at, u.name as author FROM feedback f JOIN users u ON u.id = f.author WHERE ItemID = $itemId ORDER BY created_at DESC";
    return getAssocResult($sql);
}

function addFeedback($author, $text, $itemId) {
    $sql = "INSERT INTO `feedback` (`author`, `feedback_text`, `itemId`) VALUES ('{$author}', '{$text}', {$itemId})";
    executeSql($sql);
}