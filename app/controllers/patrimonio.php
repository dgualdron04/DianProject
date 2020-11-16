<?php


class Patrimonio extends Controller
{

    private $usuario;
    private $parametros;
    private $topes;
    private $tipobienes;
    private $tipodeudas;

    public function __construct()
    {
        $this->usuario = $this->model('Usuario');
        $this->tipobienes = $this->model('Tipobienes');
        $this->tipodeudas = $this->model('Tipodeudas');
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
                $this->viewtemplate('patrimonio', 'listar', $this->usuario->traerdatosusuario());
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

                $tipobienes = $this->tipobienes->listar();
                
                $tipodeudas = $this->tipodeudas->listar();

                $data = [$tipobienes, $tipodeudas];

                $this->viewtemplate('patrimonio', 'listar', $this->usuario->traerdatosusuario(), $data);

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

                    if (strtolower($tipo) == "tipobien") {

                        $nombre = $_POST['nombretipobien'];
                        $descripcion = $_POST['descripciontipobien'];
                        $ayuda = $_POST['ayudatipobien'];
        
                        $this->tipobienes->crear($nombre, $descripcion, $ayuda);
        
                    } else if (strtolower($tipo) == "tipodeuda") {
                        
                        $nombre = $_POST['nombretipodeudas'];
                        $descripcion = $_POST['descripciontipodeudas'];
                        $ayuda = $_POST['ayudatipodeudas'];

                        $this->tipodeudas->crear($nombre, $descripcion, $ayuda);
        
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

                    if (strtolower($tipo) == "tipobien") {
        
                        $this->tipobienes->editar($id);
        
                    } else if (strtolower($tipo) == "tipodeuda") {
                        
                        $this->tipodeudas->editar($id);
        
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

    public function editarpatrimonio($tipo, $id){

        if (isset($_SESSION['email'])) {

            if ((strtolower($this->usuario->getnomrol()) == "contador") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {
                
                if (isset($_POST['param']) && $_POST['param'] == true) {

                    if (strtolower($tipo) == "tipobien") {

                        $nombre = $_POST['nombretipobieneditar'];
                        $descripcion = $_POST['descripciontipobieneditar'];
                        $ayuda = $_POST['ayudatipobieneditar'];
        
                        $this->tipobienes->editarbienes($nombre, $descripcion, $ayuda, $id);
        
                    } else if (strtolower($tipo) == "tipodeuda") {

                        $nombre = $_POST['nombretipodeudaeditar'];
                        $descripcion = $_POST['descripciontipodeudaeditar'];
                        $ayuda = $_POST['ayudatipodeudaeditar'];
                        
                        $this->tipodeudas->editardeudas($nombre, $descripcion, $ayuda, $id);
        
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

                    if (strtolower($tipo) == "tipobien") {

                        $this->tipobienes->eliminar($id);
        
                    } else if (strtolower($tipo) == "tipodeuda") {

                        $this->tipodeudas->eliminar($id);
        
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