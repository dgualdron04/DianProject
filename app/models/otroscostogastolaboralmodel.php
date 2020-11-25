<?php 


class Otroscostogastolaboralmodel extends Models{

    private $tablaotroscostogastolaboral = "otroscostogastolaboral";

    public function crear($nombre, $valor, $idcostogastosprocelaboral, $idtipootroscostogastolaboral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaotroscostogastolaboral.'(nombre, valor, idcostogastosprocelaboral, idtipootroscostogastolaboral) VALUES (?,?,?,?)')) {

            $query->execute([$nombre, $valor, $idcostogastosprocelaboral, $idtipootroscostogastolaboral]);

            /* $iddevdescreblaboral = $connect->lastInsertId(); */

            return true;

        } else {

            return false;

        }

    }

}

?>