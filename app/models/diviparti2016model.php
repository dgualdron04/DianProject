<?php 


class Diviparti2016model extends Models{

    private $tabladiviparti2016 = "diviparti2016";

    public function crear($valor){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tabladiviparti2016.'(valor) VALUES (?)')) {

            $query->execute([$valor]);

            $iddiviparti2016 = $connect->lastInsertId();

            return $iddiviparti2016;

        } else {

            return false;

        }

    }

}

?>