<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller {

    public function loginAction() {
        if(!empty($_POST)) {
            $this->view->message('success', 'Text of error');
//            $this->view->location('/');
        }

        $this->view->render('Login');
    }

    public function registerAction() {
        $this->view->layout = 'custom';
        $this->view->render('Register');
    }

}