<?php

namespace application\controllers;

use application\core\Controller;

class AdminController extends Controller
{
    public function loginAction()
    {
        $this->view->render('Login');
    }

    public function logoutAction()
    {
        $this->view->render('Logout');
    }

    public function editAction()
    {

    }

    public function deleteAction()
    {

    }
}