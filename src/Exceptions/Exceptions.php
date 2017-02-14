<?php

function exceptions($e) {
    if($e instanceof App\Exceptions\ControllerNotFoundException) {
        echo "Route not found";
    }

    if($e instanceof \Error) {
        echo "<pre>";
        var_dump($e);
    }

        echo "<pre>";
        var_dump($e);
}