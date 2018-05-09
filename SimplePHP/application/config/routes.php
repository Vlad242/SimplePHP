<?php

return [
    //MainController
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],
    '(?<id>\d+)' => [
        'controller' => 'main',
        'action' => 'page',
    ],
    'post/create' => [
        'controller' => 'main',
        'action' => 'postCreate',
    ],
    //AdminController
    'admin/login' => [
        'controller' => 'admin',
        'action' => 'login',
    ],
    'admin/logout' => [
        'controller' => 'admin',
        'action' => 'logout',
    ],
    'admin/edit/(?<id>\d+)' => [
        'controller' => 'admin',
        'action' => 'edit',
    ],
    'admin/delete/(?<id>\d+)' => [
        'controller' => 'admin',
        'action' => 'delete',
    ],
    'admin/view' => [
        'controller' => 'admin',
        'action' => 'view',
    ],
];