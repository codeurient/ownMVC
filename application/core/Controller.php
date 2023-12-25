<?php

namespace application\core;

use application\core\View;

abstract class Controller {
    public $route;
    public $view;

    public function __construct($route){
        $this->route = $route;
        //debug($this->route);

        $this->view = new View($route);
    }
}