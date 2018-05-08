<?php

return [
    //MainController
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],
    '{page:\d+}' => [
        'controller' => 'main',
        'action' => 'page',
    ],
    'post/show/' => [
        'controller' => 'main',
        'action' => 'postShow',
    ],
    'post/create/' => [
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
    'admin/edit' => [
        'controller' => 'admin',
        'action' => 'edit',
    ],
    'admin/delete' => [
        'controller' => 'admin',
        'action' => 'delete',
    ],
];