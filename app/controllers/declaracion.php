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
    private $ingresobruto;
    private $usuarioingresobruto;
    private $ingresonoconse;
    private $usuarioingresonoconse;
    private $rentaexenta;
    private $usuariorentaexenta;
    private $rentacapital;
    private $ingresobrutocapital;
    private $usuarioingresobrutocapital;
    private $ingresonoconsecapital;
    private $usuarioingresonoconsecapital;

    private $rentanolaboral;
    private $ingresobrutolaboral;
    private $usuarioingresobrutolaboral;
    private $ingresosnoconselaboral;
    private $usuarioingresonoconselaboral;
    private $costogastosprocelaboral;
    private $usuariocostogastosprocelaboral;

    private $cedulapensiones;
    private $ingresosbrutospensiones;
    private $usuarioingresobrutopensiones;
    private $ingresonoconsepensiones;
    private $usuarioingresonoconsepensiones;

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
    private $anticiporenta;
    private $usuarioanticiporenta;
    private $sanciones;
    private $usuariosanciones;
    private $saldofavor;
    private $usuariosaldoafavor;
    private $retenciondeclarar;
    private $usuarioretenciondeclarar;
    private $descuentoimpuext;
    private $usuariodescuentoimpuext;
    private $tipoingresosganancias;
    private $tipogananciasnogravadas;
    private $ingresosganacias;
    private $usuarioingresosganancias;
    private $ingresonoconseganancias;
    private $usuarioingresonoconsegananciasocasionales;
    private $gananciasnogravadas;
    private $usuariogananciasnogravadas;
    private $tipodeduccion;
    private $tiporentaexededuccioncapital;
    private $tiporentaexededuccionlaboral;
    private $tipoingresopensiones;
    private $tipoaportesobligatoriospensiones;
    private $tipoprestacion;
    private $tipoaporteobligatorio;
    private $tipopagoalimen;
    private $tipoindemnizacion;
    private $tipoprimacancilleria;
    private $tipointeresesrendicapital;
    private $tipootrosingresoscapital;
    private $tipoaporteobligatoriocapital;
    private $tipoaportevoluntariocapital;
    private $tipootroscostogastocapital;
    private $tipovalorbrutoventaslaboral;
    private $tipoaporteobligatoriolaboralnoconse;
    private $tipootroscostogastolaboral;

    public function __construct()
    {
        $this->usuario = $this->model('Usuario');
        $this->declaracion = $this->model('Declaracion');
        $this->parametrosdeclaracion = $this->model('Parametrosdeclaracion');
        $this->patrimonio = $this->model('Patrimonio');
        $this->cedulageneral = $this->model('Cedulageneral');
        $this->rentatrabajo = $this->model('Rentatrabajo');
        $this->ingresobruto = $this->model('Ingresobruto');
        $this->usuarioingresobruto = $this->model('Usuarioingresobruto');
        $this->ingresonoconse = $this->model('Ingresonoconse');
        $this->usuarioingresonoconse = $this->model('Usuarioingresonoconse');
        $this->rentaexenta = $this->model('Rentaexenta');
        $this->usuariorentaexenta = $this->model('Usuariorentaexenta');

        $this->rentacapital = $this->model('Rentacapital');
        $this->ingresobrutocapital = $this->model('Ingresobrutocapital');
        $this->usuarioingresobrutocapital = $this->model('Usuarioingresobrutocapital');
        $this->ingresonoconsecapital = $this->model('Ingresonoconsecapital');
        $this->usuarioingresonoconsecapital = $this->model('Usuarioingresonoconsecapital');
        $this->usuarioingresobrutopensiones = $this->model('Usuarioingresobrutopensiones');

        $this->rentanolaboral = $this->model('Rentanolaboral');
        $this->ingresobrutolaboral = $this->model('Ingresobrutolaboral');
        $this->usuarioingresobrutolaboral = $this->model('Usuarioingresobrutolaboral');
        $this->ingresosnoconselaboral = $this->model('Ingresosnoconselaboral');
        $this->usuarioingresonoconselaboral = $this->model('Usuarioingresonoconselaboral');
        $this->costogastosprocelaboral = $this->model('Costogastosprocelaboral');
        $this->usuariocostogastosprocelaboral = $this->model('Usuariocostogastosprocelaboral');

        $this->cedulapensiones = $this->model('Cedulapensiones');
        $this->ingresosbrutospensiones = $this->model('Ingresosbrutospensiones');
        $this->ingresonoconsepensiones = $this->model('Ingresonoconsepensiones');
        $this->usuarioingresonoconsepensiones = $this->model('Usuarioingresonoconsepensiones');

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
        $this->anticiporenta = $this->model('Anticiporenta');
        $this->usuarioanticiporenta = $this->model('Usuarioanticiporenta');
        $this->sanciones = $this->model('Sanciones');
        $this->usuariosanciones = $this->model('Usuariosanciones');
        $this->saldofavor = $this->model('Saldofavor');
        $this->usuariosaldoafavor = $this->model('Usuariosaldoafavor');
        $this->retenciondeclarar = $this->model('Retenciondeclarar');
        $this->usuarioretenciondeclarar = $this->model('Usuarioretenciondeclarar');
        $this->descuentoimpuext = $this->model('Descuentoimpuext');
        $this->usuariodescuentoimpuext = $this->model('Usuariodescuentoimpuext');
        $this->tipoingresosganancias = $this->model('Tipoingresosganancias');
        $this->tipogananciasnogravadas = $this->model('Tipogananciasnogravadas');
        $this->ingresosganacias = $this->model('Ingresosganacias');
        $this->usuarioingresosganancias = $this->model('Usuarioingresosganancias');
        $this->ingresonoconseganancias = $this->model('Ingresonoconseganancias');
        $this->usuarioingresonoconsegananciasocasionales = $this->model('Usuarioingresonoconsegananciasocasionales');
        $this->gananciasnogravadas = $this->model('Gananciasnogravadas');
        $this->usuariogananciasnogravadas = $this->model('Usuariogananciasnogravadas');
        $this->tipodeduccion = $this->model('Tipodeduccion');
        $this->tiporentaexededuccioncapital = $this->model('Tiporentaexededuccioncapital');
        $this->tiporentaexededuccionlaboral = $this->model('Tiporentaexededuccionlaboral');
        $this->tipoingresopensiones = $this->model('Tipoingresopensiones');
        $this->tipoaportesobligatoriospensiones = $this->model('Tipoaportesobligatoriospensiones');
        $this->tipoprestacion = $this->model('Tipoprestacion');
        $this->tipoaporteobligatorio = $this->model('Tipoaporteobligatorio');
        $this->tipoaportevoluntario = $this->model('Tipoaportevoluntario');
        $this->tipopagoalimen = $this->model('Tipopagoalimen');
        $this->tipoindemnizacion = $this->model('Tipoindemnizacion');
        $this->tipoprimacancilleria = $this->model('Tipoprimacancilleria');
        $this->tipointeresesrendicapital = $this->model('Tipointeresesrendicapital');
        $this->tipootrosingresoscapital = $this->model('Tipootrosingresoscapital');
        $this->tipoaporteobligatoriocapital = $this->model('Tipoaporteobligatoriocapital');
        $this->tipoaportevoluntariocapital = $this->model('Tipoaportevoluntariocapital');
        $this->tipootroscostogastocapital = $this->model('Tipootroscostogastocapital');
        $this->tipovalorbrutoventaslaboral = $this->model('Tipovalorbrutoventaslaboral');
        $this->tipoaporteobligatoriolaboralnoconse = $this->model('Tipoaporteobligatoriolaboralnoconse');
        $this->tipootroscostogastolaboral = $this->model('Tipootroscostogastolaboral');
        parent::__construct();
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

                    $idrentatrabajo = $this->rentatrabajo->crear($idcedulageneral);

                    $idingresobruto = $this->ingresobruto->crear();

                    $this->usuarioingresobruto->crear($idingresobruto, $idrentatrabajo, $this->usuario->getid());

                    $idingresonoconse = $this->ingresonoconse->crear();

                    $this->usuarioingresonoconse->crear($idingresonoconse, $idrentatrabajo, $this->usuario->getid());

                    $idrentaexenta = $this->rentaexenta->crear();

                    $this->usuariorentaexenta->crear($idrentaexenta, $idrentatrabajo, $this->usuario->getid());

                    $idrentacapital = $this->rentacapital->crear($idcedulageneral);

                    $idingresobrutocapital = $this->ingresobrutocapital->crear();

                    $this->usuarioingresobrutocapital->crear($idingresobrutocapital, $idrentacapital, $this->usuario->getid());

                    $idingresonoconsecapital = $this->ingresonoconsecapital->crear();

                    $this->usuarioingresonoconsecapital->crear($idingresonoconsecapital, $idrentacapital, $this->usuario->getid());

                    $idcostogastosproce = $this->costogastosproce->crear();

                    $this->usuariocostogastosprocecapital->crear($idcostogastosproce, $idrentacapital, $this->usuario->getid());

                    $idrentanolaboral = $this->rentanolaboral->crear($idcedulageneral);

                    $idingresobrutolaboral = $this->ingresobrutolaboral->crear();

                    $this->usuarioingresobrutolaboral->crear($idingresobrutolaboral, $idrentanolaboral, $this->usuario->getid());

                    $idingresosnoconselaboral = $this->ingresosnoconselaboral->crear();

                    $this->usuarioingresonoconselaboral->crear($idingresosnoconselaboral, $idrentanolaboral, $this->usuario->getid());

                    $idcostogastosprocelaboral = $this->costogastosprocelaboral->crear();

                    $this->usuariocostogastosprocelaboral->crear($idcostogastosprocelaboral, $idrentanolaboral, $this->usuario->getid());

                    
                    $idcedulapensiones = $this->cedulapensiones->crear($iddeclaracion);

                    $idingresobrutopensiones = $this->ingresosbrutospensiones->crear();

                    $this->usuarioingresobrutopensiones->crear($idingresobrutopensiones, $idcedulapensiones, $this->usuario->getid());

                    $idingresonoconsepensiones = $this->ingresonoconsepensiones->crear();

                    $this->usuarioingresonoconsepensiones->crear($idingresonoconsepensiones, $idcedulapensiones, $this->usuario->getid());



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
                $this->patrimonio->calcularpatrimoniototales($id);
                $patrimonio = $this->patrimonio->listar($id);
                $idcedulas = 1;
                $cedulas = [];
                $idliquidacion = $this->liquidacionprivada->traerid($id);
                $liquidacionprivada = $this->liquidacionprivada->listar($id);
                $idganancias = $this->gananciasocasionales->traerid($id);
                $gananciasocasionales = $this->gananciasocasionales->listar($id);
                $ids = [$idpatrimonio, $idcedulas, $idliquidacion, $idganancias];
                /*$cedulas = $this->cedulas->listar();
                $liquidacionprivada = $this->liquidacionprivada->listar();
                $gananciasocasionales = $this->gananciasocasionales->listar(); */

                $data = [$ids, $informacionpersonal, $patrimonio, $cedulas, $liquidacionprivada, $gananciasocasionales];

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

    public function traertipo($clase, $tipo, $aspecto = null, $tipoaspecto = null, $tipodeltipoaspecto = null){
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

                } else if ($clase == "gananciasocasionales") {

                    if ($tipo == "ingresosganancias") {

                        $ingresosganacias = $this->tipoingresosganancias->listar();
                        print_r(json_encode($ingresosganacias));

                    } else if ($tipo == "gananciasnogravadas") {

                        $gananciasnogravadas = $this->tipogananciasnogravadas->listar();
                        print_r(json_encode($gananciasnogravadas));

                    }

                } else if ($clase == "cedulas") {
                    
                    if ($tipo == "cedulageneral") {

                        if ($aspecto == "rentatrabajo") {
                            
                            if ($tipoaspecto == "ingresobruto") {

                                if ($tipodeltipoaspecto == "prestasociales") {
                                    
                                    $prestacion = $this->tipoprestacion->listar();
                                    print_r(json_encode($prestacion));

                                }

                            } else if($tipoaspecto == "ingresosnoconse") {

                                if ($tipodeltipoaspecto == "aportesobligatorios") {

                                    $aporteobligatorio = $this->tipoaporteobligatorio->listar();
                                    print_r(json_encode($aporteobligatorio));

                                } else if ($tipodeltipoaspecto == "aportesvoluntarios") {

                                    $aportevoluntario = $this->tipoaportevoluntario->listar();
                                    print_r(json_encode($aportevoluntario));

                                } else if ($tipodeltipoaspecto == "pagosalimen") {

                                    $pagosalimen = $this->tipopagoalimen->listar();
                                    print_r(json_encode($pagosalimen));

                                }

                            } else if ($tipoaspecto == "rentaexenta") {

                                if ($tipodeltipoaspecto == "indemnizacion") {

                                    $indemnizacion = $this->tipoindemnizacion->listar();
                                    print_r(json_encode($indemnizacion));


                                } else if ($tipodeltipoaspecto == "primacancilleria") {

                                    $prima = $this->tipoprimacancilleria->listar();
                                    print_r(json_encode($prima));

                                }

                            } else if ($tipoaspecto == "deducciones") {

                                $deducciones = $this->tipodeduccion->listar();
                                print_r(json_encode($deducciones));

                            }

                        } else if ($aspecto == "rentacapital") {

                            if ($tipoaspecto == "rentaexentadeduccion") {

                                $rentaexentadeduccion = $this->tiporentaexededuccioncapital->listar();
                                print_r(json_encode($rentaexentadeduccion));

                            } else if ($tipoaspecto == "ingresobrutocapital") {

                                if ($tipodeltipoaspecto == "interesesrendimientos") {

                                    $interesesrendimientos = $this->tipointeresesrendicapital->listar();
                                    print_r(json_encode($interesesrendimientos));

                                } else if ($tipodeltipoaspecto == "otrosingresos") {

                                    $otrosingresos = $this->tipootrosingresoscapital->listar();
                                    print_r(json_encode($otrosingresos));
                                    
                                }

                            } else if ($tipoaspecto == "ingresosnoconsecapital") {

                                if ($tipodeltipoaspecto == "aportesobligatorios") {

                                    $aporteobligatoriocapital = $this->tipoaporteobligatoriocapital->listar();
                                    print_r(json_encode($aporteobligatoriocapital));

                                } else if ($tipodeltipoaspecto == "aportesvoluntarios") {

                                    $aportesvoluntarioscapital = $this->tipoaportevoluntariocapital->listar();
                                    print_r(json_encode($aportesvoluntarioscapital));

                                }

                            } else if ($tipoaspecto == "costogastoproce") {

                                if ($tipodeltipoaspecto == "otroscostogastos") {

                                    $otroscostosgastoscapital = $this->tipootroscostogastocapital->listar();
                                    print_r(json_encode($otroscostosgastoscapital));

                                }

                            }

                        } else if ($aspecto == "rentanolaboral") {

                            if ($tipoaspecto == "rentaexentadeduccion") {

                                $rentaexentadeduccion = $this->tiporentaexededuccionlaboral->listar();
                                print_r(json_encode($rentaexentadeduccion));

                            } else if ($tipoaspecto == "ingresobrutonolaboral") {
                                
                                if ($tipodeltipoaspecto == "valorbrutoventas") {

                                    $valorbrutoventas = $this->tipovalorbrutoventaslaboral->listar();
                                    print_r(json_encode($valorbrutoventas));

                                }

                            } else if ($tipoaspecto == "ingresosnoconsenolaboral") {

                                if ($tipodeltipoaspecto == "aportesobligatorios") {
                                    
                                    $aportesobligatoriosnolaboral = $this->tipoaporteobligatoriolaboralnoconse->listar();
                                    print_r(json_encode($aportesobligatoriosnolaboral));

                                }

                            } else if ($tipoaspecto == "costogastoproce") {

                                if ($tipodeltipoaspecto == "otroscostogastos") {
                                
                                    $otroscostogastosnolaboral = $this->tipootroscostogastolaboral->listar();
                                    print_r(json_encode($otroscostogastosnolaboral));

                                }

                            }

                        }


                    } else if ($tipo == "cedulapensiones") {

                        if ($aspecto == "ingresobruto") {

                            if ($tipoaspecto == "ingresopensiones") {
                                
                                $ingresopensiones = $this->tipoingresopensiones->listar();
                                print_r(json_encode($ingresopensiones));

                            }

                        } else if ($aspecto == "ingresonoconse") {
                            
                            if ($tipoaspecto == "aportesobligatorios") {

                                $aportesobligatorios = $this->tipoaportesobligatoriospensiones->listar();
                                print_r(json_encode($aportesobligatorios));

                            }

                        }

                    } else if ($tipo == "ceduladividendosyparticipaciones") {

                        # code...

                    }

                }

            } else{

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }
    }

    public function creardeclaracion($clase, $tipo, $id = null, $aspecto = null, $tipoaspecto = null){
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
                        
                        $valor = $_POST['valorpatrimoniocrear'];
                        $nombre = $_POST['nombrepatrimoniocrear'];
                        $idmoneda = $_POST['tipomonedacrearpatrimonio'];
                        $idmodelo = $_POST['tipomodelocrearpatrimonio'];
                        $idpatrimonio = $_POST['idpatri'];

                        $idbien = $this->bien->crear($nombre, $valor, $id, $idmoneda, $idmodelo);
                        $this->usuariobien->crear($idbien, $idpatrimonio, $this->usuario->getid());

                    } else if ($tipo == "deudas") {

                        $valor = $_POST['valorpatrimoniocrear'];
                        $nombre = $_POST['nombrepatrimoniocrear'];
                        $idmoneda = $_POST['tipomonedacrearpatrimonio'];
                        $idmodelo = $_POST['tipomodelocrearpatrimonio'];
                        $idpatrimonio = $_POST['idpatri'];

                        $iddeuda = $this->deuda->crear($nombre, $valor, $id, $idmoneda, $idmodelo);
                        $this->usuariodeuda->crear($iddeuda, $idpatrimonio, $this->usuario->getid());

                    }

                } else if ($clase == "liquidacionprivada") {

                    $nombre = $_POST['nombreliquidacionprivadacrear'];
                    $valor = $_POST['valorliquidacionprivadacrear'];
                    $descripcion = $_POST['descripcionliquidacionprivadacrear'];
                    $idliquidacion = $_POST['idliqu'];

                    if ($tipo == "anticiporenta") {

                        $idanticipo = $this->anticiporenta->crear($nombre, $valor, $descripcion);     
                        $this->usuarioanticiporenta->crear($idanticipo, $idliquidacion, $this->usuario->getid());

                    } else if ($tipo == "sanciones") {

                        $idsanciones = $this->sanciones->crear($nombre ,$valor, $descripcion);     
                        $this->usuariosanciones->crear($idsanciones, $idliquidacion, $this->usuario->getid());

                    } else if ($tipo == "saldofavor") {

                        $idsaldofavor = $this->saldofavor->crear($nombre, $valor, $descripcion);
                        $this->usuariosaldoafavor->crear($idsaldofavor, $idliquidacion, $this->usuario->getid());

                    } else if ($tipo == "retenciondeclarar") {

                        $idretenciondeclarar = $this->retenciondeclarar->crear($nombre,$valor, $descripcion);
                        $this->usuarioretenciondeclarar->crear($idretenciondeclarar, $idliquidacion, $this->usuario->getid());

                    } else if ($tipo == "descuentoimpuext") {

                        $iddescuentoimpuext = $this->descuentoimpuext->crear($nombre, $valor, $descripcion);
                        $this->usuariodescuentoimpuext->crear($iddescuentoimpuext, $idliquidacion, $this->usuario->getid());

                    }

                } else if ($clase == "gananciasocasionales") {

                    $valor = $_POST['valorgananciasocasionalescrear'];
                    $idgananciasocasionales = $_POST['idgananciasocasionales'];
                    
                    if ($tipo == "ingresosganancias") {

                        $idingresosganacias = $this->ingresosganacias->crear($valor, $id);
                        $this->usuarioingresosganancias->crear($idingresosganacias, $idgananciasocasionales, $this->usuario->getid());
                        
                    } else if ($tipo == "ingresosnoconse") {

                        $idingresonoconseganancias = $this->ingresonoconseganancias->crear($valor);
                        $this->usuarioingresonoconsegananciasocasionales->crear($idingresonoconseganancias, $idgananciasocasionales, $this->usuario->getid());

                    } else if ($tipo == "gananciasnogravadas") {

                        $idgananciasnogravadas = $this->gananciasnogravadas->crear($valor, $id);
                        $this->usuariogananciasnogravadas->crear($idgananciasnogravadas, $idgananciasocasionales, $this->usuario->getid());

                    }

                } else if ($clase == "cedulageneral") {
        
                    if ($tipo == "rentatrabajo") {
            
                        if ($id == "ingresobruto") {
            
                            if ($aspecto == "salario") {
            
            
            
                            } else if ($aspecto == "honorarios")  {
            
            
            
                            } else if ($aspecto == "viaticos") {
            
            
            
                            } else if ($aspecto == "otrospagos") {
            
            
            
                            } else if ($aspecto == "prestasociales"){
            
            
            
                            }
            
                        } else if ($id == "ingresosnoconse") {
            
                            if ($aspecto == "aportesobligatorios") {
                                
                            }  else if ($aspecto == "aportesvoluntarios"){
            
                            } else if ($aspecto == "aporteseconoedu") {
            
                            } else if ($aspecto == "pagosalimen") {
            
                            }
            
                        }  else if ($id == "deducciones"){
            
            
            
                        } else if ($id == "rentaexenta") {
            
                            if ($aspecto == "indemnizacion") {
            
                            } else if ($aspecto == "gastosrepresentacion"){
            
                            } else if ($aspecto == "primacancilleria") {
            
                            } else if ($aspecto == "fuerzapublica") {
            
                                if ($tipoaspecto == "seguromuerte") {
                                    
                                } else if ($tipoaspecto == "excesosalariobasico") {
                                    
                                }
            
                            }
            
                        }
            
                    } else if ($tipo == "rentacapital") {
            
                        if ($id == "ingresobrutocapital") {
            
                            if ($aspecto == "interesesrendimientos") {
            
            
            
                            } else if ($aspecto == "otrosingresos"){
            
            
            
                            }
            
                        } else if ($id == "ingresosnoconsecapital") {
            
                            if ($aspecto == "aportesobligatorios") {
            
            
            
                            } else if ($aspecto == "aportesvoluntarios") {
            
            
            
                            }
            
                        } else if ($id == "costogastoproce"){
            
                            if ($aspecto == "interesesprestamos") {
            
            
            
                            } else if ($aspecto == "otroscostogastos") {
            
            
            
                            }
            
                        } else if ($id == "rentaliqpasece") {
            
            
            
                        } else if ($id == "rentaexentadeduccion") {
            
            
            
                        }
                        
                    } else if ($tipo == "rentanolaboral") {
            
                        if ($id == "ingresobrutonolaboral") {
            
                            if ($aspecto == "ingresosnoclasifican") {
                            
                            } else if ($aspecto == "indemnizacionnolabo") {
            
                            } else if ($aspecto == "recompensas") {
            
                            } else if ($aspecto == "derechosexplotpropie"){
            
                            } else if ($aspecto == "explotfranquicias"){
            
                            }  else if ($aspecto == "recibidosgananciales"){
            
                            }  else if ($aspecto == "retirodinerosfondovolu") {
                                
                            } else if ($aspecto == "apoyoseconoestado") {
            
                            } else if ($aspecto == "campanniaspoliticas"){
            
                            } else if ($aspecto == "valorbrutoventas"){
            
                            }
            
                        }  else if ($id == "devdescreb") {
            
            
            
                        } else if ($id == "ingresosnoconsenolaboral") {
            
                            if ($aspecto == "aportesobligatorios") {
            
                            }  else if ($aspecto == "aportesvoluntarios") {
            
                            }  else if ($aspecto == "recompensas") {
            
                            }  else if ($aspecto == "recibidosgananciales") {
            
                            } else if ($aspecto == "honorariosdesaproyec") {
            
                            } else if ($aspecto == "aporteseconoedu") {
            
                            } else if ($aspecto == "campanniaspoliticas"){
            
                            } else if ($aspecto == "indemnizaaseguradores"){
            
                            } else if ($aspecto == "agroingresoseguro"){
            
                            }
            
                        } else if ($id == "costogastoproce") {
            
                            if ($aspecto == "interesesprestamos") {
            
                            } else if ($aspecto == "otroscostogastos") {
            
                            }  else if ($aspecto == "costofiscal") {
            
                            }
            
                        } else if ($id == "rentaliqpasece"){
            
            
            
                        } else if ($id == "rentaexentadeduccion"){
            
            
            
                        }
            
                    }
                    
                } else if ($clase == "cedulapensiones") {
            
                    if ($tipo == "ingresobruto") {
                        
                        if ($id == "ingresopensiones") {
            
                        } else if ($id == "devolucionesahorro"){
            
                        } else if ($id == "indemnizacionsustitutas"){
            
                        } else if ($id == "pensionesexterior") {
                            
                        }
            
                    } else if ($tipo == "ingresonoconse") {
            
                        if ($id == "aportesobligatorios") {
                            
                        }
            
                    } else if ($tipo == "rentaexenta") {
            
            
            
                    }
            
                } else if ($clase == "ceduladividendosyparticipaciones") {
            
                    if ($tipo == "dividendosyparticipaciones") {
                        
            
            
                    } else if ($tipo == "subcedula1a") {
            
            
                        
                    }else if ($tipo == "subcedula2a") {
            
            
                        
                    }else if ($tipo == "ingresosnoconse") {
                        
            
            
                    }else if ($tipo == "rentaliquidaece") {
            
            
                        
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

                } else if ($clase == "liquidacionprivada") {

                    if ($tipo == "anticipoderenta") {

                        $this->anticiporenta->editar($id);

                    } else if ($tipo == "sanciones") {

                        $this->sanciones->editar($id);

                    } else if ($tipo == "saldoafavor") {

                        $this->saldofavor->editar($id);

                    } else if ($tipo == "retencionadeclarar") {

                        $this->retenciondeclarar->editar($id);

                    } else if ($tipo == "descuentoimpuestoexterior") {

                        $this->descuentoimpuext->editar($id);

                    }

                } else if ($clase == "gananciasocasionales") {

                    if ($tipo == "ingresos") {

                        $this->ingresosganacias->editar($id);

                    } else if ($tipo == "ingresosnoconstitutivos") {

                        $this->ingresonoconseganancias->editar($id);

                    } else if ($tipo == "gananciasocasionalesnogravadasyexentas") {

                        $this->gananciasnogravadas->editar($id);

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
                    $nombre = $_POST['nombrepatrimonioeditar'];
                    $valor = $_POST['valorpatrimonioeditar'];
                    $tipomoneda = $_POST['tipomonedaeditarpatrimonio'];
                    $modelo = $_POST['tipomodeloeditarpatrimonio'];

                    if ($tipo == "bien" || $tipo == "bienes") {
                        
                        $this->bien->editarbien($nombre, $tipopatrimonio, $valor, $tipomoneda, $modelo, $id);

                    } else if ($tipo == "deuda" || $tipo == "deudas") {
                        
                        $this->deuda->editardeuda($nombre, $tipopatrimonio, $valor, $tipomoneda, $modelo, $id);

                    }

                } else if ($clase == "liquidacionprivada") {

                    $nombre = $_POST['nombreliquidacionprivadaeditar'];
                    $valor = $_POST['valorliquidacionprivadaeditar'];
                    $descripcion = $_POST['descripcionliquidacionprivadaeditar'];

                    if ($tipo == "anticipoderenta") {

                        $this->anticiporenta->editaranticiporenta($nombre, $valor, $descripcion, $id);

                    } else if ($tipo == "sanciones") {

                        $this->sanciones->editarsanciones($nombre, $valor, $descripcion, $id);

                    } else if ($tipo == "saldoafavor") {

                        $this->saldofavor->editarsaldofavor($nombre, $valor, $descripcion, $id);

                    } else if ($tipo == "retencionadeclarar") {

                        $this->retenciondeclarar->editarretenciondeclarar($nombre, $valor, $descripcion, $id);

                    } else if ($tipo == "descuentoimpuestoexterior") {

                        $this->descuentoimpuext->editardescuentoimpuext($nombre, $valor, $descripcion, $id);

                    }

                } else if ($clase == "gananciasocasionales") {

                    $valor = $_POST['valorgananciasocasionaleseditar'];

                    if ($tipo == "ingresos") {

                        $this->ingresosganacias->editaringresos($valor, $id);

                    } else if ($tipo == "ingresosnoconstitutivos") {

                        $this->ingresonoconseganancias->editaringresosnoconse($valor, $id);

                    } else if ($tipo == "gananciasocasionalesnogravadasyexentas") {

                        $this->gananciasnogravadas->editarganancias($valor, $id);

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

                } else if ($clase == "patrimonio") {

                    if ($tipo == "bien" || $tipo == "bienes") {
                        
                        $this->usuariobien->eliminar($id);
                        $this->bien->eliminar($id);

                    } else if ($tipo == "deuda" || $tipo == "deudas") {
                        
                        $this->usuariodeuda->eliminar($id);
                        $this->deuda->eliminar($id);

                    }

                } else if ($clase == "liquidacionprivada") {

                    if ($tipo == "anticipoderenta") {

                        $this->usuarioanticiporenta->eliminar($id);
                        $this->anticiporenta->eliminar($id);

                    } else if ($tipo == "sanciones") {

                        $this->usuariosanciones->eliminar($id);
                        $this->sanciones->eliminar($id);

                    } else if ($tipo == "saldoafavor") {

                        $this->usuariosaldoafavor->eliminar($id);
                        $this->saldofavor->eliminar($id);

                    } else if ($tipo == "retencionadeclarar") {

                        $this->usuarioretenciondeclarar->eliminar($id);
                        $this->retenciondeclarar->eliminar($id);

                    } else if ($tipo == "descuentoimpuestoexterior") {

                        $this->usuariodescuentoimpuext->eliminar($id);
                        $this->descuentoimpuext->eliminar($id);

                    }

                } else if ($clase == "gananciasocasionales") {

                    if ($tipo == "ingresos") {

                        $this->usuarioingresosganancias->eliminar($id);
                        $this->ingresosganacias->eliminar($id);

                    } else if ($tipo == "ingresosnoconstitutivos") {

                        $this->usuarioingresonoconsegananciasocasionales->eliminar($id);
                        $this->ingresonoconseganancias->eliminar($id);

                    } else if ($tipo == "gananciasocasionalesnogravadasyexentas") {

                        $this->usuariogananciasnogravadas->eliminar($id);
                        $this->gananciasnogravadas->eliminar($id);

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