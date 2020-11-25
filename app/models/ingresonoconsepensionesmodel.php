<?php

class Ingresonoconsepensionesmodel extends Models{

    private $tablaingresonoconsepensiones = "ingresonoconsepensiones";
    private $tablausuarioingresonoconsepensiones = "usuarioingresonoconsepensiones";
    private $tablacedulapensiones = "cedulapensiones";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresonoconsepensiones.'(ingresosnoconsetotal) VALUES (?)')) {

            $query->execute([0]);

            $idingresonoconsepensiones = $connect->lastInsertId();

            return $idingresonoconsepensiones;

        } else {

            return false;

        }

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT icp.idingresonoconsepensiones  AS "id" FROM '.$this->tablaingresonoconsepensiones.' icp JOIN '.$this->tablausuarioingresonoconsepensiones.' uicp ON uicp.idingresonoconsepensiones  = icp.idingresonoconsepensiones JOIN '.$this->tablacedulapensiones.' cp ON cp.idcedulapensiones = uicp.idcedulapensiones WHERE cp.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

}
?>