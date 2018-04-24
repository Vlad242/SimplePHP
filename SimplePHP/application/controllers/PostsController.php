<?php

namespace application\controllers;

use application\core\Controller;

class PostsController extends Controller
{
    public function showAction()
    {
        $this->view->render('Posts');
    }
}