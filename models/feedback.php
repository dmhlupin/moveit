<?php

function getAllFeedback($itemId) {
    $sql = "SELECT * FROM feedback WHERE ItemID = $itemId ORDER BY created_at DESC";
    return getAssocResult($sql);
}

function addFeedback($author, $text, $itemId) {
    $sql = "INSERT INTO `feedback` (`author`, `feedback_text`, `itemId`) VALUES ('{$author}', '{$text}', {$itemId})";
    executeSql($sql);
}