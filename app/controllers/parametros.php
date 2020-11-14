<?php


class Parametros extends Controller
{

    private $usuario;
    private $parametros;
    private $topes;
    private $calendario;
    private $periododeclarante;

    public function __construct()
    {
        $this->usuario = $this->model('Usuario');
        $this->parametros = $this->model('Parametros');
        $this->calendario = $this->model('Calendario');
        $this->periododeclarante = $this->model('Periododeclarante');
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
                $this->viewtemplate('parametros', 'listar', $this->usuario->traerdatosusuario());
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

            if (strtolower($this->usuario->getnomrol()) == "coordinador" || strtolower($this->usuario->getnomrol()) == "contador") {

                $parametros = $this->parametros->listar();

                $calendario = $this->calendario->listar();
                
                $data = [$parametros, $calendario];
                
                $this->viewtemplate('parametros', 'listar', $this->usuario->traerdatosusuario(), $data);

            } else {

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }

    }

    public function crear()
    {
        if (isset($_SESSION['email'])) {

            if (strtolower($this->usuario->getnomrol()) == "coordinador" || strtolower($this->usuario->getnomrol()) == "contador") {

                if (isset($_POST['param']) && $_POST['param'] == true) {

                    $fecha = getdate();
                    $annoperiodo = $fecha['year']-1;
                    $valortributario = $_POST['valortributario'];
                    $tope1 = $_POST['tope1'];
                    $tope2 = $_POST['tope2'];
                    $marcolegal = $_POST['marcolegalp'];
                    $marcocalendario = $_POST['marcocalendariop'];
                    $this->parametros->crear($annoperiodo, $valortributario, $tope1, $tope2, $marcolegal, $marcocalendario);

                }
                
                

            } else {

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }
    }

    public function editar($id){
        if (isset($_SESSION['email'])) {

            if (strtolower($this->usuario->getnomrol()) == "contador" || strtolower($this->usuario->getnomrol()) == "coordinador") {

                if (isset($_POST['param']) && $_POST['param'] == true) {

                        $this->parametros->editar($id);

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

    public function editarparametros($id){

        if (isset($_SESSION['email'])) {

            if (strtolower($this->usuario->getnomrol()) == "coordinador" || strtolower($this->usuario->getnomrol()) == "contador") {
                if (isset($_POST['param']) && $_POST['param'] == true) {

                    $valortributario = $_POST['valoreditar'];
                    $tope1 = $_POST['tope1editar'];
                    $tope2 = $_POST['tope2editar'];
                    $marcolegal = $_POST['marcolegaleditar'];
                    $marcocalendario = $_POST['marcocalendarioeditar'];

                    $this->parametros->editarparametros($valortributario, $tope1, $tope2, $marcolegal, $marcocalendario, $id);
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

    public function eliminar($id){
        if (isset($_SESSION['email'])) {

            if (strtolower($this->usuario->getnomrol()) == "contador" || strtolower($this->usuario->getnomrol()) == "coordinador") {

                if (isset($_POST['param']) && $_POST['param'] == true) {
                    $this->parametros->eliminar($id);
                } else {
                    $this->viewtemplate('parametros', 'index', $this->usuario->traerdatosusuario());
                }
            } else {
                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
            }
        } else {
            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }
    }

    public function crearcalendario($idparametro){

        
        if (isset($_SESSION['email'])) {

            if (strtolower($this->usuario->getnomrol()) == "contador" || strtolower($this->usuario->getnomrol()) == "coordinador") {

                if (isset($_POST['param']) && $_POST['param'] == true) {
                    $fecha = getdate();
                    if (empty($_POST['dia1crear'])) {
                        echo "ta vacio la fecha de inicio";
                    }else if (empty($_POST['dia2crear'])) {
                        echo "ta vacio la fecha final";
                    }else if($_POST['dia1crear'] < $fecha['year']."-01-01" || $_POST['dia1crear'] > $fecha['year']."-12-31"){
                        echo "No esta en el rango de fechas correcto";
                    }else if ($_POST['dia2crear'] < $fecha['year']."-01-01" || $_POST['dia2crear'] > $fecha['year']."-12-31") {
                        echo "No esta en el rango de fechas correcto";
                    }else{
                        $dia1 = $_POST['dia1crear'];
                        $dia2 = $_POST['dia2crear'];
                        $this->calendario->crear($dia1, $dia2, $idparametro);
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

    public function editarcal($id){
        if (isset($_SESSION['email'])) {

            if (strtolower($this->usuario->getnomrol()) == "contador" || strtolower($this->usuario->getnomrol()) == "coordinador") {

                if (isset($_POST['param']) && $_POST['param'] == true) {

                        $this->calendario->editar($id);

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

    public function editarcalendario($idcalendario){

        if (isset($_SESSION['email'])) {

            if (strtolower($this->usuario->getnomrol()) == "contador" || strtolower($this->usuario->getnomrol()) == "coordinador") {

                if (isset($_POST['param']) && $_POST['param'] == true) {
                    $fecha = getdate();
                    if (empty($_POST['dia1editar'])) {
                        echo "ta vacio la fecha de inicio";
                    }else if (empty($_POST['dia2editar'])) {
                        echo "ta vacio la fecha final";
                    }else if($_POST['dia1editar'] < $fecha['year']."-01-01" || $_POST['dia1editar'] > $fecha['year']."-12-31"){
                        echo "No esta en el rango de fechas correcto";
                    }else if ($_POST['dia2editar'] < $fecha['year']."-01-01" || $_POST['dia2editar'] > $fecha['year']."-12-31") {
                        echo "No esta en el rango de fechas correcto";
                    }else{
                        $dia1 = $_POST['dia1editar'];
                        $dia2 = $_POST['dia2editar'];
                        $this->calendario->editarcalendario($dia1, $dia2, $idcalendario);
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

    public function eliminarcalendario($idcalendario){
        if (isset($_SESSION['email'])) {

            if (strtolower($this->usuario->getnomrol()) == "contador" || strtolower($this->usuario->getnomrol()) == "coordinador") {

                if (isset($_POST['param']) && $_POST['param'] == true) {
                    
                    $this->calendario->eliminar($idcalendario);

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

    public function listarperiodo($idcalendario){

        if (isset($_SESSION['email'])) {

            if (strtolower($this->usuario->getnomrol()) == "coordinador" || strtolower($this->usuario->getnomrol()) == "contador") {

                if (isset($_POST['param']) && $_POST['param'] == true) {

                    $this->periododeclarante->listar($idcalendario);

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

    public function crearperiodo($idcalendario){
        if (isset($_SESSION['email'])) {

            if (strtolower($this->usuario->getnomrol()) == "contador" || strtolower($this->usuario->getnomrol()) == "coordinador") {

                if (isset($_POST['param']) && $_POST['param'] == true) {
                    
                  
                    $fecha = getdate();
                    if (empty($_POST['fechacrear'])) {

                        echo "ta vacio la fecha ";

                    }else if($_POST['fechacrear'] < $fecha['year']."-01-01" || $_POST['fechacrear'] > $fecha['year']."-12-31"){

                        echo "No esta en el rango de fechas correcto";

                    }else{
                        $digito1 = $_POST['primerdigitocrear'];
                        $digito2 = $_POST['segundodigitocrear'];
                        $fecha = $_POST['fechacrear'];
                         if ($this->periododeclarante->crear($digito1, $digito2, $fecha, $idcalendario)) {
                            
                             echo "si ta melo";

                        }else{

                            echo "ta fatal";
                            
                        } 
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
    
    public function editarper($id){
        if (isset($_SESSION['email'])) {

            if (strtolower($this->usuario->getnomrol()) == "contador" || strtolower($this->usuario->getnomrol()) == "coordinador") {

                if (isset($_POST['param']) && $_POST['param'] == true) {

                        $this->periododeclarante->editar($id);

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

    public function editarperiodo($id){
        if (isset($_SESSION['email'])) {

            if (strtolower($this->usuario->getnomrol()) == "contador" || strtolower($this->usuario->getnomrol()) == "coordinador") {

                if (isset($_POST['param']) && $_POST['param'] == true) {
                    
                    $fecha = getdate();
                    if (empty($_POST['fechaeditar'])) {

                        echo "ta vacio la fecha ";

                    }else if($_POST['fechaeditar'] < $fecha['year']."-01-01" || $_POST['fechaeditar'] > $fecha['year']."-12-31"){

                        echo "No esta en el rango de fechas correcto";

                    }else{
                        $digito1 = $_POST['primerdigitoeditar'];
                        $digito2 = $_POST['segundodigitoeditar'];
                        $fecha = $_POST['fechaeditar'];
                         if ($this->periododeclarante->editarperiodo($digito1, $digito2, $fecha, $id)) {
                            
                             echo "si ta melo";

                        }else{

                            echo "ta fatal";
                            
                        } 
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

    public function eliminarperiodo($idperiodo){
        if (isset($_SESSION['email'])) {

            if (strtolower($this->usuario->getnomrol()) == "contador" || strtolower($this->usuario->getnomrol()) == "coordinador") {

                if (isset($_POST['param']) && $_POST['param'] == true) {
                    
                    $this->periododeclarante->eliminar($idperiodo);

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