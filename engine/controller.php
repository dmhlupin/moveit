<?php

function prepareVars($page, $section, $action = "") {

    $params = [];
    // $params['userName'] = get_user();
    // $params['auth'] = is_auth();
    $params['message'] = 'Please login!';
    
    
    switch($page){
        case 'main':
            if($_POST['newLogin']) {
                if(empty($_POST['newUser']) or empty($_POST['newLogin']) or empty($_POST['newUserPwd'])) {
                    $params['message'] = 'Заполните все поля';
                    break;
                } else {
                    addUser($_POST['newUser'], $_POST['newLogin'], $_POST['newUserPwd']);
                    $params['message'] = 'Регистрация успешна!';
                }
            }
            if($_POST['login']) {
                
                $login = $_POST['login'];
                $pass = $_POST['pass'];   
                if(auth($login, $pass)) {
                    if(isset($_POST['save'])) {
                        $hash = uniqid(rand(), true);
                        $id = $_SESSION['id'];
                        $sql = "UPDATE users SET `hash` = '{$hash}' WHERE id = {$id}";
                        $result = mysqli_query(getDb(), $sql);
                        setcookie("hash", $hash, time() + 3600, "/");
                    }
                }
                else {
                    $params['message'] = 'Wrong username or password!';
                    
                    break;
                }
            } 
            if(is_auth()){
                $userId = $_SESSION['id']; 
                $params = [
                    'userName' => get_user(),
                    'auth' => is_auth(),
                    'header' => renderTemplate("header", ["userName" => get_user(),
                                                          "headOrders" => getOrdersCount($userId)]),
                    'sidebarMenu' => renderTemplate("sidebarMenu",["menu" => getMenu()]),
                    'mainblock' => renderTemplate("mainblock", ["blockContent" => getMainBlockContent($section, $action)]), //сделать отдельную функцию в конфиге с определением массива параметров и массива пунктов локального меню в зависимости от страницы
                    'footer' => renderTemplate("footer", ["year" => 2021]),
                ];
            }

            
            break;
        case 'logout':
            setcookie("hash", "", time()-1, "/");
            session_regenerate_id();
            session_destroy();
            header("Location: /");
            die();
            break;

        case 'registration':
            $params = [];
            break;
        default: $params = [];
    }
return $params;

}