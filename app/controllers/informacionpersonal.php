<?php


class Informacionpersonal extends Controller
{

    private $usuario;
    private $parametros;
    private $topes;
    private $tipodireccionseccional;
    private $tipoactividadeconomica;

    public function __construct()
    {
        $this->usuario = $this->model('Usuario');
        $this->tipodireccionseccional = $this->model('Tipodireccionseccional');
        $this->tipoactividadeconomica = $this->model('Tipoactividadeconomica');
        parent::__construct();
        /* $this->iniciarsesion(); */
        if (isset($_SESSION['email'])) {
            $this->usuario->setusuario($this->traersesion());
        }else{
            $fecha = getdate();
            $this->topes = $this->parametros->topes($fecha['year']-1);
        }
    }

    public function index()
    {

        if (isset($_SESSION['email'])) {
            if ((strtolower($this->usuario->getnomrol()) == "contador") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {

                $tipodireccionseccional = $this->tipodireccionseccional->listar();
                
                $tipoactividadeconomica = $this->tipoactividadeconomica->listar();

                $data = [$tipodireccionseccional, $tipoactividadeconomica];

                $this->viewtemplate('informacionpersonal', 'listar', $this->usuario->traerdatosusuario(), $data);
            } else{

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }
    }

    public function listar()
    {
        if (isset($_SESSION['email'])) {
            if ((strtolower($this->usuario->getnomrol()) == "contador") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {

                $tipodireccionseccional = $this->tipodireccionseccional->listar();
                
                $tipoactividadeconomica = $this->tipoactividadeconomica->listar();

                $data = [$tipodireccionseccional, $tipoactividadeconomica];

                $this->viewtemplate('informacionpersonal', 'listar', $this->usuario->traerdatosusuario(), $data);

            }else{
                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
            }
        }else{
            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }
    }

    public function crear($tipo){

        if (isset($_SESSION['email'])) {

            if ((strtolower($this->usuario->getnomrol()) == "contador") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {
                
                if (isset($_POST['param']) && $_POST['param'] == true) {

                    if (strtolower($tipo) == "direccionseccional") {

                        $nombre = $_POST['nombretipodireccionseccional'];
                        $descripcion = $_POST['descripciontipodireccionseccional'];
                        $ayuda = $_POST['ayudatipodireccionseccional'];
        
                        $this->tipodireccionseccional->crear($nombre, $descripcion, $ayuda);
        
                    } else if (strtolower($tipo) == "actividadeconomica") {
                        
                        $nombre = $_POST['nombretipoactividadeconomica'];
                        $descripcion = $_POST['descripciontipoactividadeconomica'];
                        $ayuda = $_POST['ayudatipoactividadeconomica'];

                        $this->tipoactividadeconomica->crear($nombre, $descripcion, $ayuda);
        
                    }

                } else {
                    
                    $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

                }
                
            } else {

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
            
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);

        }

    }

    public function editar($tipo, $id){

        if (isset($_SESSION['email'])) {

            if ((strtolower($this->usuario->getnomrol()) == "contador") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {
                
                if (isset($_POST['param']) && $_POST['param'] == true) {

                    if (strtolower($tipo) == "direccionseccional") {
        
                        $this->tipodireccionseccional->editar($id);
        
                    } else if (strtolower($tipo) == "actividadeconomica") {
                        
                        $this->tipoactividadeconomica->editar($id);
        
                    }

                } else {
                    
                    $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

                }
                
            } else {

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
            
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);

        }

    }

    public function editarinformacionpersonal($tipo, $id){

        if (isset($_SESSION['email'])) {

            if ((strtolower($this->usuario->getnomrol()) == "contador") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {
                
                if (isset($_POST['param']) && $_POST['param'] == true) {

                    if (strtolower($tipo) == "direccionseccional") {

                        $nombre = $_POST['nombretipodireccionseccional'];
                        $descripcion = $_POST['descripciontipodireccionseccional'];
                        $ayuda = $_POST['ayudatipodireccionseccional'];
        
                        $this->tipodireccionseccional->editardireccionseccional($nombre, $descripcion, $ayuda, $id);
        
                    } else if (strtolower($tipo) == "actividadeconomica") {

                        $nombre = $_POST['nombretipoactividadeconomica'];
                        $descripcion = $_POST['descripciontipoactividadeconomica'];
                        $ayuda = $_POST['ayudatipoactividadeconomica'];
                        
                        $this->tipoactividadeconomica->editaractiviadeconomica($nombre, $descripcion, $ayuda, $id);
        
                    }

                } else {
                    
                    $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

                }
                
            } else {

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
            
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);

        }

    }

    public function eliminar($tipo, $id){

        if (isset($_SESSION['email'])) {

            if ((strtolower($this->usuario->getnomrol()) == "contador") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {
                
                if (isset($_POST['param']) && $_POST['param'] == true) {

                    if (strtolower($tipo) == "direccionseccional") {

                        $this->tipodireccionseccional->eliminar($id);
        
                    } else if (strtolower($tipo) == "actividadeconomica") {

                        $this->tipoactividadeconomica->eliminar($id);
        
                    }

                } else {
                    
                    $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

                }
                
            } else {

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
            
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);

        }

    }

}


?>