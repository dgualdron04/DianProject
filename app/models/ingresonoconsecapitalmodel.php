<?php

class Ingresonoconsecapitalmodel extends Models{

    private $tablaingresonoconsecapital = "ingresonoconsecapital";
    private $tablausuarioingresonoconsecapital = "usuarioingresonoconsecapital";
    private $tablarentacapital = "rentacapital";
    private $tablacedulageneral = "cedulageneral";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresonoconsecapital.'(ingresosnoconsecapitaltotal) VALUES (?)')) {

            $query->execute([0]);

            $idingresonoconsecapital = $connect->lastInsertId();

            return $idingresonoconsecapital;

        } else {

            return false;

        }

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT incc.idingresonoconsecapital AS "id" FROM '.$this->tablaingresonoconsecapital.' incc JOIN '.$this->tablausuarioingresonoconsecapital.' uincc ON uincc.idingresonoconsecapital = incc.idingresonoconsecapital JOIN '.$this->tablarentacapital.' rc ON rc.idrentacapital = uincc.idrentacapital JOIN '.$this->tablacedulageneral.' cg ON cg.idcedulageneral = rc.idcedulageneral WHERE cg.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

}

?>