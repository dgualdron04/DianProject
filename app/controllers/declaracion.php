<?php


class Declaracion extends Controller
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
            if (strtolower($this->usuario->getnomrol()) == "declarante") {
                $this->viewtemplate('declaracion', 'listar', $this->usuario->traerdatosusuario());
            } else{

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index');
        }
    }


    public function crear(){

        if (isset($_SESSION['email'])) {
            $this->usuario->setUser($this->traersesion());
            if (strtolower($this->usuario->getnomrol()) == "declarante") {
                $this->viewtemplate('declaracion', 'crear', $this->usuario->traerdatosusuario());
            } else{

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index');
        }

    }


}


?>