<?php

class Ingresosbrutospensionesmodel extends Models{

    private $tablaingresosbrutospensiones = "ingresosbrutospensiones";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresosbrutospensiones.'(ingresobrutototal) VALUES (?)')) {

            $query->execute([0]);

            $idingresosbrutospensiones = $connect->lastInsertId();

            return $idingresosbrutospensiones;

        } else {

            return false;

        }

    }

}
?>