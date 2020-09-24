<?php

class Controller
{
    public function model($model)
    {
        require_once './app/models/'.$model.'.php';
        return new $model();
    }

    public function view($view, $data = [])
    {   
        
        require_once './app/views/'. $view .'.php';
    }

    public function viewtemplate($view, $data = [])
    {   

        if (isset($_SESSION['email'])) {

            require_once './app/views/template/index.php';

        } else {

            require_once './app/views/principal/index.php';

        }

        
    }

}

?>