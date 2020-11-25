<?php

class Costogastosprocecapitalmodel extends Models{

    private $tablacostogastosprocecapital = "costogastosprocecapital";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablacostogastosprocecapital.'(valor) VALUES (?)')) {

            $query->execute([0]);

            $idcostogastosprocecapital = $connect->lastInsertId();

            return $idcostogastosprocecapital;

        } else {

            return false;

        }

    }

}

?>