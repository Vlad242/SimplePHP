<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $vars = [
            'name' => 'Vlad',
            'surname' => 'Kravchenko',
            'posts' => [ 1, 2, 3, 4, 5,
            ],
        ];
        $this->view->render('General', $vars);
    }
}