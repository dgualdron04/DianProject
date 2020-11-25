<?php 

class Usuarioingresobrutomodel extends Models{

    private $tablausuarioingresobruto = "usuarioingresobruto";

    public function crear($idingresobruto, $idrentatrabajo, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuarioingresobruto.'(idingresobruto , idrentatrabajo, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idingresobruto, $idrentatrabajo, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>