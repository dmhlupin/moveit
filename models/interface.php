<?php
// функция получения массива меню
function getMenu() 
{
    return [
        [
            'name' => 'Home',
            'link' => '/main/home',
            'active' => 'active'
        ],
        [
            'name' => 'Files',
            'link' => '/main/files',
            'active' => ''
        ],
        [
            'name' => 'Orders',
            'link' => '/main/orders',
            'active' => ''
        ]
    ];
}

