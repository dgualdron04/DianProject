<?php 


class Rentaexentapensionesmodel extends Models{

    private $tablarentaexentapensiones = "rentaexentapensiones";

    public function crear($valor){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablarentaexentapensiones.'(valor) VALUES (?)')) {

            $query->execute([$valor]);

            $idrentaexentapensiones = $connect->lastInsertId();

            return $idrentaexentapensiones;

        } else {

            return false;

        }

    }

}

?>