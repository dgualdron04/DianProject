<?php

class Ingresonoconsepensionesmodel extends Models{

    private $tablaingresonoconsepensiones = "ingresonoconsepensiones";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresonoconsepensiones.'(ingresosnoconsetotal) VALUES (?)')) {

            $query->execute([0]);

            $idingresonoconsepensiones = $connect->lastInsertId();

            return $idingresonoconsepensiones;

        } else {

            return false;

        }

    }

}
?>