<?php

class Tipomonedamodel extends Models{

    private $tablatipomoneda = "tipomoneda";

    public function listar(){

        $query = $this->db->connect()->prepare('SELECT tm.idtipomoneda, tm.nombre FROM '.$this->tablatipomoneda.' tm ;');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

}


?>