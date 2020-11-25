<?php

class Ingresobrutomodel extends Models{

    private $tablaingresobruto = "ingresobruto";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresobruto.'(ingresobrutototal) VALUES (?)')) {

            $query->execute([0]);

            $idingresobruto = $connect->lastInsertId();

            return $idingresobruto;

        } else {

            return false;

        }

    }

}
?>