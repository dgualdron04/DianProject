<?php


class Rentatrabajo extends Controller
{

    private $usuario;
    private $parametros;
    private $topes;

    public function __construct()
    {
        $this->usuario = $this->model('Usuario');
        parent::__construct();
        /* $this->iniciarsesion(); */
        if (isset($_SESSION['email'])) {
            $this->usuario->setusuario($this->traersesion());
        }else{
            $this->parametros = $this->model('Parametros');
            $fecha = getdate();
            $this->topes = $this->parametros->topes($fecha['year']-1);
        }
    }

    public function index()
    {

        if (isset($_SESSION['email'])) {
            if ((strtolower($this->usuario->getnomrol()) == "contador") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {
                $this->viewtemplate('rentatrabajo', 'listar', $this->usuario->traerdatosusuario());
            } else{

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }
    }


}


?>