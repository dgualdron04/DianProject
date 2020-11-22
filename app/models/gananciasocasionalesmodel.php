<?php

class Gananciasocasionalesmodel extends Models{

    private $tablagananciasocasionales = "gananciasocasionales";

    public function crear($iddeclaracion){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablagananciasocasionales.'(gananciasocasionales, iddeclaracion) VALUES (?, ?)')) {

            $query->execute([0, $iddeclaracion]);

            return true;

        } else {

            return false;

        }

    }

}

?>