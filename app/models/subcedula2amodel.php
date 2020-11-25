<?php 


class Subcedula2amodel extends Models{

    private $tablasubcedula2a = "subcedula2a";

    public function crear($valor){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablasubcedula2a.'(valor) VALUES (?)')) {

            $query->execute([$valor]);

            $idsubcedula2a = $connect->lastInsertId();

            return $idsubcedula2a;

        } else {

            return false;

        }

    }

}

?>