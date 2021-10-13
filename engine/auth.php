<?php

//Получение пользователя из сессии
function get_user() 
{
    return $_SESSION['login'];
}
function get_user_id() 
{
    return $_SESSION['id'];
}

// Проверка юзера на админство
function is_admin() 
{
    return $_SESSION['login'] == 'admin';
}

// Проверка на авторизацию
function is_auth()
{
    //оптимизировать if 1:58:40 если сессия уже есть - авторизовать по сессии
    if (isset($_COOKIE["hash"])) {
        $hash = $_COOKIE["hash"];
        $sql = "SELECT * FROM `users` WHERE `hash` = '{$hash}'";
        $result = mysqli_query(getDb(), $sql);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $user = $row['login'];
            if (!empty($user)) {
                $_SESSION['login'] = $user;
                var_dump($_SESSION['login']);
            }
        }
    }
    return isset($_SESSION['login']);
}


// функция авторизации
function auth($login, $pass) {
    $user = filterSecurity($login);
    if(!empty($user)) {
        $row = getDbUser($user);
        //сделать через password_verify
        //В базу данных - hash  и сравнивать по hash
        if ($pass == $row['secret']) {
            $_SESSION['login'] = $user;
            $_SESSION['id'] = $row['id'];
            return true;
        }
    }
    return false;
}

