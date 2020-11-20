<?php


class Cedulas extends Controller
{

    private $usuario;
    private $parametros;
    private $topes;
    private $cedulageneral;
    private $tipoprestacion;
    private $tipoaporteobligatorio;
    private $tipoaportevoluntario;
    private $tipopagoalimen;
    private $tipodeduccion;
    private $tipoindemnizacion;
    private $tipoprimacancilleria;
    private $tipootrosingresoscapital;
    private $tipoaporteobligatoriocapital;
    private $tipoaportevoluntariocapital;
    private $tiporentaexededuccioncapital;
    private $tipovalorbrutoventaslaboral;
    private $tipoaporteobligatoriolaboralnoconse;
    private $tipootroscostogastolaboral;
    private $tiporentaexededuccionlaboral;
    private $tipoingresopensiones;
    private $tipoaportesobligatoriospensiones;

    public function __construct()
    {
        $this->usuario = $this->model('Usuario');
        $this->cedulageneral = $this->model('Cedulageneral');
        $this->cedulapensiones = $this->model('Cedulapensiones');
        $this->tipoprestacion = $this->model('Tipoprestacion');
        $this->tipoaporteobligatorio = $this->model('Tipoaporteobligatorio');
        $this->tipoaportevoluntario = $this->model('Tipoaportevoluntario');
        $this->tipopagoalimen = $this->model('Tipopagoalimen');
        $this->tipodeduccion = $this->model('Tipodeduccion');
        $this->tipoindemnizacion = $this->model('Tipoindemnizacion');
        $this->tipoprimacancilleria = $this->model('Tipoprimacancilleria');
        $this->tipointeresesrendicapital = $this->model('Tipointeresesrendicapital');
        $this->tipootrosingresoscapital = $this->model('Tipootrosingresoscapital');
        $this->tipoaporteobligatoriocapital = $this->model('Tipoaporteobligatoriocapital');
        $this->tipoaportevoluntariocapital = $this->model('Tipoaportevoluntariocapital');
        $this->tipootroscostogastocapital = $this->model('Tipootroscostogastocapital');
        $this->tiporentaexededuccioncapital = $this->model('Tiporentaexededuccioncapital');
        $this->tipovalorbrutoventaslaboral = $this->model('Tipovalorbrutoventaslaboral');
        $this->tipoaporteobligatoriolaboralnoconse = $this->model('Tipoaporteobligatoriolaboralnoconse');
        $this->tipootroscostogastolaboral = $this->model('Tipootroscostogastolaboral');
        $this->tiporentaexededuccionlaboral = $this->model('Tiporentaexededuccionlaboral');
        $this->tipoingresopensiones = $this->model('Tipoingresopensiones');
        $this->tipoaportesobligatoriospensiones = $this->model('Tipoaportesobligatoriospensiones');
        parent::__construct();
        if (isset($_SESSION['email'])) {
            $this->usuario->setusuario($this->traersesion());
        } else {
            $fecha = getdate();
            $this->topes = $this->parametros->topes($fecha['year'] - 1);
        }
    }

