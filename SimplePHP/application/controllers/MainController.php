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
        $this->view->render('Posts', $vars);
    }

    public function pageAction($param)
    {
        $vars = [
            'posts' => $this->model->getPosts($param),
            'links' => $this->model->createLinks(),
        ];
        $this->view->render('Page '.$param, $vars);
    }

    public function postCreateAction ()
    {
        if (!empty($_POST))
        {
            if (!$this->model->postValidate($_POST, 'create'))
            {
                $this->view->message('error', $this->model->error);
            }
            $id = $this->model->postCreate($_POST);
            $this->model->postUploadImage($_FILES['image']['tmp_name'] ,$id);
            $this->view->message('success', 'Post created successfuly!Unique identifier '.$id);

        }
        $this->view->render('New post');
    }
}