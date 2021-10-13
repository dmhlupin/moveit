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

function get_user_name()
{
    return $_SESSION['userName'];
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
    if(isset($_SESSION['login'])) {
        return true;
    } else {
        if (isset($_COOKIE["hash"])) {
            $hash = $_COOKIE["hash"];
            $sql = "SELECT * FROM `users` WHERE `hash` = '{$hash}'";
            $result = mysqli_query(getDb(), $sql);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $user = $row['login'];
                $userId = $row['id'];
                $userName = $row['name'];
                if (!empty($user)) {
                    $_SESSION['login'] = $user;
                    $_SESSION['id'] = $userId;
                    $_SESSION['userName'] = $userName;
                }
            }
        }
        return isset($_SESSION['login']);
    }
}


// функция авторизации
function auth($login, $pass) {
    $login = filterSecurity($login);
    if(!empty($login)) {
        $row = getDbUser($login);
        //сделать через password_verify
        //В базу данных - hash  и сравнивать по hash
        if ($pass == $row['secret']) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $row['id'];
            $_SESSION['userName'] = $row['name'];
            return true;
        }
    }
    return false;
}

