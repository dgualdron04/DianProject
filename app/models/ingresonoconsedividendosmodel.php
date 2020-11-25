<?php 


class Ingresonoconsedividendosmodel extends Models{

    private $tablaingresonoconsedividendos = "ingresonoconsedividendos";

    public function crear($valor){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresonoconsedividendos.'(valor) VALUES (?)')) {

            $query->execute([$valor]);

            $idingresonoconsedividendos = $connect->lastInsertId();

            return $idingresonoconsedividendos;

        } else {

            return false;

        }

    }

}

?>