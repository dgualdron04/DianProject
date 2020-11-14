<?php

class Usersessionmodel extends Models{

    public function __construct()
    {
        
    }
    
    public function iniciarsession()
    {
        session_start();
    }


    public function setcurrentuser($email){
        $_SESSION['email'] = $email;
    }

    public function getcurrentuser(){
        return $_SESSION['email'];
    }

    public function closesession(){
        session_unset();
        session_destroy();
    }

}

?>