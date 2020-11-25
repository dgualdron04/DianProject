<?php 

class Usuarioingresonoconsepensionesmodel extends Models{

    private $tablausuarioingresonoconsepensiones = "usuarioingresonoconsepensiones";

    public function crear($idingresonoconsepensiones, $idcedulapensiones, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuarioingresonoconsepensiones.'(idingresonoconsepensiones , idcedulapensiones, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idingresonoconsepensiones, $idcedulapensiones, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>