<?php

class Usuario extends Controller
{
    private $usuario;

    private $errors = array();

    private $errorslogin = array();

    public function __construct()
    {
        $this->usuario = $this->model('Usuario');
        $this->iniciarsesion();
    }

    public function index()
    {

        if (isset($_SESSION['email'])) {
            $this->usuario->setUser($this->traersesion());
            $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
        } else {

            $this->viewtemplate('usuario', 'index');
        }
    }

    public function registro()
    {

        if (isset($_SESSION['email'])) {

            $this->usuario->setUser($this->traersesion());
            $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
        } else if (isset($_POST['param']) && $_POST['param'] == true) {

            if (!isset($_POST['nombreregistro'], $_POST['passwordregistro'], $_POST['correoregistro'])) {

                /* echo "No hay datos"; */
                $this->errors['nodata-error'] = "No hay datos.";
                $this->errors['loading'] = true;
                echo json_encode($this->errors);
            } else if (empty($_POST['nombreregistro']) || empty($_POST['passwordregistro']) || empty($_POST['correoregistro'])) {
                /* echo 'Formulario vacio'; */
                $this->errors['formempty-error'] = "Formulario vacío.";
                $this->errors['loading'] = true;
                echo json_encode($this->errors);
            } else if ($this->usuario->userexists($_POST['correoregistro'])) {
                /* echo "El Usuario Ya esta registrado"; */
                $this->errors['userexist-error'] = "El correo ya se encuentra registrado.";
                $this->errors['loading'] = true;
                echo json_encode($this->errors);
            } else {
                if ($this->usuario->register($_POST['nombreregistro'], $_POST['apellidoregistro'], $_POST['correoregistro'], $_POST['passwordregistro'])) {
                    /* echo "El registro salio exitoso."; */
                    $this->errors['registron-error'] = "El Registro se Completo Satisfactoriamente,<br> ahora puede Iniciar Sesión";
                    $this->errors['loading'] = true;
                    echo json_encode($this->errors);
                } else {
                    /* echo "El registro no salio exitoso."; */
                    $this->errors['registroff-error'] = "El Registro no se Completo Satisfactoriamente";
                    $this->errors['loading'] = true;
                    echo json_encode($this->errors);
                }
            }
        } else {

            $this->viewtemplate('usuario', 'index');
        }
    }

    public function login()
    {

        if (isset($_SESSION['email'])) {
            $this->usuario->setUser($this->traersesion());
            $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
        } else if (isset($_POST['param']) && $_POST['param'] == true) {

            if (isset($_POST['correo']) && isset($_POST['password'])) {
                $emailform = $_POST['correo'];
                $passform = $_POST['password'];
                if ($this->usuario->useractive($emailform)) {

                    if ($this->usuario->loginuser($emailform, $passform)) {

                        $this->nombrarsesion($emailform);
                        $this->usuario->setUser($this->traersesion());
                        $this->errorslogin['user-login'] = "El usuario esta logeado.";
                        echo json_encode($this->errorslogin);
                    } else {
                        $this->errorslogin['user-error'] = "El usuario y/o pass esta incorrecto.";
                        echo json_encode($this->errorslogin);
                    }

                } else{

                    $this->errorslogin['user-active'] = "El usuario no se encuentra activo.";
                    echo json_encode($this->errorslogin);

                }

            } else {
                $this->errorslogin['formempty-error'] = "Formulario vacío.";
                echo json_encode($this->errorslogin);
            }
        } else {

            $this->viewtemplate('usuario', 'index');
        }
    }

    public function logout()
    {
        $usersession = $this->model('Usersession');
        $usersession->closesession();
        header("location: " . constant('URL'));
    }

    public function listar()
    {
        if (isset($_SESSION['email'])) {
            $this->usuario->setUser($this->traersesion());

            if (strtolower($this->usuario->getnomrol()) == "coordinador" || strtolower($this->usuario->getnomrol()) == "superadmin") {


                $this->viewtemplate('usuario', 'listar', $this->usuario->traerdatosusuario());
            } else {
                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
            }
        } else {

            $this->viewtemplate('usuario', 'index');
        }
    }

    public function traerusuarios()
    {

        if (isset($_SESSION['email'])) {
            $this->usuario->setUser($this->traersesion());
            if (strtolower($this->usuario->getnomrol()) == "coordinador" || strtolower($this->usuario->getnomrol()) == "superadmin") {

                if (isset($_POST['param']) && $_POST['param'] == true) {

                    if (strtolower($this->usuario->getnomrol()) == "superadmin") {

                        $this->usuario->obtenerusuariosyadmin();
                    } else {

                        $this->usuario->obtenerusuarios();
                    }
                } else {
                    $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
                }
            } else {
                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
            }
        } else {
            $this->viewtemplate('usuario', 'index');
        }
    }

