<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller {

    public function loginAction() {
        $this->view->redirect('/public_html');
        $this->view->render('Login');
    }

    public function registerAction() {
        $this->view->layout = 'custom';
        $this->view->render('Register');
    }

}