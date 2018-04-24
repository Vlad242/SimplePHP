<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Database;

class MainController extends Controller
{
    public function indexAction()
    {
        $db = new DataBase;
        $result = $db->findAllBy('SELECT * from Post');
        debug($result);

        $result = $this->model->getPosts();
        echo $result;
        $this->view->render('General');
    }
}