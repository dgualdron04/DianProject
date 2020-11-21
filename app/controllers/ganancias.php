<?php


class Ganancias extends Controller
{

    private $usuario;
    private $parametros;
    private $topes;
    private $tipoingresosganancias;
    private $tipogananciasnogravadas;

    public function __construct()
    {
        $this->usuario = $this->model('Usuario');
        $this->tipoingresosganancias = $this->model('Tipoingresosganancias');
        $this->tipogananciasnogravadas = $this->model('Tipogananciasnogravadas');
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

                $tipogananciasnogravadas = $this->tipogananciasnogravadas->listar();
                
                $tipoingresosganancias = $this->tipoingresosganancias->listar();

                $data = [$tipogananciasnogravadas, $tipoingresosganancias];

                $this->viewtemplate('ganancias', 'listar', $this->usuario->traerdatosusuario(), $data);
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

                $tipogananciasnogravadas = $this->tipogananciasnogravadas->listar();
                
                $tipoingresosganancias = $this->tipoingresosganancias->listar();

                $data = [$tipogananciasnogravadas, $tipoingresosganancias];

                $this->viewtemplate('ganancias', 'listar', $this->usuario->traerdatosusuario(), $data);

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

                    if (strtolower($tipo) == "ingresos") {

                        $nombre = $_POST['nombretipoingresos'];
                        $descripcion = $_POST['descripciontipoingresos'];
                        $ayuda = $_POST['ayudatipoingresos'];
        
                        $this->tipoingresosganancias->crear($nombre, $descripcion, $ayuda);
        
                    } else if (strtolower($tipo) == "nogravadas") {
                        
                        $nombre = $_POST['nombregananciasnogravadas'];
                        $descripcion = $_POST['descripciongananciasnogravadas'];
                        $ayuda = $_POST['ayudagananciasnogravadas'];

                        $this->tipogananciasnogravadas->crear($nombre, $descripcion, $ayuda);
        
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

                    if (strtolower($tipo) == "ingresos") {
        
                        $this->tipoingresosganancias->editar($id);
        
                    } else if (strtolower($tipo) == "nogravadas") {
                        
                        $this->tipogananciasnogravadas->editar($id);
        
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

    public function editarganancias($tipo, $id){

        if (isset($_SESSION['email'])) {

            if ((strtolower($this->usuario->getnomrol()) == "contador") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {
                
                if (isset($_POST['param']) && $_POST['param'] == true) {

                    if (strtolower($tipo) == "ingresos") {

                        $nombre = $_POST['nombreingresoseditar'];
                        $descripcion = $_POST['descripcioningresoseditar'];
                        $ayuda = $_POST['ayudaingresoseditar'];
        
                        $this->tipoingresosganancias->editaringresosganancias($nombre, $descripcion, $ayuda, $id);
        
                    } else if (strtolower($tipo) == "nogravadas") {

                        $nombre = $_POST['nombregananciasnogravadaseditar'];
                        $descripcion = $_POST['descripciongananciasnogravadaseditar'];
                        $ayuda = $_POST['ayudagananciasnogravadaseditar'];
                        
                        $this->tipogananciasnogravadas->editargananciasnogravadas($nombre, $descripcion, $ayuda, $id);
        
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

                    if (strtolower($tipo) == "ingresos") {

                        $this->tipoingresosganancias->eliminar($id);
        
                    } else if (strtolower($tipo) == "nogravadas") {

                        $this->tipogananciasnogravadas->eliminar($id);
        
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