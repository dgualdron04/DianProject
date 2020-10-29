<?php


class Parametros extends Controller
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

            if (strtolower($this->usuario->getnomrol()) == "contador") {
                $this->viewtemplate('parametros', 'listar', $this->usuario->traerdatosusuario());
            } else{

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }

            
        } else {

            $this->viewtemplate('usuario', 'index');
        }
    }

    public function listar()
    {

        if (isset($_SESSION['email'])) {
            $this->usuario->setUser($this->traersesion());

            if (strtolower($this->usuario->getnomrol()) == "coordinador" || strtolower($this->usuario->getnomrol()) == "contador") {

                $this->viewtemplate('parametros', 'listar', $this->usuario->traerdatosusuario());

            } else {

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index');
        }

    }


}


?>