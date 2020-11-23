<?php

class Modelomodel extends Models{

    private $tablamodelo = "modelo";

    public function listar(){

        $query = $this->db->connect()->prepare('SELECT m.idmodelo, m.tipomodelo FROM '.$this->tablamodelo.' m ;');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

}


?>