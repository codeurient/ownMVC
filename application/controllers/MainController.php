<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    public function indexAction() {
//        echo 'Home page';
        $this->view->render('Main page');
    }
}