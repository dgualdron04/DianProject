<?php

class Rentaexentamodel extends Models{

    private $tablarentaexenta = "rentaexenta";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablarentaexenta.'(rentaexentatotal) VALUES (?)')) {

            $query->execute([0]);

            $idrentaexenta = $connect->lastInsertId();

            return $idrentaexenta;

        } else {

            return false;

        }

    }

}
?>