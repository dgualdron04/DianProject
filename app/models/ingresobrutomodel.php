<?php

class Ingresobrutomodel extends Models{

    private $tablaingresobruto = "ingresobruto";
    private $tablausuarioingresobruto = "usuarioingresobruto";
    private $tablarentatrabajo = "rentatrabajo";
    private $tablacedulageneral = "cedulageneral";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresobruto.'(ingresobrutototal) VALUES (?)')) {

            $query->execute([0]);

            $idingresobruto = $connect->lastInsertId();

            return $idingresobruto;

        } else {

            return false;

        }

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT ib.idingresobruto AS "id" FROM '.$this->tablaingresobruto.' ib JOIN '.$this->tablausuarioingresobruto.' uib ON uib.idingresobruto = ib.idingresobruto JOIN '.$this->tablarentatrabajo.' rt ON rt.idrentatrabajo = uib.idrentatrabajo JOIN '.$this->tablacedulageneral.' cg ON cg.idcedulageneral = rt.idcedulageneral WHERE cg.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

}
?>