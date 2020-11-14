<?php


class Declaracion extends Controller
{

    private $usuario;
    private $declaracion;
    private $parametros;
    private $topes;

    public function __construct()
    {
        $this->usuario = $this->model('Usuario');
        $this->declaracion = $this->model('Declaracion');
        parent::__construct();
        /* $this->iniciarsesion(); */
        if (isset($_SESSION['email'])) {
            $this->usuario->setusuario($this->traersesion());
        }else{
            $fecha = getdate();
            $this->parametros = $this->model('Parametros');
            $this->topes = $this->parametros->topes($fecha['year']-1);
        }
    }

    public function index()
    {

        if (isset($_SESSION['email'])) {

            if ((strtolower($this->usuario->getnomrol()) == "declarante") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {
                $this->viewtemplate('declaracion', 'listar', $this->usuario->traerdatosusuario());
            } else{

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }
    }

    public function listar($id = null){

        if (isset($_SESSION['email'])) {

                    if ($id == $this->usuario->getid()) {
                        
                        $declaraciones = $this->declaracion->listar($id, $this->usuario->getnomrol());

                        /* print_r($declaraciones);
                        echo "<br>";
                        echo $declaraciones[0]['iddeclaracion']; */

                        $this->viewtemplate('declaracion', 'listar', $this->usuario->traerdatosusuario(), $declaraciones);

                    } else{

                        $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

                    }

        } else {
            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }
    }


    public function crear(){

        if (isset($_SESSION['email'])) {
            $this->usuario->setusuario($this->traersesion());
            if ((strtolower($this->usuario->getnomrol()) == "declarante") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {
                $this->viewtemplate('declaracion', 'crear', $this->usuario->traerdatosusuario());
            } else{

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }

    }

    public function editar($id){

    }

    public function eliminar($id){

    }

    public function listarrevision($annoperiodo){

    }

    public function solicitarrevision($annoperiodo){

    }

    public function denegarrevision($iddeclaracion){

    }

    public function aceptarrevision($iddeclaracion){
        
    }

    public function porcent(){
        
    }


}


?>