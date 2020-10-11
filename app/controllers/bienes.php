<?php


class Bienes extends Controller
{

    private $usuario;

    public function __construct()
    {
        $this->usuario = $this->model('Usuario');
        $this->iniciarsesion();
    }

    public function index()
    {

        if (isset($_SESSION['email'])) {
            $this->usuario->setUser($this->traersesion());
            $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
        } else {

            $this->viewtemplate('usuario', 'index');
        }
    }


}


?>