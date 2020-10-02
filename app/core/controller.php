<?php

class Controller
{   
    private $usersession;


    public function iniciarsesion(){
        $this->usersession = $this->model('Usersession');
        $this->usersession->iniciarsession();
    }

    public function nombrarsesion($email){
        $this->usersession->setcurrentuser($email);
    }

    public function traersesion(){
        return $this->usersession->getcurrentuser();
    }

    public function model($model)
    {
        require_once './app/models/'.$model.'model.php';
        $namemodel = $model.'model';
        return new $namemodel();
    }

    public function view($view, $data = [])
    {   
        
        require_once './app/views/'. $view .'.php';
    }

    public function viewtemplate($controllert, $methodt, $infouser = [], $data = [])
    {   

        if (isset($_SESSION['email'])) {

            require_once './app/views/template/index.php';

        } else {

            require_once './app/views/principal/index.php';

        }

        
    }

}

?>