<?php

class Usuario extends Controller
{
    private $usuario;
    private $declaracion;
    private $parametros;
    private $topes;

    private $errors = array();

    private $errorslogin = array();

    public function __construct(){
        $this->usuario = $this->model('Usuario');
        parent::__construct();
        if (isset($_SESSION['email'])) {
            $this->usuario->setusuario($this->traersesion());
        }else{
            $fecha = getdate();
            $this->parametros = $this->model('Parametros');
            $this->topes = $this->parametros->topes($fecha['year']-1);
        }
    }

    public function index(){

        if (isset($_SESSION['email'])) {
            
            if (strtolower($this->usuario->getnomrol()) == "declarante") {
                $this->declaracion = $this->model('Declaracion');
                echo '<script> document.location.href = "./declaracion/listar/'.$this->usuario->getid().'" </script>';
                /* $declaraciones = $this->declaracion->listar($this->usuario->getid(), $this->usuario->getnomrol());
                $this->viewtemplate('declaracion', 'listar', $this->usuario->traerdatosusuario(), $declaraciones); */
            }else if (strtolower($this->usuario->getnomrol()) == "contador") {
                echo '<script> document.location.href = "./declaracion/revision/2019" </script>';
                $this->viewtemplate('declaracion', 'revision', $this->usuario->traerdatosusuario());
            }else if (strtolower($this->usuario->getnomrol()) == "superadmin" || strtolower($this->usuario->getnomrol()) == "coordinador"){

                $this->viewtemplate('usuario', 'listar', $this->usuario->traerdatosusuario());

            }else{
                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
            }

        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }

    }

    public function listar(){

        if (isset($_SESSION['email'])) {

            if (strtolower($this->usuario->getnomrol()) == "coordinador" || strtolower($this->usuario->getnomrol()) == "superadmin") {

                $this->viewtemplate('usuario', 'listar', $this->usuario->traerdatosusuario());

            } else {
                $this->viewtemplate('errores', 'error403', $this->usuario->traerdatosusuario());
            }
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }

    }

