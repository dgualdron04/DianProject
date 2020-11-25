<?php

class Ingresobrutocapitalmodel extends Models{

    private $tablaingresobrutocapital = "ingresobrutocapital";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresobrutocapital.'(ingresobrutocapitaltotal) VALUES (?)')) {

            $query->execute([0]);

            $idingresobrutocapital = $connect->lastInsertId();

            return $idingresobrutocapital;

        } else {

            return false;

        }

    }

}

?>