    public function index()
    {

        if (isset($_SESSION['email'])) {
            if ((strtolower($this->usuario->getnomrol()) == "contador") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {
                $this->viewtemplate('cedulas', 'listar', $this->usuario->traerdatosusuario());
            } else {

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

                $cedulageneral = $this->cedulageneral->listar();

                $cedulapensiones = $this->cedulapensiones->listar();

                $data = [$cedulageneral, $cedulapensiones];

                $this->viewtemplate('cedulas', 'listar', $this->usuario->traerdatosusuario(), $data);
            } else {
                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
            }
        } else {
            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }
    }

    public function crear($cedula)
    {

        if (isset($_SESSION['email'])) {
            if ((strtolower($this->usuario->getnomrol()) == "contador") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {

                if (isset($_POST['param']) && $_POST['param'] == true) {

                    if (strtolower($cedula) == "cedulageneral") {

                        $rentacedulageneral = $_POST['rentacedulageneralcrear'];
                        $tiporentacedulageneral = $_POST['tiporentacedulageneralcrear'];
                        $aspectoscedulageneral = $_POST['aspectoscedulageneralcrear'];
                        $nombrecedulageneral = $_POST['nombrecedulageneralcrear'];
                        $descripcioncedulageneral = $_POST['descripcioncedulageneralcrear'];
                        $ayudacedulageneral = $_POST['ayudacedulageneralcrear'];

                        if (strtolower($rentacedulageneral) == "rentatrabajo") {

                            if (strtolower($tiporentacedulageneral) == "ingresobruto") {

                                if (strtolower($aspectoscedulageneral) == "tipoprestacion") {

                                    $this->tipoprestacion->crear($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral);
                                }
                            } else if (strtolower($tiporentacedulageneral) == "ingresosnoconstitutivos") {

                                if (strtolower($aspectoscedulageneral) == "tipoaporteobligatorio") {

                                    $this->tipoaporteobligatorio->crear($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral);
                                } else if (strtolower($aspectoscedulageneral) == "tipoaportevoluntario") {

                                    $this->tipoaportevoluntario->crear($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral);
                                } else if (strtolower($aspectoscedulageneral) == "tipopagoalimentacion") {

                                    $this->tipopagoalimen->crear($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral);
                                }
                            } else if (strtolower($tiporentacedulageneral) == "deducciones") {

                                if (strtolower($aspectoscedulageneral) == "tipodeduccion") {

                                    $this->tipodeduccion->crear($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral);
                                }
                            } else if (strtolower($tiporentacedulageneral) == "rentaexenta") {

                                if (strtolower($aspectoscedulageneral) == "tipoindemnizacion") {

                                    $this->tipoindemnizacion->crear($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral);
                                } else if (strtolower($aspectoscedulageneral) == "tipoprima") {

                                    $this->tipoprimacancilleria->crear($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral);
                                }
                            }
                        } else if (strtolower($rentacedulageneral) == "rentacapital") {

                            if (strtolower($tiporentacedulageneral) == "ingresobruto") {

                                if (strtolower($aspectoscedulageneral) == "tipointeresesrendimientos") {

                                    $this->tipointeresesrendicapital->crear($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral);
                                } else if (strtolower($aspectoscedulageneral) == "tipootrosingresos") {

                                    $this->tipootrosingresoscapital->crear($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral);
                                }
                            } else if (strtolower($tiporentacedulageneral) == "ingresosnoconstitutivos") {

                                if (strtolower($aspectoscedulageneral) == "tipoaporteobligatorio") {

                                    $this->tipoaporteobligatoriocapital->crear($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral);
                                } else if (strtolower($aspectoscedulageneral) == "tipoaportevoluntario") {

                                    $this->tipoaportevoluntariocapital->crear($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral);
                                }
                            } else if (strtolower($tiporentacedulageneral) == "costosydeducciones") {

                                if (strtolower($aspectoscedulageneral) == "tipocostosgastos") {

                                    $this->tipootroscostogastocapital->crear($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral);
                                }
                            } else if (strtolower($tiporentacedulageneral) == "rentaexentadeduccion") {

                                if (strtolower($aspectoscedulageneral) == "tiporentaexentadeduccion") {

                                    $this->tiporentaexededuccioncapital->crear($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral);
                                }
                            }
                        } else if (strtolower($rentacedulageneral) == "rentanolaborales") {

                            if (strtolower($tiporentacedulageneral) == "ingresobruto") {

                                if (strtolower($aspectoscedulageneral) == "tipovalorbruto") {

                                    $this->tipovalorbrutoventaslaboral->crear($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral);
                                }
                            } else if (strtolower($tiporentacedulageneral) == "ingresosnoconstitutivos") {

                                if (strtolower($aspectoscedulageneral) == "tipoaporteobligatorio") {

                                    $this->tipoaporteobligatoriolaboralnoconse->crear($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral);
                                }
                            } else if (strtolower($tiporentacedulageneral) == "costesdeduccionesprocedentes") {

                                if (strtolower($aspectoscedulageneral) == "tipootroscostosgastos") {

                                    $this->tipootroscostogastolaboral->crear($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral);
                                }
                            } else if (strtolower($tiporentacedulageneral) == "rentaexentadeduccion") {

                                if (strtolower($aspectoscedulageneral) == "tiporentaexentadeduccion") {

                                    $this->tiporentaexededuccionlaboral->crear($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral);
                                }
                            }
                        }
                    } else if (strtolower($cedula) == "cedulapensiones") {

                        $ingresocedulapensiones = $_POST['ingresoscedulapensionescrear'];
                        $tipoingresocedulapensiones = $_POST['tipoingresopensionescrear'];
                        $nombrecedulapensiones = $_POST['nombrepensionescrear'];
                        $descripcioncedulapensiones = $_POST['descripcionpensionescrear'];
                        $ayudacedulapensiones = $_POST['ayudapensionescrear'];

                        if (strtolower($ingresocedulapensiones) == "ingresobruto"){

                            if (strtolower($tipoingresocedulapensiones) == "tipoingresopensiones") {

                                $this->tipoingresopensiones->crear($nombrecedulapensiones, $descripcioncedulapensiones, $ayudacedulapensiones);

                            }

                        } else if (strtolower($ingresocedulapensiones) == "ingresonoconstitutivo") {

                            if (strtolower($tipoingresocedulapensiones) == "tipoaporteobligatorio") {

                                $this->tipoaportesobligatoriospensiones->crear($nombrecedulapensiones, $descripcioncedulapensiones, $ayudacedulapensiones);

                            }

                        }
                        
                        echo $_POST['ingresoscedulapensionescrear'];
                        echo "<br>";
                        echo $_POST['tipoingresopensionescrear'];
                        echo "<br>";
                        echo $_POST['nombrepensionescrear'];
                        echo "<br>";
                        echo $_POST['descripcionpensionescrear'];
                        echo "<br>";
                        echo $_POST['ayudapensionescrear'];
                        echo "<br>";
                    }
                } else {

                    $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
                }
            } else {
                $this->viewtemplate('errores', 'error403', $this->usuario->traerdatosusuario());
            }
        } else {
            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }
    }

    public function editar($cedula, $renta, $tiporenta, $aspecto, $id)
    { 

        if (isset($_SESSION['email'])) {
            if ((strtolower($this->usuario->getnomrol()) == "contador") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {

                if (isset($_POST['param']) && $_POST['param'] == true) {

                    if (strtolower($cedula) == "cedulageneral") {

                        if (strtolower($renta) == "rentadetrabajo") {

                            if (strtolower($tiporenta) == "ingresobruto") {

                                if (strtolower($aspecto) == "tipodeprestacion") {

                                    $this->tipoprestacion->editar($id);

                                }

                            } else if (strtolower($tiporenta) == "ingresonoconstitutivos") {

                                if (strtolower($aspecto) == "tipodeaporteobligatorio") {

                                    $this->tipoaporteobligatorio->editar($id);

                                } else if (strtolower($aspecto) == "tipodeaportevoluntario") {

                                    $this->tipoaportevoluntario->editar($id);

                                } else if (strtolower($aspecto) == "tipopagoalimenticio") {

                                    $this->tipopagoalimen->editar($id);

                                }

                            } else if (strtolower($tiporenta) == "deducciones") {

                                if (strtolower($aspecto) == "tipodededuccion") {

                                    $this->tipodeduccion->editar($id);

                                }

                            } else if (strtolower($tiporenta) == "rentaexenta") {

                                if (strtolower($aspecto) == "tipodeindemnizacion") {

                                    $this->tipoindemnizacion->editar($id);

                                } else if (strtolower($aspecto) == "tipodeprima") {

                                    $this->tipoprimacancilleria->editar($id);

                                }
                            }
                        } else if (strtolower($renta) == "rentadecapital") {

                            if (strtolower($tiporenta) == "ingresobruto") {

                                if (strtolower($aspecto) == "tipointeresesrendimiento") {

                                    $this->tipointeresesrendicapital->editar($id);

                                } else if (strtolower($aspecto) == "tipootrosingresos") {

                                    $this->tipootrosingresoscapital->editar($id);

                                }

                            } else if (strtolower($tiporenta) == "ingresonoconstitutivos") {

                                if (strtolower($aspecto) == "tipodeaporteobligatorio") {

                                    $this->tipoaporteobligatoriocapital->editar($id);

                                } else if (strtolower($aspecto) == "tipodeaportevoluntario") {

                                    $this->tipoaportevoluntariocapital->editar($id);

                                }

                            } else if (strtolower($tiporenta) == "costosydeduccionesprocedentes") {

                                if (strtolower($aspecto) == "tipootroscostosgastos") {

                                    $this->tipootroscostogastocapital->editar($id);

                                }

                            } else if (strtolower($tiporenta) == "rentaexentadeduccion") {

                                if (strtolower($aspecto) == "tiporentaexentadeduccion") {

                                    $this->tiporentaexededuccioncapital->editar($id);

                                }
                            }
                        } else if (strtolower($renta) == "rentanolaboral") {

                            if (strtolower($tiporenta) == "ingresobruto") {

                                if (strtolower($aspecto) == "tipovalorbrutodeventas") {

                                    $this->tipovalorbrutoventaslaboral->editar($id);

                                }

                            } else if (strtolower($tiporenta) == "ingresonoconstitutivos") {

                                if (strtolower($aspecto) == "tipodeaporteobligatorio") {

                                    $this->tipoaporteobligatoriolaboralnoconse->editar($id);

                                }

                            } else if (strtolower($tiporenta) == "costosydeduccionesprocedentes") {

                                if (strtolower($aspecto) == "tipootroscostosgastos") {

                                    $this->tipootroscostogastolaboral->editar($id);

                                }

                            } else if (strtolower($tiporenta) == "rentaexentadeduccion") {

                                if (strtolower($aspecto) == "tiporentaexentadeduccion") {

                                    $this->tiporentaexededuccionlaboral->editar($id);

                                }
                            }
                        }
                    } else if (strtolower($cedula) == "cedulapensiones") {

                        if (strtolower($renta) == "ingresobruto") {

                            if (strtolower($tiporenta) == "tipoingresodepensiones") {

                                if (strtolower($aspecto) == "pensiones") {

                                    $this->tipoingresopensiones->editar($id);

                                }

                            }

                        } else if (strtolower($renta) == "ingresosnoconstitutivos") {

                            if (strtolower($tiporenta) == "tipodeaporteobligatorio") {

                                    if (strtolower($aspecto) == "pensiones") {

                                        $this->tipoaportesobligatoriospensiones->editar($id);

                                    }

                            }

                        }

                    }

                } else {

                    $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

                }
            } else {

                $this->viewtemplate('errores', 'error403', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);

        }
    }

    public function editarcedulas($cedula, $renta, $tiporenta, $aspecto, $id){

        if (isset($_SESSION['email'])) {
            if ((strtolower($this->usuario->getnomrol()) == "contador") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {

                if (isset($_POST['param']) && $_POST['param'] == true) {

                    

                    if (strtolower($cedula) == "cedulageneral") {

                        $nombrecedulageneral = $_POST['nombrecedulageneraleditar'];
                        $descripcioncedulageneral = $_POST['descripcioncedulageneraleditar'];
                        $ayudacedulageneral = $_POST['ayudacedulageneraleditar'];

                        if (strtolower($renta) == "rentadetrabajo") {

                            if (strtolower($tiporenta) == "ingresobruto") {

                                if (strtolower($aspecto) == "tipodeprestacion") {

                                    $this->tipoprestacion->editartipoprestacion($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral, $id);

                                }

                            } else if (strtolower($tiporenta) == "ingresosnoconstitutivos") {

                                if (strtolower($aspecto) == "tipoaporteobligatorio") {

                                    $this->tipoaporteobligatorio->editartipoaporteobligatorio($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral, $id);

                                } else if (strtolower($aspecto) == "tipoaportevoluntario") {

                                    $this->tipoaportevoluntario->editartipodeaportevoluntario($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral, $id);

                                } else if (strtolower($aspecto) == "tipopagodealimentacion") {

                                    $this->tipopagoalimen->editartipopagodealimentacion($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral, $id);

                                }

                            } else if (strtolower($tiporenta) == "deducciones") {

                                if (strtolower($aspecto) == "tipodededucciones") {

                                    $this->tipodeduccion->editartipodededucciones($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral, $id);

                                }

                            } else if (strtolower($tiporenta) == "rentaexenta") {

                                if (strtolower($aspecto) == "tipodeindemnizacion") {

                                    $this->tipoindemnizacion->editartipodeindemnizacion($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral, $id);

                                } else if (strtolower($aspecto) == "tipodeprima") {

                                    $this->tipoprimacancilleria->editartipodeprima($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral, $id);

                                }
                            }
                        } else if (strtolower($renta) == "rentadecapital") {

                            if (strtolower($tiporenta) == "ingresobruto") {

                                if (strtolower($aspecto) == "tipointeresrendimiento") {

                                    $this->tipointeresesrendicapital->editartipointeresrendimiento($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral, $id);

                                } else if (strtolower($aspecto) == "tipootrosingresos") {

                                    $this->tipootrosingresoscapital->editartipootrosingresos($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral, $id);

                                }

                            } else if (strtolower($tiporenta) == "ingresonoconstitutivos") {

                                if (strtolower($aspecto) == "tipodeaporteobligatorio") {

                                    $this->tipoaporteobligatoriocapital->editartipodeaporteobligatorio($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral, $id);

                                } else if (strtolower($aspecto) == "tipodeaportevoluntario") {

                                    $this->tipoaportevoluntariocapital->editartipodeaportevoluntario($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral, $id);

                                }

                            } else if (strtolower($tiporenta) == "costosydeduccionesprocedentes") {

                                if (strtolower($aspecto) == "tipootroscostosgastos") {

                                    $this->tipootroscostogastocapital->editartipootroscostosgastos($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral, $id);

                                }

                            } else if (strtolower($tiporenta) == "rentaexentadeduccion") {

                                if (strtolower($aspecto) == "tiporentaexentadeduccion") {

                                    $this->tiporentaexededuccioncapital->editartiporentaexentadeduccion($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral, $id);

                                }
                            }
                        } else if (strtolower($renta) == "rentanolaboral") {

                            if (strtolower($tiporenta) == "ingresobruto") {

                                if (strtolower($aspecto) == "tipovalorbrutodeventas") {

                                    $this->tipovalorbrutoventaslaboral->editartipovalorbrutodeventas($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral, $id);

                                }

                            } else if (strtolower($tiporenta) == "ingresonoconstitutivos") {

                                if (strtolower($aspecto) == "tipodeaporteobligatorio") {

                                    $this->tipoaporteobligatoriolaboralnoconse->editartipodeaporteobligatorio($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral, $id);

                                }

                            } else if (strtolower($tiporenta) == "costosydeduccionesprocedentes") {

                                if (strtolower($aspecto) == "tipootroscostosgastos") {

                                    $this->tipootroscostogastolaboral->editartipootroscostosgastos($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral, $id);

                                }

                            } else if (strtolower($tiporenta) == "rentaexentadeduccion") {

                                if (strtolower($aspecto) == "tiporentaexentadeduccion") {

                                    $this->tiporentaexededuccionlaboral->editartiporentaexentadeduccion($nombrecedulageneral, $descripcioncedulageneral, $ayudacedulageneral, $id);
                                }
                            }
                        }
                    } else if (strtolower($cedula) == "cedulapensiones") {
                        
                        $nombrecedulapensiones = $_POST['nombrecedulapensioneseditar'];
                        $descripcioncedulapensiones = $_POST['descripcioncedulapensioneseditar'];
                        $ayudacedulapensiones = $_POST['ayudacedulapensioneseditar'];

                        if (strtolower($renta) == "ingresobruto") {
                            
                            if (strtolower($tiporenta) == "tipodeingresosdepensiones") {

                                if (strtolower($aspecto) == "pensiones") {

                                    $this->tipoingresopensiones->editaringresopensiones($nombrecedulapensiones, $descripcioncedulapensiones, $ayudacedulapensiones, $id);

                                }
                            
                            }

                        } else if (strtolower($renta) == "ingresosnoconstitutivos") {

                            if (strtolower($tiporenta) == "tipodeaporteobligatorio") {
                                
                                if (strtolower($aspecto) == "pensiones") {
                                    
                                    $this->tipoaportesobligatoriospensiones->editartipoaporteobligatorio($nombrecedulapensiones, $descripcioncedulapensiones, $ayudacedulapensiones, $id);

                                }

                            }

                        }

                    }

                } else {

                    $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

                }
            } else {

                $this->viewtemplate('errores', 'error403', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);

        }

    }

    public function eliminar($cedula, $renta, $tiporenta, $aspecto, $id){

        if (isset($_SESSION['email'])) {
            if ((strtolower($this->usuario->getnomrol()) == "contador") || (strtolower($this->usuario->getnomrol()) == "coordinador")) {

                if (isset($_POST['param']) && $_POST['param'] == true) {

                    if (strtolower($cedula) == "cedulageneral") {

                        if (strtolower($renta) == "rentadetrabajo") {

                            if (strtolower($tiporenta) == "ingresobruto") {

                                if (strtolower($aspecto) == "tipodeprestacion") {

                                    $this->tipoprestacion->eliminar($id);

                                }

                            } else if (strtolower($tiporenta) == "ingresosnoconstitutivos") {

                                if (strtolower($aspecto) == "tipoaporteobligatorio") {

                                    $this->tipoaporteobligatorio->eliminar($id);

                                } else if (strtolower($aspecto) == "tipoaportevoluntario") {

                                    $this->tipoaportevoluntario->eliminar($id);

                                } else if (strtolower($aspecto) == "tipopagodealimentacion") {
                                    
                                    $this->tipopagoalimen->eliminar($id);

                                }

                            } else if (strtolower($tiporenta) == "deducciones") {

                                if (strtolower($aspecto) == "tipodededucciones") {

                                    $this->tipodeduccion->eliminar($id);

                                }

                            } else if (strtolower($tiporenta) == "rentaexenta") {

                                if (strtolower($aspecto) == "tipodeindemnizacion") {

                                    $this->tipoindemnizacion->eliminar($id);

                                } else if (strtolower($aspecto) == "tipodeprima") {

                                    $this->tipoprimacancilleria->eliminar($id);

                                }
                            }
                        } else if (strtolower($renta) == "rentadecapital") {

                            if (strtolower($tiporenta) == "ingresobruto") {

                                if (strtolower($aspecto) == "tipointeresrendimiento") {

                                    $this->tipointeresesrendicapital->eliminar($id);

                                } else if (strtolower($aspecto) == "tipootrosingresos") {

                                    $this->tipootrosingresoscapital->eliminar($id);

                                }

                            } else if (strtolower($tiporenta) == "ingresonoconstitutivos") {

                                if (strtolower($aspecto) == "tipodeaporteobligatorio") {

                                    $this->tipoaporteobligatoriocapital->eliminar($id);

                                } else if (strtolower($aspecto) == "tipodeaportevoluntario") {

                                    $this->tipoaportevoluntariocapital->eliminar($id);

                                }

                            } else if (strtolower($tiporenta) == "costosydeduccionesprocedentes") {

                                if (strtolower($aspecto) == "tipootroscostosgastos") {

                                    $this->tipootroscostogastocapital->eliminar($id);

                                }

                            } else if (strtolower($tiporenta) == "rentaexentadeduccion") {

                                if (strtolower($aspecto) == "tiporentaexentadeduccion") {

                                    $this->tiporentaexededuccioncapital->eliminar($id);

                                }
                            }
                        } else if (strtolower($renta) == "rentanolaboral") {

                            if (strtolower($tiporenta) == "ingresobruto") {

                                if (strtolower($aspecto) == "tipovalorbrutodeventas") {

                                    $this->tipovalorbrutoventaslaboral->eliminar($id);

                                }

                            } else if (strtolower($tiporenta) == "ingresonoconstitutivos") {

                                if (strtolower($aspecto) == "tipodeaporteobligatorio") {

                                    $this->tipoaporteobligatoriolaboralnoconse->eliminar($id);

                                }

                            } else if (strtolower($tiporenta) == "costosydeduccionesprocedentes") {

                                if (strtolower($aspecto) == "tipootroscostosgastos") {

                                    $this->tipootroscostogastolaboral->eliminar($id);

                                }

                            } else if (strtolower($tiporenta) == "rentaexentadeduccion") {

                                if (strtolower($aspecto) == "tiporentaexentadeduccion") {

                                    $this->tiporentaexededuccionlaboral->eliminar($id);
                                }
                            }
                        }
                    } else if (strtolower($cedula) == "cedulapensiones") {

                        if (strtolower($renta) == "ingresobruto") {
                            
                            if (strtolower($tiporenta) == "tipodeingresosdepensiones") {

                                if (strtolower($aspecto) == "pensiones") {

                                    $this->tipoingresopensiones->eliminar($id);

                                }
                            
                            }

                        } else if (strtolower($renta) == "ingresosnoconstitutivos") {

                            if (strtolower($tiporenta) == "tipodeaporteobligatorio") {
                                
                                if (strtolower($aspecto) == "pensiones") {
                                    
                                    $this->tipoaportesobligatoriospensiones->eliminar($id);

                                }

                            }

                        }

                    }

                } else {

                    $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

                }
            } else {

                $this->viewtemplate('errores', 'error403', $this->usuario->traerdatosusuario());

            }
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);

        }

    }
}
