<?php 

class Usuariorentaexentamodel extends Models{

    private $tablausuariorentaexenta = "usuariorentaexenta";

    public function crear($idrentaexenta, $idrentatrabajo, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuariorentaexenta.'(idrentaexenta , idrentatrabajo, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idrentaexenta, $idrentatrabajo, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>