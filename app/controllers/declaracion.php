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
    private $costogastosprocecapital;
    private $usuariocostogastosprocecapital;

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

    private $salario;
    private $honorarios;
    private $viaticos;
    private $otrospagos;
    private $cesantiaintereses;
    private $prestasociales;
    private $aporteobligatorio;
    private $aportevoluntario;
    private $aporteseconoedu;
    private $pagosalimen;
    private $deducciones;
    private $usuariodeducciones;
    private $indemnizacion;
    private $gastosrepresentacion;
    private $primacancilleria;
    private $fuerzapublica;
    private $seguromuerte;
    private $excesosalariobasico;
    private $interesesrendimientoscapital;
    private $otrosingresoscapital;
    private $aporteobligatoriocapital;
    private $aportevoluntariocapital;
    private $interesesprestamoscapital;
    private $otroscostogastoscapital;
    private $rentaliqpasececapital;
    private $usuariorentaliqpasececapital;
    private $rentaexededuccioncapital;
    private $usuariorentaexededuccioncapital;
    private $ingresosnoclasificanlaboral;
    private $indemnizacionnolaboral;
    private $derechosexplotpropielaboral;
    private $recompensaslaboral;
    private $recibidosganancialeslaboral;
    private $explotfranquiciaslaboral;
    private $apoyoseconoestadolaboral;
    private $retirodinerosfondovolulaboral;
    private $valorbrutoventaslaboral;
    private $campanniaspoliticaslaboral;
    private $devdescreblaboral;
    private $usuariodevdescreblaboral;
    private $aportesvoluntarioslaboralnoconse;
    private $aportesobligatorioslaboralnoconse;
    private $recompensaslaboralnoconse;
    private $recibidosganancialeslaboralnoconse;
    private $honorariosdesaproyeclaboral;
    private $aporteseconoedulaboralnoconse;
    private $campanniaspoliticaslaboralnoconse;
    private $indemnizaaseguradoreslaboralnoconse;
    private $agroingresosegurolaboralnoconse;
    private $otroscostogastolaboral;
    private $costofiscallaboral;
    private $interesesprestamoslaboral;
    private $rentaliqpasecelaboral;
    private $usuariorentaliqpasecelaboral;
    private $rentaexededuccionlaboral;
    private $usuariorentaexededuccionlaboral;
    private $ingresospensiones;
    private $devolucionesahorropensiones;
    private $indemnizacionsustitutaspensiones;
    private $pensionesexteriorpensiones;
    private $aportesobligatoriospensiones;
    private $rentaexentapensiones;
    private $usuariorentaexentapensiones;
    private $diviparti2016; 
    private $usuariodiviparti2016;
    private $subcedula1a;
    private $usuariosubcedula1a;
    private $subcedula2a;
    private $usuariosubcedula2a;
    private $ingresonoconsedividendos;
    private $usuarioingresonoconsedividendos;
    private $rentaliqpasecedividendos;
    private $usuariorentaliqpasecedividendos;
    private $exogenas;

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
        $this->fuerzapublica = $this->model('Fuerzapublica');

        $this->rentacapital = $this->model('Rentacapital');
        $this->ingresobrutocapital = $this->model('Ingresobrutocapital');
        $this->usuarioingresobrutocapital = $this->model('Usuarioingresobrutocapital');
        $this->ingresonoconsecapital = $this->model('Ingresonoconsecapital');
        $this->usuarioingresonoconsecapital = $this->model('Usuarioingresonoconsecapital');
        $this->usuarioingresobrutopensiones = $this->model('Usuarioingresobrutopensiones');
        $this->costogastosprocecapital = $this->model('Costogastosprocecapital');
        $this->usuariocostogastosprocecapital = $this->model('Usuariocostogastosprocecapital');

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
        
        $this->salario = $this->model('Salario');
        $this->honorarios = $this->model('Honorarios');
        $this->viaticos = $this->model('Viaticos');
        $this->otrospagos = $this->model('Otrospagos');
        $this->cesantiaintereses = $this->model('Cesantiaintereses');
        $this->prestasociales = $this->model('Prestasociales');
        $this->aporteobligatorio = $this->model('Aporteobligatorio');
        $this->aportevoluntario = $this->model('Aportevoluntario');
        $this->aporteseconoedu = $this->model('Aporteseconoedu');
        $this->pagosalimen = $this->model('Pagosalimen');
        $this->deducciones = $this->model('Deducciones');
        $this->usuariodeducciones = $this->model('Usuariodeducciones');
        $this->indemnizacion = $this->model('Indemnizacion');
        $this->gastosrepresentacion = $this->model('Gastosrepresentacion');
        $this->primacancilleria = $this->model('Primacancilleria');
        $this->seguromuerte = $this->model('Seguromuerte');
        $this->excesosalariobasico = $this->model('Excesosalariobasico');
        $this->interesesrendimientoscapital = $this->model('Interesesrendimientoscapital');
        $this->otrosingresoscapital = $this->model('Otrosingresoscapital');
        $this->aporteobligatoriocapital = $this->model('Aporteobligatoriocapital');
        $this->aportevoluntariocapital = $this->model('Aportevoluntariocapital');
        $this->interesesprestamoscapital = $this->model('Interesesprestamoscapital');
        $this->otroscostogastoscapital = $this->model('Otroscostogastoscapital');
        $this->rentaliqpasececapital = $this->model('Rentaliqpasececapital');
        $this->usuariorentaliqpasececapital = $this->model('Usuariorentaliqpasececapital');
        $this->rentaexededuccioncapital = $this->model('Rentaexededuccioncapital');
        $this->usuariorentaexededuccioncapital = $this->model('Usuariorentaexededuccioncapital');
        $this->ingresosnoclasificanlaboral = $this->model('Ingresosnoclasificanlaboral');
        $this->indemnizacionnolaboral = $this->model('Indemnizacionnolaboral');
        $this->recompensaslaboral = $this->model('Recompensaslaboral');
        $this->derechosexplotpropielaboral = $this->model('Derechosexplotpropielaboral');
        $this->explotfranquiciaslaboral = $this->model('Explotfranquiciaslaboral');
        $this->recibidosganancialeslaboral = $this->model('Recibidosganancialeslaboral');
        $this->retirodinerosfondovolulaboral = $this->model('Retirodinerosfondovolulaboral');
        $this->apoyoseconoestadolaboral = $this->model('Apoyoseconoestadolaboral');
        $this->campanniaspoliticaslaboral = $this->model('Campanniaspoliticaslaboral');
        $this->valorbrutoventaslaboral = $this->model('Valorbrutoventaslaboral');
        $this->devdescreblaboral = $this->model('Devdescreblaboral');
        $this->usuariodevdescreblaboral = $this->model('Usuariodevdescreblaboral');
        $this->aportesobligatorioslaboralnoconse = $this->model('Aportesobligatorioslaboralnoconse');
        $this->recompensaslaboralnoconse = $this->model('Recompensaslaboralnoconse');
        $this->recibidosganancialeslaboralnoconse = $this->model('Recibidosganancialeslaboralnoconse');
        $this->honorariosdesaproyeclaboral = $this->model('Honorariosdesaproyeclaboral');
        $this->aporteseconoedulaboralnoconse = $this->model('Aporteseconoedulaboralnoconse');
        $this->campanniaspoliticaslaboralnoconse = $this->model('Campanniaspoliticaslaboralnoconse');
        $this->indemnizaaseguradoreslaboralnoconse = $this->model('Indemnizaaseguradoreslaboralnoconse');
        $this->agroingresosegurolaboralnoconse = $this->model('Agroingresosegurolaboralnoconse');
        $this->aportesvoluntarioslaboralnoconse = $this->model('Aportesvoluntarioslaboralnoconse');
        $this->interesesprestamoslaboral = $this->model("interesesprestamoslaboral");
        $this->costofiscallaboral = $this->model("costofiscallaboral");
        $this->otroscostogastolaboral = $this->model("otroscostogastolaboral");
        $this->rentaliqpasecelaboral = $this->model("Rentaliqpasecelaboral");
        $this->usuariorentaliqpasecelaboral = $this->model('Usuariorentaliqpasecelaboral');
        $this->rentaexededuccionlaboral = $this->model("Rentaexededuccionlaboral");
        $this->usuariorentaexededuccionlaboral = $this->model("Usuariorentaexededuccionlaboral");
        $this->ingresospensiones = $this->model("Ingresospensiones");
        $this->devolucionesahorropensiones = $this->model('Devolucionesahorropensiones');
        $this->indemnizacionsustitutaspensiones = $this->model('Indemnizacionsustitutaspensiones');
        $this->pensionesexteriorpensiones = $this->model('Pensionesexteriorpensiones');
        $this->aportesobligatoriospensiones = $this->model('Aportesobligatoriospensiones');
        $this->rentaexentapensiones = $this->model('Rentaexentapensiones');
        $this->usuariorentaexentapensiones = $this->model('Usuariorentaexentapensiones');
        $this->diviparti2016 = $this->model('Diviparti2016');
        $this->usuariodiviparti2016 = $this->model('Usuariodiviparti2016');
        $this->subcedula1a = $this->model('Subcedula1a');
        $this->usuariosubcedula1a = $this->model('Usuariosubcedula1a');
        $this->subcedula2a = $this->model('Subcedula2a');
        $this->usuariosubcedula2a = $this->model('Usuariosubcedula2a');
        $this->ingresonoconsedividendos = $this->model('Ingresonoconsedividendos');
        $this->usuarioingresonoconsedividendos = $this->model('Usuarioingresonoconsedividendos');
        $this->rentaliqpasecedividendos = $this->model('Rentaliqpasecedividendos');
        $this->usuariorentaliqpasecedividendos = $this->model('Usuariorentaliqpasecedividendos');
        $this->exogenas = $this->model('Exogenas');

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

                $i = 0;
                    $porcentaje = 0;

                    foreach ($declaraciones as $decla) {

                        $patrimonio = $this->patrimonio->consultarvalor($decla['iddeclaracion']);
                        $cedulageneral = $this->cedulageneral->consultarvalor($decla['iddeclaracion']);
                        $ceduladiviparti = $this->ceduladiviparti->consultarvalor($decla['iddeclaracion']);
                        $cedulapensiones = $this->cedulapensiones->consultarvalor($decla['iddeclaracion']);

                        if ($patrimonio["deudatotal"] > 0 || $patrimonio["patbrutototal"] > 0) {

                            $porcentaje += 45; 

                        }

                        if ($cedulageneral["rentaliquidageneral"] > 0 || $cedulageneral["rentasexentasdeduccion"] > 0 || $cedulageneral["rentaliquidaordinaria"] > 0 || $cedulageneral["rentaliquidagravable"] > 0 || $ceduladiviparti["rentaliquida"] > 0 || $ceduladiviparti["rentaexenta"] > 0 || $cedulapensiones["rentaliquida"] > 0 || $cedulapensiones["rentaliquidagravable"] > 0) {

                            $porcentaje += 45; 

                        }

                        if ($decla['estadorevision'] == 1) {
                            
                            $porcentaje += 5; 

                        }
                        if ($decla['estadoarchivo'] == 1) {
                            
                            $porcentaje += 5; 

                        }
                        $declaraciones[$i] += [ "porcent" => $porcentaje];
                        $i++;
                    }


                $this->viewtemplate('declaracion', 'listar', $this->usuario->traerdatosusuario(), $declaraciones);
            } else if(strtolower($this->usuario->getnomrol() == "contador")){

                $declaraciones = $this->declaracion->listarrevision();
                
                $this->viewtemplate('declaracion', 'listar', $this->usuario->traerdatosusuario(), $declaraciones);
            } else {

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
                    $i = 0;
                    $porcentaje = 0;

                    foreach ($declaraciones as $decla) {

                        $patrimonio = $this->patrimonio->consultarvalor($decla['iddeclaracion']);
                        $cedulageneral = $this->cedulageneral->consultarvalor($decla['iddeclaracion']);
                        $ceduladiviparti = $this->ceduladiviparti->consultarvalor($decla['iddeclaracion']);
                        $cedulapensiones = $this->cedulapensiones->consultarvalor($decla['iddeclaracion']);

                        if ($patrimonio["deudatotal"] > 0 || $patrimonio["patbrutototal"] > 0) {

                            $porcentaje += 45; 

                        }

                        if ($cedulageneral["rentaliquidageneral"] > 0 || $cedulageneral["rentasexentasdeduccion"] > 0 || $cedulageneral["rentaliquidaordinaria"] > 0 || $cedulageneral["rentaliquidagravable"] > 0 || $ceduladiviparti["rentaliquida"] > 0 || $ceduladiviparti["rentaexenta"] > 0 || $cedulapensiones["rentaliquida"] > 0 || $cedulapensiones["rentaliquidagravable"] > 0) {

                            $porcentaje += 45; 

                        }
                        
                        
                        if ($decla['estadorevision'] == 1) {
                            
                            $porcentaje += 5; 

                        }
                        if ($decla['estadoarchivo'] == 1) {
                            
                            $porcentaje += 5; 

                        }

                        $declaraciones[$i] += [ "porcent" => $porcentaje];
                        $i++;
                    }

                    /* echo $declaraciones[0]['porcent']; */

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

                    $this->fuerzapublica->crear($idrentaexenta);

                    $idrentacapital = $this->rentacapital->crear($idcedulageneral);

                    $idingresobrutocapital = $this->ingresobrutocapital->crear();

                    $this->usuarioingresobrutocapital->crear($idingresobrutocapital, $idrentacapital, $this->usuario->getid());

                    $idingresonoconsecapital = $this->ingresonoconsecapital->crear();

                    $this->usuarioingresonoconsecapital->crear($idingresonoconsecapital, $idrentacapital, $this->usuario->getid());

                    $idcostogastosproce = $this->costogastosprocecapital->crear();

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
                /* $idcedulas = 1; */
                $idliquidacion = $this->liquidacionprivada->traerid($id);
                $liquidacionprivada = $this->liquidacionprivada->listar($id);
                $idganancias = $this->gananciasocasionales->traerid($id);
                $gananciasocasionales = $this->gananciasocasionales->listar($id);
                $idingresobruto = $this->ingresobruto->traerid($id);

                $this->ingresobruto->calcularingresobruto($idingresobruto);

                $idingresonoconse = $this->ingresonoconse->traerid($id);

                $this->ingresonoconse->calcularingresonoconse($idingresonoconse);

                $idrentatrabajo = $this->rentatrabajo->traerid($id);


                $idrentaexenta = $this->rentaexenta->traerid($id);

                $this->rentaexenta->calcularrentaexenta($idrentaexenta);

                $this->rentatrabajo->calcularrentatrabajo($idrentatrabajo);

                $idfuerzapublica = $this->fuerzapublica->traerid($id);
                $idingresobrutorentacapital = $this->ingresobrutocapital->traerid($id);

                $this->ingresobrutocapital->calcularingresobrutocapital($idingresobrutorentacapital);

                $idingresosnoconsecapital = $this->ingresonoconsecapital->traerid($id);

                $this->ingresonoconsecapital->calcularingresosnoconse($idingresosnoconsecapital);

                $idcostogastosprocecapital = $this->costogastosprocecapital->traerid($id);

                $this->costogastosprocecapital->calcularcostogastosprocecapital($idcostogastosprocecapital);

                $idrentacapital = $this->rentacapital->traerid($id);

                $this->rentacapital->calcualrrentacapital($idrentacapital);

                $idingresobrutolaboral = $this->ingresobrutolaboral->traerid($id);

                $this->ingresobrutolaboral->calcularingresobrutolaboral($idingresobrutolaboral);

                $idingresosnoconselaboral = $this->ingresosnoconselaboral->traerid($id);

                $this->ingresosnoconselaboral->calcularingresonoconselaboral($idingresosnoconselaboral);

                $idcostogastosprocelaboral = $this->costogastosprocelaboral->traerid($id);

                $this->costogastosprocelaboral->calcularcostogastosprocelaboral($idcostogastosprocelaboral);

                $idrentanolaboral = $this->rentanolaboral->traerid($id);

                $this->rentanolaboral->calcularrentanolaboral($idrentanolaboral);

                $idcedulageneral = $this->cedulageneral->traerid($id);

                $this->cedulageneral->calcularcedulageneral($idcedulageneral);

                $idceduladiviparti = $this->ceduladiviparti->traerid($id);
                $idingresobrutopensiones = $this->ingresosbrutospensiones->traerid($id);
                $idingresonoconsepensiones = $this->ingresonoconsepensiones->traerid($id);
                $idcedulapensiones = $this->cedulapensiones->traerid($id);
                
                $exogenas = $this->exogenas->listar($id);

                $cedulas = [$idingresobruto, $idrentaexenta, $idingresonoconse, $idrentatrabajo, $idfuerzapublica, $idingresobrutorentacapital, $idingresosnoconsecapital, $idcostogastosprocecapital, $idrentacapital, $idceduladiviparti, $idingresobrutopensiones, $idingresonoconsepensiones, $idingresobrutolaboral, $idingresosnoconselaboral, $idcostogastosprocelaboral, $idrentanolaboral, $idcedulapensiones];
                $ids = [$idpatrimonio, $cedulas, $idliquidacion, $idganancias, "iddecla" => $id];
                $cedula = $this->declaracion->listarcedulas($id);
                $data = [$ids, $informacionpersonal, $patrimonio, $cedula, $liquidacionprivada, $gananciasocasionales, $exogenas];

                $porcentaje = 0;
                $patrimonio = $this->patrimonio->consultarvalor($id);
                $cedulageneral = $this->cedulageneral->consultarvalor($id);
                $ceduladiviparti = $this->ceduladiviparti->consultarvalor($id);
                $cedulapensiones = $this->cedulapensiones->consultarvalor($id);

                if ($patrimonio["deudatotal"] > 0 || $patrimonio["patbrutototal"] > 0) {

                            $porcentaje += 45; 

                }

                if ($cedulageneral["rentaliquidageneral"] > 0 || $cedulageneral["rentasexentasdeduccion"] > 0 || $cedulageneral["rentaliquidaordinaria"] > 0 || $cedulageneral["rentaliquidagravable"] > 0 || $ceduladiviparti["rentaliquida"] > 0 || $ceduladiviparti["rentaexenta"] > 0 || $cedulapensiones["rentaliquida"] > 0 || $cedulapensiones["rentaliquidagravable"] > 0) {

                $porcentaje += 45; 

                }

                if ($porcentaje == 90) {

                    /* $this->declaracion->cambiarestadorevision($id); */

                }

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

    public function ver($id){

        if (isset($_SESSION['email'])) {
            $this->usuario->setusuario($this->traersesion());
            if ((strtolower($this->usuario->getnomrol()) == "contador") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {

                $informacionpersonal = $this->usuario->listarinformacionpersonal($this->usuario->getid());
                $patrimonio = $this->patrimonio->listar($id);
                $liquidacionprivada = $this->liquidacionprivada->listar($id);
                $gananciasocasionales = $this->gananciasocasionales->listar($id);
                $cedula = [];
                $exogenas = $this->exogenas->listar($id);
                $data = [$informacionpersonal, $patrimonio, $cedula, $liquidacionprivada, $gananciasocasionales, $exogenas];


                $this->viewtemplate('declaracion', 'ver', $this->usuario->traerdatosusuario(), $data);

            } else{

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }

        

    }


    public function revision($annoperiodo){
        if (isset($_SESSION['email'])) {

            if ((strtolower($this->usuario->getnomrol()) == "contador") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {

                $declaraciones = $this->declaracion->listarrevision();

                $this->viewtemplate('declaracion', 'revision', $this->usuario->traerdatosusuario(), $declaraciones);

            } else{

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }
    }

    public function solicitarrevision($iddeclaracion){

        $this->declaracion->cambiarestadorevision($iddeclaracion);

    }

    public function denegarrevision($iddeclaracion){

        $this->declaracion->denegarrevision($iddeclaracion);

    }

    public function aceptarrevision($iddeclaracion){
        
        $this->declaracion->cambiarestadoarchivo($iddeclaracion);
    }

    public function crearpdf($iddeclaracion){
        
        $patrimonio = $this->patrimonio->consultarvalor($iddeclaracion);
        $cedulageneral = $this->cedulageneral->consultarvalor($iddeclaracion);
        $rentatrabajo = $this->rentatrabajo->consultarvalor($iddeclaracion);
        $ingresobruto = $this->ingresobruto->consultarvalor($iddeclaracion);
        $ingresonoconse = $this->ingresonoconse->consultarvalor($iddeclaracion);
        $deducciones = $this->deducciones->consultarvalor($iddeclaracion);
        $rentaexenta = $this->rentaexenta->consultarvalor($iddeclaracion);
        $nombre = $this->usuario->getnombre();
        $apellido = $this->usuario->getapellido();

        $data = [$patrimonio, $cedulageneral, $rentatrabajo, $ingresobruto, $ingresonoconse, $deducciones, $rentaexenta, $nombre." ".$apellido];

        $this->view('declaracion/pdf', $data);
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
                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $mesessalariocedulascrear = $_POST['mesessalariocedulascrear'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresobrutorentatrabajo = $_POST['idingresobrutorentatrabajo'];
                                $this->salario->crear($nombrecrearcedulas, $mesessalariocedulascrear, $valoraspectoscedulascrear, $idingresobrutorentatrabajo);
                                /* echo $nombrecrearcedulas;
                                echo "<br>";
                                echo $mesessalariocedulascrear;
                                echo "<br>";
                                echo $valoraspectoscedulascrear;
                                echo "<br>";
                                echo $idingresobrutorentatrabajo;
                                echo "<br>"; */
            
                            } else if ($aspecto == "honorarios")  {
            
                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresobrutorentatrabajo = $_POST['idingresobrutorentatrabajo'];
                                $this->honorarios->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresobrutorentatrabajo);
            
                            } else if ($aspecto == "viaticos") {
            
                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresobrutorentatrabajo = $_POST['idingresobrutorentatrabajo'];
                                $this->viaticos->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresobrutorentatrabajo);
            
                            } else if ($aspecto == "otrospagos") {
            
                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresobrutorentatrabajo = $_POST['idingresobrutorentatrabajo'];
                                $this->otrospagos->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresobrutorentatrabajo);
            
                            } else if ($aspecto == "prestasociales"){
            
                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresobrutorentatrabajo = $_POST['idingresobrutorentatrabajo'];
                                $idtipoprestacion = $_POST['tiposubaspectoscedulascrear'];
                                $this->prestasociales->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresobrutorentatrabajo, $idtipoprestacion);
            
                            } else if ($aspecto == "cesantiaintereses") {
                                
                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresobrutorentatrabajo = $_POST['idingresobrutorentatrabajo'];
                                $idrentaexentarentatrabajo = $_POST['idrentaexentarentatrabajo'];
                                $this->cesantiaintereses->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresobrutorentatrabajo, $idrentaexentarentatrabajo);

                            }
            
                        } else if ($id == "ingresosnoconse") {
            
                            if ($aspecto == "aportesobligatorios") {
                                
                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresonoconserentatrabajo = $_POST['idingresonoconserentatrabajo'];
                                $tiposubaspectoscedulascrear = $_POST['tiposubaspectoscedulascrear'];
                                $this->aporteobligatorio->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresonoconserentatrabajo, $tiposubaspectoscedulascrear);

                            }  else if ($aspecto == "aportesvoluntarios"){
            
                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresonoconserentatrabajo = $_POST['idingresonoconserentatrabajo'];
                                $tiposubaspectoscedulascrear = $_POST['tiposubaspectoscedulascrear'];
                                $idrentaexentarentatrabajo = $_POST['idrentaexentarentatrabajo'];
                                $this->aportevoluntario->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresonoconserentatrabajo, $tiposubaspectoscedulascrear, $idrentaexentarentatrabajo);

                            } else if ($aspecto == "aporteseconoedu") {
            
                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresonoconserentatrabajo = $_POST['idingresonoconserentatrabajo'];
                                $this->aporteseconoedu->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresonoconserentatrabajo);
            
                                
                            } else if ($aspecto == "pagosalimen") {
            
                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $mesessalariocedulascrear = $_POST['mesessalariocedulascrear'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresonoconserentatrabajo = $_POST['idingresonoconserentatrabajo'];
                                $tiposubaspectoscedulascrear = $_POST['tiposubaspectoscedulascrear'];
                                $this->pagosalimen->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $mesessalariocedulascrear, $idingresonoconserentatrabajo, $tiposubaspectoscedulascrear);

                            }
            
                        }  else if ($id == "deducciones"){
            
                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idrentatrabajo = $_POST['idrentatrabajo'];
                                $aspectoscedulascrear = $_POST['aspectoscedulascrear'];
                                $iddeducciones = $this->deducciones->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $aspectoscedulascrear);
                                $this->usuariodeducciones->crear($iddeducciones,$idrentatrabajo, $this->usuario->getid());

                        } else if ($id == "rentaexenta") {
            
                            if ($aspecto == "indemnizacion") {

                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idrentaexentarentatrabajo = $_POST['idrentaexentarentatrabajo'];
                                $tiposubaspectoscedulascrear = $_POST['tiposubaspectoscedulascrear'];
                                $this->indemnizacion->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idrentaexentarentatrabajo, $tiposubaspectoscedulascrear);
            
                            } else if ($aspecto == "gastosrepresentacion"){

                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idrentaexentarentatrabajo = $_POST['idrentaexentarentatrabajo'];
                                $this->gastosrepresentacion->crear($valoraspectoscedulascrear, $idrentaexentarentatrabajo);
            
                            } else if ($aspecto == "primacancilleria") {

                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idrentaexentarentatrabajo = $_POST['idrentaexentarentatrabajo'];
                                $tiposubaspectoscedulascrear = $_POST['tiposubaspectoscedulascrear'];
                                $this->primacancilleria->crear($valoraspectoscedulascrear, $tiposubaspectoscedulascrear, $idrentaexentarentatrabajo);
            
                            } else if ($aspecto == "fuerzapublica") {
            
                                if ($tipoaspecto == "seguromuerte") {
                                    
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idfuerzapublica = $_POST['idfuerzapublica'];
                                $this->seguromuerte->crear($valoraspectoscedulascrear, $idfuerzapublica);

                                } else if ($tipoaspecto == "excesosalariobasico") {
                                    $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                    $idfuerzapublica = $_POST['idfuerzapublica'];
                                    $this->excesosalariobasico->crear($valoraspectoscedulascrear, $idfuerzapublica);
                                }
            
                            }
            
                        }
            
                    } else if ($tipo == "rentacapital") {
            
                        if ($id == "ingresobrutocapital") {
            
                            if ($aspecto == "interesesrendimientos") {
            
                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresobrutorentacapital = $_POST['idingresobrutorentacapital'];
                                $tiposubaspectoscedulascrear = $_POST['tiposubaspectoscedulascrear'];
                                $this->interesesrendimientoscapital->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $tiposubaspectoscedulascrear, $idingresobrutorentacapital);
            
                            } else if ($aspecto == "otrosingresos"){

                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresobrutorentacapital = $_POST['idingresobrutorentacapital'];
                                $tiposubaspectoscedulascrear = $_POST['tiposubaspectoscedulascrear'];
                                $this->otrosingresoscapital->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $tiposubaspectoscedulascrear, $idingresobrutorentacapital);
            
                            }
            
                        } else if ($id == "ingresosnoconsecapital") {
            
                            if ($aspecto == "aportesobligatorios") {
            
                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresosnoconsecapital = $_POST['idingresosnoconsecapital'];
                                $tiposubaspectoscedulascrear = $_POST['tiposubaspectoscedulascrear'];
                                $this->aporteobligatoriocapital->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $tiposubaspectoscedulascrear, $idingresosnoconsecapital);
            
                            } else if ($aspecto == "aportesvoluntarios") {
            
                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresosnoconsecapital = $_POST['idingresosnoconsecapital'];
                                $tiposubaspectoscedulascrear = $_POST['tiposubaspectoscedulascrear'];
                                $this->aportevoluntariocapital->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $tiposubaspectoscedulascrear, $idingresosnoconsecapital);
            
                            }
            
                        } else if ($id == "costogastoproce"){
            
                            if ($aspecto == "interesesprestamos") {
            
                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idcostogastosprocecapital = $_POST['idcostogastosprocecapital'];
                                $this->interesesprestamoscapital->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idcostogastosprocecapital);
    
            
                            } else if ($aspecto == "otroscostogastos") {
            
                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idcostogastosprocecapital = $_POST['idcostogastosprocecapital'];
                                $tiposubaspectoscedulascrear = $_POST['tiposubaspectoscedulascrear'];
                                $this->otroscostogastoscapital->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idcostogastosprocecapital, $tiposubaspectoscedulascrear);
            
                            }
            
                        } else if ($id == "rentaliqpasece") {
            
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idrentacapital = $_POST['idrentacapital'];
                                $rentaliqpasecapital = $this->rentaliqpasececapital->crear($valoraspectoscedulascrear);
                                $this->usuariorentaliqpasececapital->crear($rentaliqpasecapital, $idrentacapital, $this->usuario->getid());
            
                        } else if ($id == "rentaexentadeduccion") {
            
                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idrentacapital = $_POST['idrentacapital'];
                                $aspectoscedulascrear = $_POST['aspectoscedulascrear'];
                                $idrentaexededuccioncapital = $this->rentaexededuccioncapital->crear($nombrecrearcedulas,$valoraspectoscedulascrear, $aspectoscedulascrear);
                                $this->usuariorentaexededuccioncapital->crear($idrentaexededuccioncapital, $idrentacapital, $this->usuario->getid());
            
                        }
                        
                    } else if ($tipo == "rentanolaboral") {
            
                        if ($id == "ingresobrutonolaboral") {
            
                            if ($aspecto == "ingresosnoclasifican") {

                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresobrutolaboral = $_POST['idingresobrutolaboral'];
                                $this->ingresosnoclasificanlaboral->crear($valoraspectoscedulascrear, $idingresobrutolaboral);

                            } else if ($aspecto == "indemnizacionnolabo") {
            
                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresobrutolaboral = $_POST['idingresobrutolaboral'];
                                $this->indemnizacionnolaboral->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresobrutolaboral);

                            } else if ($aspecto == "recompensas") {

                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresobrutolaboral = $_POST['idingresobrutolaboral'];
                                $this->recompensaslaboral->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresobrutolaboral);
                                
            
                            } else if ($aspecto == "derechosexplotpropie"){
                                
                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresobrutolaboral = $_POST['idingresobrutolaboral'];
                                $this->derechosexplotpropielaboral->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresobrutolaboral);

                            } else if ($aspecto == "explotfranquicias"){

                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresobrutolaboral = $_POST['idingresobrutolaboral'];
                                $this->explotfranquiciaslaboral->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresobrutolaboral);
            
                            }  else if ($aspecto == "recibidosgananciales"){

                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresobrutolaboral = $_POST['idingresobrutolaboral'];
                                $this->recibidosganancialeslaboral->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresobrutolaboral);
            
                            }  else if ($aspecto == "retirodinerosfondovolu") {

                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresobrutolaboral = $_POST['idingresobrutolaboral'];
                                $this->retirodinerosfondovolulaboral->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresobrutolaboral);
                                
                            } else if ($aspecto == "apoyoseconoestado") {

                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresobrutolaboral = $_POST['idingresobrutolaboral'];
                                $this->apoyoseconoestadolaboral->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresobrutolaboral);
            
                            } else if ($aspecto == "campanniaspoliticas"){

                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresobrutolaboral = $_POST['idingresobrutolaboral'];
                                $this->campanniaspoliticaslaboral->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresobrutolaboral);
            
                            } else if ($aspecto == "valorbrutoventas"){

                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresobrutolaboral = $_POST['idingresobrutolaboral'];
                                $tiposubaspectoscedulascrear = $_POST['tiposubaspectoscedulascrear'];
                                $this->valorbrutoventaslaboral->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresobrutolaboral, $tiposubaspectoscedulascrear);
                                
                            }
            
                        }  else if ($id == "devdescreb") {

                            $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                            $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                            $idrentanolaboral = $_POST['idrentanolaboral'];
                            $iddevdescreblaboral = $this->devdescreblaboral->crear($nombrecrearcedulas, $valoraspectoscedulascrear);
                            $this->usuariodevdescreblaboral->crear($iddevdescreblaboral, $idrentanolaboral, $this->usuario->getid());
                                
            
                        } else if ($id == "ingresosnoconsenolaboral") {
            
                            if ($aspecto == "aportesobligatorios") {

                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresosnoconselaboral = $_POST['idingresosnoconselaboral'];
                                $tiposubaspectoscedulascrear = $_POST['tiposubaspectoscedulascrear'];
                                $this->aportesobligatorioslaboralnoconse->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresosnoconselaboral, $tiposubaspectoscedulascrear);
        
                            }  else if ($aspecto == "aportesvoluntarios") {

                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresosnoconselaboral = $_POST['idingresosnoconselaboral'];
                                $this->aportesvoluntarioslaboralnoconse->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresosnoconselaboral);
        
                            }  else if ($aspecto == "recompensas") {

                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresosnoconselaboral = $_POST['idingresosnoconselaboral'];
                                $this->recompensaslaboralnoconse->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresosnoconselaboral);
        
                            }  else if ($aspecto == "recibidosgananciales") {

                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresosnoconselaboral = $_POST['idingresosnoconselaboral'];
                                $this->recibidosganancialeslaboralnoconse->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresosnoconselaboral);
        
                            } else if ($aspecto == "honorariosdesaproyec") {

                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresosnoconselaboral = $_POST['idingresosnoconselaboral'];
                                $this->honorariosdesaproyeclaboral->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresosnoconselaboral);
        
                            } else if ($aspecto == "aporteseconoedu") {

                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresosnoconselaboral = $_POST['idingresosnoconselaboral'];
                                $this->aporteseconoedulaboralnoconse->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresosnoconselaboral);
        
                            } else if ($aspecto == "campanniaspoliticas"){

                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresosnoconselaboral = $_POST['idingresosnoconselaboral'];
                                $this->campanniaspoliticaslaboralnoconse->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresosnoconselaboral);
        
                                
                            } else if ($aspecto == "indemnizaaseguradores"){

                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresosnoconselaboral = $_POST['idingresosnoconselaboral'];
                                $this->indemnizaaseguradoreslaboralnoconse->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresosnoconselaboral);
        
                            } else if ($aspecto == "agroingresoseguro"){

                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idingresosnoconselaboral = $_POST['idingresosnoconselaboral'];
                                $this->agroingresosegurolaboralnoconse->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idingresosnoconselaboral);
        
                            }
            
                        } else if ($id == "costogastoproce") {
            
                            if ($aspecto == "interesesprestamos") {

                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idcostogastosprocelaboral = $_POST['idcostogastosprocelaboral'];
                                $this->interesesprestamoslaboral->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idcostogastosprocelaboral);
        
                            } else if ($aspecto == "otroscostogastos") {

                                $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idcostogastosprocelaboral = $_POST['idcostogastosprocelaboral'];
                                $tiposubaspectoscedulascrear = $_POST['tiposubaspectoscedulascrear'];
                                $this->otroscostogastolaboral->crear($nombrecrearcedulas, $valoraspectoscedulascrear, $idcostogastosprocelaboral, $tiposubaspectoscedulascrear);
    
                            }  else if ($aspecto == "costofiscal") {

                                $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idcostogastosprocelaboral = $_POST['idcostogastosprocelaboral'];
                                $this->costofiscallaboral->crear($valoraspectoscedulascrear, $idcostogastosprocelaboral);
            
                            }
            
                        } else if ($id == "rentaliqpasece"){
                            
                            $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idrentanolaboral = $_POST['idrentanolaboral'];
                                $idrentaliqpasecelaboral = $this->rentaliqpasecelaboral->crear($valoraspectoscedulascrear);
                                $this->usuariorentaliqpasecelaboral->crear($idrentaliqpasecelaboral, $idrentanolaboral, $this->usuario->getid());
            
                        } else if ($id == "rentaexentadeduccion"){
                            $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                            $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                                $idrentanolaboral = $_POST['idrentanolaboral'];
                                $aspectoscedulascrear = $_POST['aspectoscedulascrear'];
                                $idrentaexededuccionlaboral = $this->rentaexededuccionlaboral->crear($nombrecrearcedulas,$valoraspectoscedulascrear, $aspectoscedulascrear);
                                $this->usuariorentaexededuccionlaboral->crear($idrentaexededuccionlaboral, $idrentanolaboral, $this->usuario->getid());
            
                        }
            
                    }
                    
                } else if ($clase == "cedulapensiones") {
            
                    if ($tipo == "ingresobruto") {
                        
                        if ($id == "ingresopensiones") {

                            $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                            $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                            $idingresobrutopensiones = $_POST['idingresobrutopensiones'];
                            $aspectoscedulascrear = $_POST['aspectoscedulascrear'];
                            $this->ingresospensiones->crear($nombrecrearcedulas,$valoraspectoscedulascrear,$idingresobrutopensiones,$aspectoscedulascrear);
                                        
                        } else if ($id == "devolucionesahorro"){

                            $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                            $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                            $idingresobrutopensiones = $_POST['idingresobrutopensiones'];
                            $this->devolucionesahorropensiones->crear($nombrecrearcedulas,$valoraspectoscedulascrear,$idingresobrutopensiones);
            
                        } else if ($id == "indemnizacionsustitutas"){

                            $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                            $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                            $idingresobrutopensiones = $_POST['idingresobrutopensiones'];
                            $this->indemnizacionsustitutaspensiones->crear($nombrecrearcedulas,$valoraspectoscedulascrear,$idingresobrutopensiones);
            
                        } else if ($id == "pensionesexterior") {

                            $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                            $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                            $idingresobrutopensiones = $_POST['idingresobrutopensiones'];
                            $this->pensionesexteriorpensiones->crear($nombrecrearcedulas,$valoraspectoscedulascrear,$idingresobrutopensiones);
                            
                        }
            
                    } else if ($tipo == "ingresonoconse") {
            
                        if ($id == "aportesobligatorios") {

                            $nombrecrearcedulas = $_POST['nombrecrearcedulas'];
                            $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                            $idingresonoconsepensiones = $_POST['idingresonoconsepensiones'];
                            $aspectoscedulascrear = $_POST['aspectoscedulascrear'];
                            $this->aportesobligatoriospensiones->crear($nombrecrearcedulas,$valoraspectoscedulascrear,$idingresonoconsepensiones, $aspectoscedulascrear);
                            
                            
                        }
            
                    } else if ($tipo == "rentaexenta") {
            
                        $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                        $idcedulapensiones = $_POST['idcedulapensiones'];
                        $idrentaexentapensiones = $this->rentaexentapensiones->crear($valoraspectoscedulascrear);
                        $this->usuariorentaexentapensiones->crear($idrentaexentapensiones, $idcedulapensiones, $this->usuario->getid());
            
                    }
            
                } else if ($clase == "ceduladividendosyparticipaciones") {
            
                    if ($tipo == "dividendosyparticipaciones") {
                        $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                        $idceduladiviparti = $_POST['idceduladiviparti'];
                        $iddiviparti2016 = $this->diviparti2016->crear($valoraspectoscedulascrear);
                        $this->usuariodiviparti2016->crear($iddiviparti2016, $idceduladiviparti, $this->usuario->getid());
            
                    } else if ($tipo == "subcedula1a") {
            
                        $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                        $idceduladiviparti = $_POST['idceduladiviparti'];
                        $idsubcedula1a = $this->subcedula1a->crear($valoraspectoscedulascrear);
                        $this->usuariosubcedula1a->crear($idsubcedula1a, $idceduladiviparti, $this->usuario->getid());
                        
                    }else if ($tipo == "subcedula2a") {
            
                        $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                        $idceduladiviparti = $_POST['idceduladiviparti'];
                        $idsubcedula2a = $this->subcedula2a->crear($valoraspectoscedulascrear);
                        $this->usuariosubcedula2a->crear($idsubcedula2a, $idceduladiviparti, $this->usuario->getid());
                        
                    }else if ($tipo == "ingresosnoconse") {
                        
                        $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                        $idceduladiviparti = $_POST['idceduladiviparti'];
                        $idingresonoconsedividendos = $this->ingresonoconsedividendos->crear($valoraspectoscedulascrear);
                        $this->usuarioingresonoconsedividendos->crear($idingresonoconsedividendos, $idceduladiviparti, $this->usuario->getid());
                        
            
                    }else if ($tipo == "rentaliquidaece") {
            
                        $valoraspectoscedulascrear = $_POST['valoraspectoscedulascrear'];
                        $idceduladiviparti = $_POST['idceduladiviparti'];
                        $idrentaliqpasecedividendos = $this->rentaliqpasecedividendos->crear($valoraspectoscedulascrear);
                        $this->usuariorentaliqpasecedividendos->crear($idrentaliqpasecedividendos, $idceduladiviparti, $this->usuario->getid());
                        
                        
                    }
                    
                } else if ($clase == "exogenas") {

                    $nombre_temporal = $_FILES['archivo']['tmp_name'];
                    $nombre = $_FILES['archivo']['name'];
                    $ruta = './app/views/assets/files/exogenas/'.$this->usuario->getnombre().$this->usuario->getapellido()."-".$nombre;
                    move_uploaded_file($nombre_temporal, $ruta);
                    $this->exogenas->crear($ruta, $tipo);

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