<?php 

class Usuarioingresobrutopensionesmodel extends Models{

    private $tablausuarioingresobrutopensiones = "usuarioingresobrutopensiones";

    public function crear($idingresosbrutospensiones, $idcedulapensiones, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuarioingresobrutopensiones.'(idingresosbrutospensiones , idcedulapensiones, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idingresosbrutospensiones, $idcedulapensiones, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>