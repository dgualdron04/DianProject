<?php 


class Devdescreblaboralmodel extends Models{

    private $tabladevdescreblaboral = "devdescreblaboral";

    public function crear($nombre, $valor){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tabladevdescreblaboral.'(nombre, valor) VALUES (?, ?)')) {

            $query->execute([$nombre, $valor]);

            $iddevdescreblaboral = $connect->lastInsertId();

            return $iddevdescreblaboral;

        } else {

            return false;

        }

    }

}

?>