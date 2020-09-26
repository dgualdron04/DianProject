<?php

class Usuario extends Controller
{
    private $usuario;

    private $errors = array();

    public function __construct()
    {
        $this->usuario = $this->model('Usuario');
        $this->iniciarsesion();
    }

    public function index(){

        $this->viewtemplate('inicio', 'index', ['name' => "Admin"]);

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
            $this->viewtemplate('inicio', 'index');
        }else if(isset($_POST['correo']) && isset($_POST['password'])){
  
            $emailform = $_POST['correo'];
            $passform = $_POST['password'];
            if ($this->usuario->loginuser($emailform, $passform)) {

                
                $this->nombrarsesion($emailform);
                echo "el usuario esta logeado";
                
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


}




?>