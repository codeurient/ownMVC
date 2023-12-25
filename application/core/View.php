<?php

namespace application\core;

class View {

    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route){
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
        // debug($this->path);
    }

    public function render($title, $vars = []) {
        // extract() рассматривает ключи массива в качестве имён переменных, а их значения - в качестве значений этих переменных
        // extract($vars);
        $path = 'application/views/'.$this->path.'.php';
        if(file_exists($path)){
            // bufer cixiwini iwe saliriq
            ob_start();
            // ob_start dedikden sonra yazilan kodlar avtomatik olaraq bufere gonderilir
            require $path;
            // Bufere gonderilen melumatlari ob_get_clean() metodu ile buferden cagiraraq $content deyiskenine otururuk.
            $content = ob_get_clean();

            require 'application/views/layouts/'.$this->layout.'.php';
        } else{
            echo 'View can not find: '.$this->path;
        }
    }

    public function redirect($url) {
        header('location: '.$url);
        exit();
    }


    public static function errorCode($code) {
        // http_response_code() для установки HTTP-кода ответа сервера: 200, 404 e.g
        http_response_code($code);
        $path = 'application/views/errors/'.$code.'.php';
        if(file_exists($path)){
            require $path;
        }
        exit;
    }
}