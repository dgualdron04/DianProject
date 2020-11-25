<?php 

class Usuarioingresonoconsecapitalmodel extends Models{

    private $tablausuarioingresonoconsecapital = "usuarioingresonoconsecapital";

    public function crear($idingresonoconsecapital, $idrentacapital, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuarioingresonoconsecapital.'(idingresonoconsecapital , idrentacapital, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idingresonoconsecapital, $idrentacapital, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>