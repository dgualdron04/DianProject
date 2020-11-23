<?php


class Declaracion extends Controller
{

    private $usuario;
    private $declaracion;
    private $parametros;
    private $topes;
    private $parametrosdeclaracion;
    private $patrimonio;
    private $cedulageneral;
    private $rentatrabajo;
    private $rentacapital;
    private $rentanolaboral;
    private $cedulapensiones;
    private $gananciasocasionales;
    private $liquidacionprivada;
    private $ceduladiviparti;
    private $tipoactividadeconomica;
    private $tipodireccionseccional;
    private $actividadeconomica;
    private $direccionseccional;
    private $tipobienes;
    private $tipodeudas;
    private $tipomoneda;
    private $modelo;
    private $bien;
    private $usuariobien;
    private $deuda;
    private $usuariodeuda;

    public function __construct()
    {
        $this->usuario = $this->model('Usuario');
        $this->declaracion = $this->model('Declaracion');
        $this->parametrosdeclaracion = $this->model('Parametrosdeclaracion');
        $this->patrimonio = $this->model('Patrimonio');
        $this->cedulageneral = $this->model('Cedulageneral');
        $this->rentatrabajo = $this->model('Rentatrabajo');
        $this->rentacapital = $this->model('Rentacapital');
        $this->rentanolaboral = $this->model('Rentanolaboral');
        $this->cedulapensiones = $this->model('Cedulapensiones');
        $this->gananciasocasionales = $this->model('Gananciasocasionales');
        $this->liquidacionprivada = $this->model('Liquidacionprivada');
        $this->ceduladiviparti = $this->model('Ceduladiviparti');
        $this->tipoactividadeconomica = $this->model('Tipoactividadeconomica');
        $this->tipodireccionseccional = $this->model('Tipodireccionseccional');
        $this->actividadeconomica = $this->model('Actividadeconomica');
        $this->direccionseccional = $this->model('Direccionseccional');
        $this->tipobienes = $this->model('Tipobienes');
        $this->tipodeudas = $this->model('Tipodeudas');
        $this->tipomoneda = $this->model('Tipomoneda');
        $this->modelo = $this->model('Modelo');
        $this->bien = $this->model('Bien');
        $this->usuariobien = $this->model('Usuariobien');
        $this->deuda = $this->model('Deuda');
        $this->usuariodeuda = $this->model('Usuariodeuda');
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

                $declaraciones = $this->declaracion->listar($this->usuario->getid(), $this->usuario->getnomrol());

                $this->viewtemplate('declaracion', 'listar', $this->usuario->traerdatosusuario(), $declaraciones);
            } else{

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }
    }

    public function listar($id = null){

        if (isset($_SESSION['email'])) {

            if ((strtolower($this->usuario->getnomrol()) == "declarante")) {
                if ($id == $this->usuario->getid()) {
                        
                    $declaraciones = $this->declaracion->listar($id, $this->usuario->getnomrol());

                    $this->viewtemplate('declaracion', 'listar', $this->usuario->traerdatosusuario(), $declaraciones);

                } else{

                    $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

                }
            }else if ((strtolower($this->usuario->getnomrol()) == "contador")) {
                
                $declaraciones = $this->declaracion->listar($id, $this->usuario->getnomrol());

                $this->viewtemplate('declaracion', 'listar', $this->usuario->traerdatosusuario(), $declaraciones);
                
            }else{
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
                $declaraciones = $this->declaracion->listar($this->usuario->getid(), $this->usuario->getnomrol());
                $cont = 0;

                foreach ($declaraciones as $annoperiodo) {
                    $fecha = getdate();
                    if ($annoperiodo['annoperiodo'] == ($fecha['year']-1)) {
                        $cont++;
                    }

                }

                if ($cont == 0) {

                    $iddeclaracion = $this->declaracion->crear($this->usuario->getid());

                    $this->parametrosdeclaracion->crear($iddeclaracion);

                    $this->patrimonio->crear($iddeclaracion);

                    $idcedulageneral = $this->cedulageneral->crear($iddeclaracion);

                    $this->rentatrabajo->crear($idcedulageneral);

                    $this->rentacapital->crear($idcedulageneral);

                    $this->rentanolaboral->crear($idcedulageneral);
                    
                    $this->cedulapensiones->crear($iddeclaracion);

                    $this->gananciasocasionales->crear($iddeclaracion);

                    $this->liquidacionprivada->crear($iddeclaracion);

                    $this->ceduladiviparti->crear($iddeclaracion);

                    echo '<script>window.location.replace("'.constant('URL').'declaracion/editar/'.$iddeclaracion.'");</script>';

                } else {

                    $declaraciones = $this->declaracion->listar($this->usuario->getid(), $this->usuario->getnomrol());

                    $this->viewtemplate('declaracion', 'listar', $this->usuario->traerdatosusuario(), $declaraciones);

                }

                /* $this->viewtemplate('declaracion', 'crear', $this->usuario->traerdatosusuario()); */
            } else{

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }

    }

    public function editar($id){

        if (isset($_SESSION['email'])) {
            $this->usuario->setusuario($this->traersesion());
            if ((strtolower($this->usuario->getnomrol()) == "declarante") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {

                $informacionpersonal = $this->usuario->listarinformacionpersonal($this->usuario->getid());
                $idpatrimonio = $this->patrimonio->traerid($id);
                $ids = [$idpatrimonio];
                $this->patrimonio->calcularpatrimoniototales($id);
                $patrimonio = $this->patrimonio->listar($id);
                /*$cedulas = $this->cedulas->listar();
                $liquidacionprivada = $this->liquidacionprivada->listar();
                $gananciasocasionales = $this->gananciasocasionales->listar(); */

                $data = [$ids, $informacionpersonal, $patrimonio];

                $this->viewtemplate('declaracion', 'editar', $this->usuario->traerdatosusuario(), $data);

            } else{

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }
    }

    public function eliminar($id){

    }

    public function revision($annoperiodo){
        if (isset($_SESSION['email'])) {

            if ((strtolower($this->usuario->getnomrol()) == "contador") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {

                $this->viewtemplate('declaracion', 'revision', $this->usuario->traerdatosusuario());

            } else{

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }
    }

    public function solicitarrevision($annoperiodo){

    }

    public function denegarrevision($iddeclaracion){

    }

    public function aceptarrevision($iddeclaracion){
        
    }

    public function porcent(){
        
    }

    public function traertipo($clase, $tipo){
        if (isset($_SESSION['email'])) {

            if ((strtolower($this->usuario->getnomrol()) == "declarante") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {

                if ($clase == "informacionpersonal") {

                    if ($tipo == "actividadeconomica") {

                        $actividad = $this->tipoactividadeconomica->listar();
                        print_r(json_encode($actividad));

                    } else if ($tipo == "direccionseccional") {
                        
                        $direccion = $this->tipodireccionseccional->listar();
                        print_r(json_encode($direccion));

                    }

                } else if($clase == "patrimonio"){

                    if ($tipo == "bienes" || $tipo == "bien") {
                        
                        $bienes = $this->tipobienes->listar();
                        print_r(json_encode($bienes));

                    } else if ($tipo == "deudas" || $tipo == "deuda") {

                        $deudas = $this->tipodeudas->listar();
                        print_r(json_encode($deudas));

                    } else if ($tipo == "moneda") {

                        $moneda = $this->tipomoneda->listar();
                        print_r(json_encode($moneda));

                    } else if ($tipo == "modelo") {

                        $modelo = $this->modelo->listar();
                        print_r(json_encode($modelo));

                    }

                }

            } else{

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }
    }

    public function creardeclaracion($clase, $tipo, $id){
        if (isset($_SESSION['email'])) {

            if ((strtolower($this->usuario->getnomrol()) == "declarante") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {

                if ($clase == "informacionpersonal") {

                    if ($tipo == "actividadeconomica") {

                        $this->actividadeconomica->crear($id, $this->usuario->getid());

                    } else if ($tipo == "direccionseccional") {
                        
                        $this->direccionseccional->crear($id, $this->usuario->getid());

                    }

                } else if ($clase == "patrimonio") {

                    if ($tipo == "bienes") {
                        
                        /* echo "<br>";
                        echo $_POST['tipomonedacrearpatrimonio'];
                        echo "<br>";
                        echo $_POST['tipomodelocrearpatrimonio'];
                        echo "<br>";
                        echo $_POST['valorpatrimoniocrear'];
                        echo "<br>";
                        echo $id;
                        echo "<br>"; */
                        $valor = $_POST['valorpatrimoniocrear'];
                        $idmoneda = $_POST['tipomonedacrearpatrimonio'];
                        $idmodelo = $_POST['tipomodelocrearpatrimonio'];
                        $idpatrimonio = $_POST['idpatri'];

                        $idbien = $this->bien->crear($valor, $id, $idmoneda, $idmodelo);
                        $this->usuariobien->crear($idbien, $idpatrimonio, $this->usuario->getid());

                    } else if ($tipo == "deudas") {

                        $valor = $_POST['valorpatrimoniocrear'];
                        $idmoneda = $_POST['tipomonedacrearpatrimonio'];
                        $idmodelo = $_POST['tipomodelocrearpatrimonio'];
                        $idpatrimonio = $_POST['idpatri'];

                        $iddeuda = $this->deuda->crear($valor, $id, $idmoneda, $idmodelo);
                        $this->usuariodeuda->crear($iddeuda, $idpatrimonio, $this->usuario->getid());

                    }

                }

            } else{

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }
    }

    public function editardecla($clase, $tipo, $id){

        /* echo "<br>";
        echo $clase;
        echo "<br>";
        echo $tipo;
        echo "<br>";
        echo $id;
        echo "<br>"; */

        if (isset($_SESSION['email'])) {

            if ((strtolower($this->usuario->getnomrol()) == "declarante") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {

                if ($clase == "informacionpersonal") {

                    if ($tipo == "actividadeconomica") {

                        $this->actividadeconomica->editar($id);

                    } else if ($tipo == "direccionseccional") {
                        
                        $this->direccionseccional->editar($id);

                    }

                } else if ($clase == "patrimonio") {
                    
                    if ($tipo == "bien" || $tipo == "bienes") {
                        
                        $this->bien->editar($id);

                    } else if ($tipo == "deuda" || $tipo == "deudas") {
                        
                        $this->deuda->editar($id);

                    }

                }

            } else{

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }

    }

    public function editardeclaracion($clase, $tipo, $id){

        if (isset($_SESSION['email'])) {

            if ((strtolower($this->usuario->getnomrol()) == "declarante") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {

                if ($clase == "informacionpersonal") {

                    $idtipo = $_POST['tipo1informacionpersonaleditar'];

                    if ($tipo == "actividadeconomica") {

                        $this->actividadeconomica->editaractividadeconomica($idtipo, $id);

                    } else if ($tipo == "direccionseccional") {
                        
                        $this->direccionseccional->editardireccionseccional($idtipo, $id);

                    }

                } else if ($clase == "patrimonio") {
                    
                    $tipopatrimonio = $_POST['tipo1patrimonioeditar'];
                    $valor = $_POST['valorpatrimonioeditar'];
                    $tipomoneda = $_POST['tipomonedaeditarpatrimonio'];
                    $modelo = $_POST['tipomodeloeditarpatrimonio'];

                    if ($tipo == "bien" || $tipo == "bienes") {
                        
                        $this->bien->editarbien($tipopatrimonio, $valor, $tipomoneda, $modelo, $id);

                    } else if ($tipo == "deuda" || $tipo == "deudas") {
                        
                        $this->deuda->editardeuda($tipopatrimonio, $valor, $tipomoneda, $modelo, $id);

                    }

                }

            } else{

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }

    }

    public function eliminardeclaracion($clase, $tipo, $id){

        if (isset($_SESSION['email'])) {

            if ((strtolower($this->usuario->getnomrol()) == "declarante") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {

                if ($clase == "informacionpersonal") {

                    if ($tipo == "actividadeconomica") {

                        $this->actividadeconomica->eliminar($id);

                    } else if ($tipo == "direccionseccional") {
                        
                        $this->direccionseccional->eliminar($id);

                    }

                } if ($clase = "patrimonio") {

                    if ($tipo == "bien" || $tipo == "bienes") {
                        
                        $this->usuariobien->eliminar($id);
                        $this->bien->eliminar($id);

                    } else if ($tipo == "deuda" || $tipo == "deudas") {
                        
                        $this->usuariodeuda->eliminar($id);
                        $this->deuda->eliminar($id);

                    }

                }

            } else{

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }

    }

}


?>