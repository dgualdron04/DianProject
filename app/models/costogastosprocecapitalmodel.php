<?php

class Costogastosprocecapitalmodel extends Models{

    private $tablacostogastosprocecapital = "costogastosprocecapital";
    private $tablausuariocostogastosprocecapital = "usuariocostogastosprocecapital";
    private $tablarentacapital = "rentacapital";
    private $tablacedulageneral = "cedulageneral";

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

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT cgpcc.idcostogastosprocecapital AS "id" FROM '.$this->tablacostogastosprocecapital.' cgpcc JOIN '.$this->tablausuariocostogastosprocecapital.' ucgpcc ON ucgpcc.idcostogastosprocecapital = cgpcc.idcostogastosprocecapital JOIN '.$this->tablarentacapital.' rc ON rc.idrentacapital = ucgpcc.idrentacapital JOIN '.$this->tablacedulageneral.' cg ON cg.idcedulageneral = rc.idcedulageneral WHERE cg.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

}

?>