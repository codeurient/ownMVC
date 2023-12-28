<?php

namespace application\controllers;

use application\core\Controller;
//use application\lib\Db;

class MainController extends Controller {

    public function indexAction() {
        //  $db = new Db;
        //  // $form = '2; DELETE FROM users'; // SQL injection
        //  $params = [ 'id' => 2,];
        //  $data = $db->column('SELECT name FROM users WHERE id = :id', $params);
        //  debug($data);

        $result = $this->model->getNews();
        $vars = [
            'news' => $result,
        ];
        $this->view->render('Main page', $vars);
    }
}