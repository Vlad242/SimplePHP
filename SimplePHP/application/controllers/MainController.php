<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {

        $vars = [
            'posts' => $this->model->getPosts(),
            'links' => $this->model->createLinks(),
        ];
        $this->view->render('General', $vars);
    }

    public function pageAction()
    {
        debug($this->route['page']);
    }

    public function postShowAction()
    {
        debug($this->route['id']);
        $this->view->render('Posts');
    }

    public function postCreateAction ()
    {
        $this->view->render('New post');
    }
}