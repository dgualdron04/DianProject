<?php 


class Costofiscallaboralmodel extends Models{

    private $tablacostofiscallaboral = "costofiscallaboral";

    public function crear($valor, $idcostogastosprocelaboral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablacostofiscallaboral.'(valor, idcostogastosprocelaboral) VALUES (?,?)')) {

            $query->execute([$valor, $idcostogastosprocelaboral]);

            /* $iddevdescreblaboral = $connect->lastInsertId(); */

            return true;

        } else {

            return false;

        }

    }

}

?>