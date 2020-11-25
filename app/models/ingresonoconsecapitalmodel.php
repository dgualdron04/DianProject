<?php

class Ingresonoconsecapitalmodel extends Models{

    private $tablaingresonoconsecapital = "ingresonoconsecapital";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresonoconsecapital.'(ingresosnoconsecapitaltotal) VALUES (?)')) {

            $query->execute([0]);

            $idingresonoconsecapital = $connect->lastInsertId();

            return $idingresonoconsecapital;

        } else {

            return false;

        }

    }

}

?>