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
    'sort/(?<field>\w+)/(?<type>\w+)' => [
        'controller' => 'main',
        'action' => 'setSort',
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
    'admin/editList' => [
        'controller' => 'admin',
        'action' => 'editList',
    ],
    'admin/edit/(?<id>\d+)' => [
        'controller' => 'admin',
        'action' => 'edit',
    ],
    'admin/deleteList' => [
        'controller' => 'admin',
        'action' => 'deleteList',
    ],
    'admin/delete/(?<id>\d+)' => [
        'controller' => 'admin',
        'action' => 'delete',
    ],
    'admin/viewList' => [
        'controller' => 'admin',
        'action' => 'viewList',
    ],
    'admin/view/(?<id>\d+)' => [
        'controller' => 'admin',
        'action' => 'view',
    ],
    'admin/statusList' => [
        'controller' => 'admin',
        'action' => 'statusList',
    ],
    'admin/statusChange/(?<id>\d+)' => [
        'controller' => 'admin',
        'action' => 'statusChange',
    ],
];