<?php
// функция получения массива меню
function getMenu() 
{
    return [
        [
            'name' => 'Home',
            'link' => '/?page=main&section=home',
            'active' => 'active'
        ],
        [
            'name' => 'Files',
            'link' => '/?page=main&section=files',
            'active' => ''
        ],
        [
            'name' => 'Orders',
            'link' => '#',
            'active' => ''
        ]
    ];
}

