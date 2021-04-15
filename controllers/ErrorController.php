<?php

class errorController{

    public function error404(){
        //invocamos la vista
        require_once 'views/404/404.php';
    }
}