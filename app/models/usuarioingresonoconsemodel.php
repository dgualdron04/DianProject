<?php 

class Usuarioingresonoconsemodel extends Models{

    private $tablausuarioingresonoconse = "usuarioingresonoconse";

    public function crear($idingresonoconse, $idrentatrabajo, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuarioingresonoconse.'(idingresonoconse , idrentatrabajo, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idingresonoconse, $idrentatrabajo, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>