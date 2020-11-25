<?php 


class Costofiscallaboralmodel extends Models{

    private $tablacostofiscallaboral = "costofiscallaboral";

    public function crear($nombre, $valor, $idcostogastosprocelaboral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablacostofiscallaboral.'(nombre, valor, idcostogastosprocelaboral) VALUES (?,?,?)')) {

            $query->execute([$nombre, $valor, $idcostogastosprocelaboral]);

            /* $iddevdescreblaboral = $connect->lastInsertId(); */

            return true;

        } else {

            return false;

        }

    }

}

?>