    public function crearusuarios()
    {
        if (isset($_SESSION['email'])) {
            $this->usuario->setUser($this->traersesion());
            if (strtolower($this->usuario->getnomrol()) == "coordinador" || strtolower($this->usuario->getnomrol()) == "superadmin") {

                if (isset($_POST['param']) && $_POST['param'] == true) {

                    $nombre = $_POST['nombrecrear'];
                    $apellido = $_POST['apellidocrear'];
                    $correo = $_POST['emailcrear'];
                    $cedula = $_POST['cedulacrear'];
                    $telefono = $_POST['telefonocrear'];
                    $pass = $_POST['passcrear'];
                    $rol = $this->usuario->obtenernumerorol($_POST['rolcrear']);
                    $estado = $this->usuario->obtenernumeroestado($_POST['estadocrear']);
                    $this->usuario->crearusuarios($nombre, $apellido, $cedula, $telefono, $correo, $pass, $rol, $estado);
                } else {

                    $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
                }
            } else {

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
            }
        } else {
            $this->viewtemplate('usuario', 'index');
        }
    }

    public function traerusuarioporid()
    {
        if (isset($_SESSION['email'])) {
            $this->usuario->setUser($this->traersesion());
            if (strtolower($this->usuario->getnomrol()) == "coordinador" || strtolower($this->usuario->getnomrol()) == "superadmin") {

                if (isset($_POST['param']) && $_POST['param'] == true) {
                    

                    if (strtolower($this->usuario->getnomrol()) == "superadmin") {
                        
                        $this->usuario->obtenereliminarcoordid($_POST['iduser']);
                    } else{
                        $this->usuario->obtenereliminarid($_POST['iduser']);
                    }

                } else {
                    $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
                }
            } else {
                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
            }
        } else {
            $this->viewtemplate('usuario', 'index');
        }
    }

    public function traerdatosporid()
    {
        if (isset($_SESSION['email'])) {
            $this->usuario->setUser($this->traersesion());
            if (strtolower($this->usuario->getnomrol()) == "coordinador" || strtolower($this->usuario->getnomrol()) == "superadmin") {

                if (isset($_POST['param']) && $_POST['param'] == true) {

                    if (strtolower($this->usuario->getnomrol()) == "superadmin") {
                        
                        $this->usuario->obtenereditidadmin($_POST['iduser']);
                    } else {
                        $this->usuario->obtenereditid($_POST['iduser']);
                    }

                } else {
                    $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
                }
            } else {
                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
            }
        } else {
            $this->viewtemplate('usuario', 'index');
        }
    }

    public function editarusuariosid()
    {
        if (isset($_SESSION['email'])) {
            $this->usuario->setUser($this->traersesion());
            if (strtolower($this->usuario->getnomrol()) == "coordinador" || strtolower($this->usuario->getnomrol()) == "superadmin") {
                if (isset($_POST['param']) && $_POST['param'] == true) {

                    $nombre = $_POST['nombreeditar'];
                    $apellido = $_POST['apellidoeditar'];
                    $correo = $_POST['emaileditar'];
                    $cedula = $_POST['cedulaeditar'];
                    $telefono = $_POST['telefonoeditar'];
                    $rol = $this->usuario->obtenernumerorol($_POST['roleditar']);
                    $estado = $this->usuario->obtenernumeroestado($_POST['estadoeditar']);
                    $code = $_POST['codeditar'];

                    $this->usuario->editarusuarios($nombre, $apellido, $cedula, $telefono, $correo, $rol, $estado, $code);
                } else {

                    $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
                }
            } else {
                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
            }
        } else {
            $this->viewtemplate('usuario', 'index');
        }
    }

    public function eliminarusuario()
    {
        if (isset($_SESSION['email'])) {
            $this->usuario->setUser($this->traersesion());
            if (strtolower($this->usuario->getnomrol()) == "coordinador" || strtolower($this->usuario->getnomrol()) == "superadmin") {

                if (isset($_POST['param']) && $_POST['param'] == true) {
                    $this->usuario->eliminarusuario($_POST['iduser']);
                } else {
                    $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
                }
            } else {
                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
            }
        } else {
            $this->viewtemplate('usuario', 'index');
        }
    }
}
