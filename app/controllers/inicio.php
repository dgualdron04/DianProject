<?php

class Inicio extends Controller
{

    public function __construct()
    {
        $this->iniciarsesion();
    }

    public function hola(){
        if (isset($_SESSION['email'])) {
            $this->viewtemplate('inicio', 'index', ['name' => "Admin"]);
        }else{
            header("location: ".constant('URL'));
        }
        
    }
}

?>