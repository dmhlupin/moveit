<?php
// функция получения массива меню
function getMenu() 
{
    return [
        [
            'name' => 'Home',
            'link' => '#',
            'active' => ''
        ],
        [
            'name' => 'Files',
            'link' => '/?page=files',
            'active' => 'active'
        ],
        [
            'name' => 'Orders',
            'link' => '#',
            'active' => ''
        ]
    ];
}