    public function listarusuarios(){

        if (isset($_SESSION['email'])) {

            if (strtolower($this->usuario->getnomrol()) == "coordinador" || strtolower($this->usuario->getnomrol()) == "superadmin") {

                if (isset($_POST['param']) && $_POST['param'] == true) {

                        $this->usuario->listar();

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

    public function crear(){
        if (isset($_SESSION['email'])) {
            
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

                $this->viewtemplate('errores', 'error403', $this->usuario->traerdatosusuario());
            }
        } else {
            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }
    }

    public function editar($id){

        if (isset($_SESSION['email'])) {

            if (strtolower($this->usuario->getnomrol()) == "coordinador" || strtolower($this->usuario->getnomrol()) == "superadmin") {

                if (isset($_POST['param']) && $_POST['param'] == true) {

                        $this->usuario->editarusuario($id);

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

    public function editarusuarios($id){

        if (isset($_SESSION['email'])) {

            if (strtolower($this->usuario->getnomrol()) == "coordinador" || strtolower($this->usuario->getnomrol()) == "superadmin") {
                if (isset($_POST['param']) && $_POST['param'] == true) {

                    $nombre = $_POST['nombreeditar'];
                    $apellido = $_POST['apellidoeditar'];
                    $correo = $_POST['emaileditar'];
                    $cedula = $_POST['cedulaeditar'];
                    $telefono = $_POST['telefonoeditar'];
                    $rol = $this->usuario->obtenernumerorol($_POST['roleditar']);
                    $estado = $this->usuario->obtenernumeroestado($_POST['estadoeditar']);

                    $this->usuario->editarusuarios($nombre, $apellido, $cedula, $telefono, $correo, $rol, $estado, $id);
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

            if (strtolower($this->usuario->getnomrol()) == "coordinador" || strtolower($this->usuario->getnomrol()) == "superadmin") {

                if (isset($_POST['param']) && $_POST['param'] == true) {
                    $this->usuario->eliminarusuario($id);
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

    public function iniciarsesion(){
        if (isset($_SESSION['email'])) {

            $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
        
        } else if (isset($_POST['param']) && $_POST['param'] == true) {

            if (isset($_POST['correo']) && isset($_POST['password'])) {

                $emailform = $_POST['correo'];
                $passform = $_POST['password'];
                
                if ($this->usuario->usuarioactivo($emailform)) {

                    if ($this->usuario->iniciarsesion($emailform, $passform)) {

                        $this->nombrarsesion($emailform);
                        $this->usuario->setusuario($this->traersesion());
                        $this->errorslogin['user-login'] = "El usuario esta logeado.";
                        echo json_encode($this->errorslogin);
                        
                    } else {

                        $this->errorslogin['user-error'] = "El usuario y/o pass esta incorrecto.";
                        echo json_encode($this->errorslogin);

                    }

                } else {

                    $this->errorslogin['user-active'] = "El usuario no se encuentra activo o no existe.";
                    echo json_encode($this->errorslogin);

                }

            } else {

                $this->errorslogin['formempty-error'] = "Formulario vacío.";
                echo json_encode($this->errorslogin);

            }

        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);
            
        }
    }    

    public function cerrarsesion(){
        $usersession = $this->model('Usersession');
        $usersession->closesession();
        header("location: " . constant('URL'));
    }

    public function registrarusuario(){

        if (isset($_SESSION['email'])) {

            $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());

        } else if (isset($_POST['param']) && $_POST['param'] == true) {

            if (!isset($_POST['nombreregistro'], $_POST['passwordregistro'], $_POST['correoregistro'])) {

                //echo "No hay datos";
                $this->errors['nodata-error'] = "No hay datos.";
                $this->errors['loading'] = true;
                echo json_encode($this->errors);

            } else if (empty($_POST['nombreregistro']) || empty($_POST['passwordregistro']) || empty($_POST['correoregistro'])) {

                //echo 'Formulario vacio';
                $this->errors['formempty-error'] = "Formulario vacío.";
                $this->errors['loading'] = true;
                echo json_encode($this->errors);

            } else if ($this->usuario->userexist($_POST['correoregistro'])) {

                //echo "El Usuario Ya esta registrado";
                $this->errors['userexist-error'] = "El correo ya se encuentra registrado.";
                $this->errors['loading'] = true;
                echo json_encode($this->errors);

            } else {

                if ($this->usuario->registrarusuario($_POST['nombreregistro'], $_POST['apellidoregistro'], $_POST['correoregistro'], $_POST['passwordregistro'])) {
                    
                    //echo "El registro salio exitoso.";
                    $this->errors['registron-error'] = "El Registro se Completo Satisfactoriamente,<br> ahora puede Iniciar Sesión";
                    $this->errors['loading'] = true;
                    echo json_encode($this->errors);

                } else {

                    //echo "El registro no salio exitoso.";
                    $this->errors['registroff-error'] = "El Registro no se Completo Satisfactoriamente";
                    $this->errors['loading'] = true;
                    echo json_encode($this->errors);

                }
            }
            
        } else {

            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }

    }

    public function perfil(){
        if (isset($_SESSION['email'])) {
            if (strtolower($this->usuario->getnomrol()) == "coordinador" || strtolower($this->usuario->getnomrol()) == "superadmin" || strtolower($this->usuario->getnomrol()) == "declarante" ) {
                $this->viewtemplate('usuario', 'perfil', $this->usuario->traerdatosusuario());
            }else{
                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario(), $this->topes);
            }
        } else {
            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }
    }

    public function editarperfil(){

        if (isset($_SESSION['email'])) {
            if (strtolower($this->usuario->getnomrol()) == "coordinador" || strtolower($this->usuario->getnomrol()) == "superadmin" || strtolower($this->usuario->getnomrol()) == "declarante" ) {
                if (isset($_POST['param']) && $_POST['param'] == true) {

                    if (isset($_POST['idperfil']) && $this->usuario->getid() == substr($_POST['idperfil'], 65)) {
                    
                        $nombre = $_POST['nombresperfil'];
                        $apellido = $_POST['apellidosperfil'];
                        $cedula = $_POST['cedulaperfil'];
                        $telefono = $_POST['telefonoperfil'];
                        $id = substr($_POST['idperfil'], 65);
                        $this->usuario->editarperfil($nombre, $apellido, $cedula, $telefono, $id);
                    }

                } else {
                    $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
                }
            }else{
            $this->viewtemplate('usuario', 'index', null, $this->topes);
            }
        } else {
            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }

    }

    public function cambiarpass(){
        if (isset($_SESSION['email'])) {

            if (isset($_POST['param']) && $_POST['param'] == true) {

                if (isset($_POST['idpss']) && $this->usuario->getid() == substr($_POST['idpss'], 65)) {

                    $email = $this->usuario->getcorreo();
                    $passantigua = $_POST['passact'];
                    $passnuev = $_POST['passnuev'];
                    $passnuev2 = $_POST['confirmpassnuev'];
                    $id = substr($_POST['idpss'], 65);

                    if ($this->usuario->loginuser($email, $passantigua)) {

                        $this->usuario->cambiarpass($passnuev, $id);

                    } else{

                        //Mandar mensaje de que la clave actual no coincide :)

                    }
                    
                }

            }   else {
                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
            }
        }else {
            $this->viewtemplate('usuario', 'index', null, $this->topes);
        }
    }

    /* public function index()
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

                //echo "No hay datos";
                $this->errors['nodata-error'] = "No hay datos.";
                $this->errors['loading'] = true;
                echo json_encode($this->errors);
            } else if (empty($_POST['nombreregistro']) || empty($_POST['passwordregistro']) || empty($_POST['correoregistro'])) {
                //echo 'Formulario vacio';
                $this->errors['formempty-error'] = "Formulario vacío.";
                $this->errors['loading'] = true;
                echo json_encode($this->errors);
            } else if ($this->usuario->userexists($_POST['correoregistro'])) {
                //echo "El Usuario Ya esta registrado";
                $this->errors['userexist-error'] = "El correo ya se encuentra registrado.";
                $this->errors['loading'] = true;
                echo json_encode($this->errors);
            } else {
                if ($this->usuario->register($_POST['nombreregistro'], $_POST['apellidoregistro'], $_POST['correoregistro'], $_POST['passwordregistro'])) {
                    //echo "El registro salio exitoso.";
                    $this->errors['registron-error'] = "El Registro se Completo Satisfactoriamente,<br> ahora puede Iniciar Sesión";
                    $this->errors['loading'] = true;
                    echo json_encode($this->errors);
                } else {
                    //echo "El registro no salio exitoso.";
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


    public function perfil(){
        if (isset($_SESSION['email'])) {
            $this->usuario->setUser($this->traersesion());
                $this->viewtemplate('usuario', 'perfil', $this->usuario->traerdatosusuario());
        } else {
            $this->viewtemplate('usuario', 'index');
        }
    }

    public function editarperfil(){
        if (isset($_SESSION['email'])) {
            $this->usuario->setUser($this->traersesion());
            if (isset($_POST['param']) && $_POST['param'] == true) {

                if (isset($_POST['idperfil']) && $this->usuario->getid() == substr($_POST['idperfil'], 65)) {
                    
                    $nombre = $_POST['nombresperfil'];
                    $apellido = $_POST['apellidosperfil'];
                    $cedula = $_POST['cedulaperfil'];
                    $telefono = $_POST['telefonoperfil'];
                    $id = substr($_POST['idperfil'], 65);
                    $this->usuario->editarperfil($nombre, $apellido, $cedula, $telefono, substr($id, 65));
                }

            } else {
                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
            }
        } else {
            $this->viewtemplate('usuario', 'index');
        }
    }

    public function cambiarpass(){
        if (isset($_SESSION['email'])) {
            $this->usuario->setUser($this->traersesion());
            if (isset($_POST['param']) && $_POST['param'] == true) {

                if (isset($_POST['idpss']) && $this->usuario->getid() == substr($_POST['idpss'], 65)) {

                    $email = $this->usuario->getcorreo();
                    $passantigua = $_POST['passact'];
                    $passnuev = $_POST['passnuev'];
                    $passnuev2 = $_POST['confirmpassnuev'];
                    $id = substr($_POST['idpss'], 65);

                    if ($this->usuario->loginuser($email, $passantigua)) {

                        $this->usuario->cambiarpass($passnuev, $id);

                    } else{

                        //Mandar mensaje de que la clave actual no coincide :)

                    }
                    
                }

            }   else {
                $this->viewtemplate('usuario', 'index', $this->usuario->traerdatosusuario());
            }
        }else {
            $this->viewtemplate('usuario', 'index');
        }
    } */
}
