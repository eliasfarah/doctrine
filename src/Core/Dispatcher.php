<?php

namespace App\Core;

class Dispatcher
{

    private $controller;
    private $method;
    private $args = [];

    public function dispatch()
    {
        
        $url = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

        // get controller name
        $this->controller = !empty($url[0]) ? ucfirst($url[0]) . 'Controller' : 'NotFoundController';
        // get method name of controller
        $this->method = !empty($url[1]) ? $url[1] : 'index';
        // get argument passed in to the method
        if(count($url) > 2) {
           $this->args = array_slice($url, 2);
        }            
    }
   
    public function getController() {
        return $this->controller;
    }

    public function getMethod() {
        return $this->method;
    }

    public function getArgs() {
        return $this->args;
    }
}