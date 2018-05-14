<?php

namespace application\controllers;

use application\core\Controller;

class AdminController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'admin';
    }

    public function loginAction()
    {
        $this->view->layout = 'default';
        if (isset($_SESSION['admin']))
        {
            $this->view->redirect('/admin/viewList');
        }
        if (!empty($_POST))
        {
            if (!$this->model->loginValidate($_POST))
            {
                $this->view->message('error', $this->model->error);
            }
            $_SESSION['admin'] = 1;
            $this->view->locationRedirect('/admin/viewList');
        }

        $this->view->render('Login');
    }

    public function logoutAction()
    {
        unset($_SESSION['admin']);
        $this->view->redirect('/admin/login');
    }

    public function editListAction()
    {
        $vars = [
            'posts' => $this->model->getPosts(),
        ];
        $this->view->render('Posts', $vars);
    }

    public function editAction($param)
    {
        if (!$this->model->postExist($param['id']))
        {
            $this->view->errorCode(404);
        }
        if (!empty($_POST))
        {
            if (!$this->model->postValidate($_POST))
            {
                $this->view->message('error', $this->model->error);
            }
            $this->model->editPost($_POST, $param['id']);
            $this->view->message('success', 'Post updated!');
        }
        $vars = [
            'data' => $this->model->postData($param['id'])[0],
        ];
        $this->view->render('Edit post #'.$param['id'], $vars);
    }

    public function deleteListAction()
    {
        $vars = [
            'posts' => $this->model->getPosts(),
        ];
        $this->view->render('Posts', $vars);
    }

    public function deleteAction($param)
    {
        if (!$this->model->postExist($param['id']))
        {
            $this->view->errorCode(404);
        }
        $this->model->deletePost($param['id']);
        $this->view->redirect('/admin/deleteList');
    }

    public function viewAction($param)
    {
        if (!$this->model->postExist($param['id']))
        {
            $this->view->errorCode(404);
        }
        $vars = [
            'post' => $this->model->viewPost($param['id'])[0],
        ];
        $this->view->render('Post #'.$param['id'], $vars);
    }

    public function viewListAction()
    {
        $vars = [
            'posts' => $this->model->getPosts(),
        ];
        $this->view->render('Posts', $vars);
    }

    public function statusListAction()
    {
        $vars = [
            'posts' => $this->model->getPosts(),
        ];
        $this->view->render('Posts', $vars);
    }

    public function statusChangeAction($param)
    {
        if (!$this->model->postExist($param['id']))
        {
            $this->view->errorCode(404);
        }
        $this->model->changeStatus($param['id']);
        $this->view->redirect('/admin/statusList');
    }
}