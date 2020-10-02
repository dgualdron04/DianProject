<?php

class Usuario extends Controller
{
    private $usuario;

    private $errors = array();

    private $mylist = false;

    public function __construct()
    {
        $this->usuario = $this->model('Usuario');
        $this->iniciarsesion();
    }

    public function index(){

        if (isset($_SESSION['email'])) {
            $this->usuario->setUser($this->traersesion());
            $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
        }else {

            $this->viewtemplate('usuario', 'index');
        }

    }

    public function registro()
    {
        

        if (isset($_SESSION['email'])) {
            
            
        } else if (!isset($_POST['nombreregistro'], $_POST['passwordregistro'], $_POST['correoregistro'])) {

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
        }else{
            if ($this->usuario->register($_POST['nombreregistro'], $_POST['apellidoregistro'], $_POST['correoregistro'], $_POST['passwordregistro'])) {
                /* echo "El registro salio exitoso."; */
                $this->errors['registron-error'] = "El Registro se Completo Satisfactoriamente,<br> ahora puede Iniciar Sesión";
                $this->errors['loading'] = true;
                echo json_encode($this->errors);
            }else{
                /* echo "El registro no salio exitoso."; */
                $this->errors['registroff-error'] = "El Registro no se Completo Satisfactoriamente";
                $this->errors['loading'] = true;
                echo json_encode($this->errors);
            }
        }

    }

    public function login()
    {

        if (isset($_SESSION['email'])) {
            echo "hay sesión";
            $this->usuario->setUser($this->traersesion());
            $this->viewtemplate('usuario', 'index');
        }else if(isset($_POST['correo']) && isset($_POST['password'])){
            $emailform = $_POST['correo'];
            $passform = $_POST['password'];
            if ($this->usuario->loginuser($emailform, $passform)) {
                
                $this->nombrarsesion($emailform);
                $this->usuario->setUser($this->traersesion());
                echo "el usuario esta logeado";
                
            } else {
                echo "usuario y/o pass incorrecta";
            }
        } else {
            echo "no hay formulario";
        }
        
    }

    public function logout()
    {
        $usersession = $this->model('Usersession');
        $usersession->closesession();
        header("location: ".constant('URL'));
        
    }

    public function listar()
    {
        if (isset($_SESSION['email'])) {
            $this->usuario->setUser($this->traersesion());

            if (strtolower($this->usuario->getnomrol()) == "coordinador") {

                $_POST['param'] = true;
            $this->viewtemplate('usuario', 'listar', $this->usuario->traerdatosusuario());
            
            } else {
                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
            }
        }else {

            $this->viewtemplate('usuario', 'index');
        }
        
    }

    public function traerusuarios()
    {

        if (isset($_SESSION['email'])) {
            $this->usuario->setUser($this->traersesion());
            if (strtolower($this->usuario->getnomrol()) == "coordinador") {

                if (isset($_POST['param']) && $_POST['param'] == true) {
                    $this->usuario->obtenerusuarios();
                }else {
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

            }else {

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
                
            }
        }
        else 
        {
            $this->viewtemplate('usuario', 'index');
        }
    }

    public function traerusuarioporid()
    {
        if (isset($_SESSION['email'])) {
            $this->usuario->setUser($this->traersesion());
            if (strtolower($this->usuario->getnomrol()) == "coordinador") {

                if (isset($_POST['param']) && $_POST['param'] == true) {
                    $this->usuario->obtenereliminarid($_POST['iduser']);
                }else {
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
            if (strtolower($this->usuario->getnomrol()) == "coordinador") {

                if (isset($_POST['param']) && $_POST['param'] == true) {
                    $this->usuario->obtenereditid($_POST['iduser']);
                }else {
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

            }else {

                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
                
            }
        }
        else 
        {
            $this->viewtemplate('usuario', 'index');
        }
    }

    public function eliminarusuario()
    {
        if (isset($_SESSION['email'])) {
            $this->usuario->setUser($this->traersesion());
            if (strtolower($this->usuario->getnomrol()) == "coordinador") {

                if (isset($_POST['param']) && $_POST['param'] == true) {
                    $this->usuario->eliminarusuario($_POST['iduser']);
                }else {
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




?>