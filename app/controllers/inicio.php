<?php

class Inicio extends Controller
{
    public function index()
    {
        $this->viewtemplate('home/index', ['controller' => "inicio", 'method' => "index", 'name' => "Admin"]);
    }
}

?>