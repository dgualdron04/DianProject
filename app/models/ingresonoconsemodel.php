<?php

class Ingresonoconsemodel extends Models{

    private $tablaingresonoconse = "ingresonoconse";
    private $tablausuarioingresonoconse = "usuarioingresonoconse";
    private $tablarentatrabajo = "rentatrabajo";
    private $tablacedulageneral = "cedulageneral";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresonoconse.'(ingresosnoconsetotal) VALUES (?)')) {

            $query->execute([0]);

            $idingresonoconse = $connect->lastInsertId();

            return $idingresonoconse;

        } else {

            return false;

        }

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT ic.idingresonoconse AS "id" FROM '.$this->tablaingresonoconse.' ic JOIN '.$this->tablausuarioingresonoconse.' uic ON uic.idingresonoconse = ic.idingresonoconse JOIN '.$this->tablarentatrabajo.' rt ON rt.idrentatrabajo = uic.idrentatrabajo JOIN '.$this->tablacedulageneral.' cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

}
?>