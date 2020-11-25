<?php

class Costogastosprocelaboralmodel extends Models{

    private $tablacostogastosprocelaboral = "costogastosprocelaboral";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablacostogastosprocelaboral.'(ingresocostogastoprocetotal) VALUES (?)')) {

            $query->execute([0]);

            $idcostogastosprocelaboral = $connect->lastInsertId();

            return $idcostogastosprocelaboral;

        } else {

            return false;

        }

    }

}

?>