<?php 


class Subcedula1amodel extends Models{

    private $tablasubcedula1a = "subcedula1a";

    public function crear($valor){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablasubcedula1a.'(valor) VALUES (?)')) {

            $query->execute([$valor]);

            $idsubcedula1a = $connect->lastInsertId();

            return $idsubcedula1a;

        } else {

            return false;

        }

    }

}

?>