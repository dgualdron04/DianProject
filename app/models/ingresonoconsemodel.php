<?php

class Ingresonoconsemodel extends Models{

    private $tablaingresonoconse = "ingresonoconse";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresonoconse.'(ingresosnoconsetotal) VALUES (?)')) {

            $query->execute([0]);

            $idingresonoconse = $connect->lastInsertId();

            return $idingresonoconse;

        } else {

            return false;

        }

    }

}
?>