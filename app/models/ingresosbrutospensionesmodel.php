<?php

class Ingresosbrutospensionesmodel extends Models{

    private $tablaingresosbrutospensiones = "ingresosbrutospensiones";
    private $tablausuarioingresobrutopensiones = "usuarioingresobrutopensiones";
    private $tablacedulapensiones = "cedulapensiones";

    public function crear(){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresosbrutospensiones.'(ingresobrutototal) VALUES (?)')) {

            $query->execute([0]);

            $idingresosbrutospensiones = $connect->lastInsertId();

            return $idingresosbrutospensiones;

        } else {

            return false;

        }

    }

    public function traerid($id){
        $query = $this->db->connect()->prepare('SELECT ibp.idingresosbrutospensiones AS "id" FROM '.$this->tablaingresosbrutospensiones.' ibp JOIN '.$this->tablausuarioingresobrutopensiones.' uibp ON uibp.idingresosbrutospensiones = ibp.idingresosbrutospensiones JOIN '.$this->tablacedulapensiones.' cp ON cp.idcedulapensiones = uibp.idcedulapensiones WHERE cp.iddeclaracion = ?');
        $query->execute([$id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['id'];
    }

}
?>