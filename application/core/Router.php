<?php

namespace application\core;

class Router {

    protected $routes = [];
    protected $params = [];

    public function __construct() {
        $arr = require 'application/config/routes.php';
        foreach ($arr as $key => $value) {
            $this->add($key, $value);
        }
    }

    public function add($route, $params) {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    public function match() {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params){
            // preg_match() metodu $route-un icinde $url varmi deye muqayise edir ve eger varsa, hemin deyeri $matches deyiskenine verir.
             if(preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
             }
        }
        return false;
    }


    public function run() {
        if($this->match()){
            $path = 'application\controllers\\' . ucfirst($this->params['controller']).'Controller';
            if(class_exists($path)){
                $action = $this->params['action'].'Action';
                if(method_exists($path, $action)){
                    $controller = new $path($this->params);
                    // Взываются методы тут.
                    $controller->$action();
                } else {
                    echo "There is no method: " . $action;
                }
            } else {
                echo "There is no class: " . $path;
            }
        }
        else{
            echo "There is no Router";
        }
    }

}