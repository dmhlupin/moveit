<?php

function getDbUser ($userId) 
{
    $sql = "SELECT * FROM users WHERE login = '{$userId}'";
    return getOneResult($sql);
}

function getDbUserHash ($hash) {
    $sql = "SELECT * FROM `users` WHERE `hash`='{$hash}'";
    return getOneResult($sql);
}

function addUser ($newUserName, $newUserLogin, $newUserPass) {
    $name = filterSecurity($newUserName);
    $login = filterSecurity($newUserLogin);
    $pwd = filterSecurity($newUserPass);
    $sql = "INSERT INTO `users` (`name`, `login`, `secret`) VALUES ('{$name}', '{$login}', '{$pwd}')";
    executeSql($sql);
}