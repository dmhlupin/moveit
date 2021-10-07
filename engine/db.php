<?php

function getDb() 
{
    static $db = null;
    if(is_null($db)) {
        $db = @mysqli_connect(HOST, USER, PASS, DB) or die("Could not connect: " . mysqli_connect_error());
    }
    return $db;
}

// Запрос для получения массива записей
function getAssocResult($sql) 
{
    $result = @mysqli_query(getDb(), $sql) or die(mysqli_error(getDb()));
    $array_result = [];
    while ($row =  mysqli_fetch_assoc($result)) {
        $array_result[] = $row;
    }
    return $array_result;
}


//Запрос для получения 1й записи
function getOneResult($sql) 
{
    $result = @mysqli_query(getDb(), $sql) or die(mysqli_error(getDb()));
    return mysqli_fetch_assoc($result);
}

// Изменение данных в DB
function executeSql($sql) {
    @mysqli_query(getDb(), $sql) or die(mysqli_error(getDb()));
    return mysqli_affected_rows(getDb());
}