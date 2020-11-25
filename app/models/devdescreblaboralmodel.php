<?php 


class Devdescreblaboralmodel extends Models{

    private $tabladevdescreblaboral = "devdescreblaboral";

    public function crear($nombre){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tabladevdescreblaboral.'(nombre) VALUES (?)')) {

            $query->execute([$nombre]);

            $iddevdescreblaboral = $connect->lastInsertId();

            return $iddevdescreblaboral;

        } else {

            return false;

        }

    }

}

?>