<?php

namespace App\Exceptions;

class ControllerNotFoundException extends \Exception
{

    public function __construct($controller) {
        $this->message = "Controller {$controller} was not found. ";
    }
    
}