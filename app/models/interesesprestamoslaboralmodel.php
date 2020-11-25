<?php 


class Interesesprestamoslaboralmodel extends Models{

    private $tablainteresesprestamoslaboral = "interesesprestamoslaboral";

    public function crear($nombre, $valor, $idcostogastosprocelaboral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablainteresesprestamoslaboral.'(nombre, valor, idcostogastosprocelaboral) VALUES (?,?,?)')) {

            $query->execute([$nombre, $valor, $idcostogastosprocelaboral]);

            /* $iddevdescreblaboral = $connect->lastInsertId(); */

            return true;

        } else {

            return false;

        }

    }

}

?>