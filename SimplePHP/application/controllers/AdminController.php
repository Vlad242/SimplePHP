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
        if (isset($_SESSION['admin'])){
            $this->view->redirect('/admin/view');
        }
        if (!empty($_POST))
        {
            if (!$this->model->loginValidate($_POST))
            {
                $this->view->message('error', $this->model->error);
            }
            $_SESSION['admin'] = 1;
            $this->view->locationRedirect('/admin/view');

        }
        $this->view->render('Login');
    }

    public function logoutAction()
    {
        unset($_SESSION['admin']);
        $this->view->redirect('/admin/login');
    }

    public function editAction()
    {
        if (!empty($_POST))
        {
            if (!$this->model->postValidate($_POST))
            {
                $this->view->message('error', $this->model->error);
            }else{
                $this->view->message('success', 'ok');
            }
        }
        $this->view->render('New post');
    }

    public function deleteAction()
    {
        $this->view->render('Login');
    }

    public function viewAction()
    {
        $this->view->render('View posts for admin');
    }
}