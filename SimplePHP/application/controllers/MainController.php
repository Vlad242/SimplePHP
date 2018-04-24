<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $result = $this->model->getPosts();
        $vars = [
            'posts' => $result,
        ];
        $this->view->render('General', $vars);
    }
}