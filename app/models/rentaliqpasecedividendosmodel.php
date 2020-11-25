<?php 


class Rentaliqpasecedividendosmodel extends Models{

    private $tablarentaliqpasecedividendos = "rentaliqpasecedividendos";

    public function crear($valor){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablarentaliqpasecedividendos.'(valor) VALUES (?)')) {

            $query->execute([$valor]);

            $idrentaliqpasecedividendos = $connect->lastInsertId();

            return $idrentaliqpasecedividendos;

        } else {

            return false;

        }

    }

}

?>