<?php

class Ingresosnoconselaboralmodel extends Models{

    private $tablaingresosnoconselaboral = "ingresosnoconselaboral";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresosnoconselaboral.'(ingresosnoconsetotal) VALUES (?)')) {

            $query->execute([0]);

            $idingresosnoconselaboral = $connect->lastInsertId();

            return $idingresosnoconselaboral;

        } else {

            return false;

        }

    }

}
?>