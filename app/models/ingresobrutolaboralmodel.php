<?php

class Ingresobrutolaboralmodel extends Models{

    private $tablaingresobrutolaboral = "ingresobrutolaboral";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresobrutolaboral.'(ingresobrutototal) VALUES (?)')) {

            $query->execute([0]);

            $idingresobrutolaboral = $connect->lastInsertId();

            return $idingresobrutolaboral;

        } else {

            return false;

        }

    }

}

?>