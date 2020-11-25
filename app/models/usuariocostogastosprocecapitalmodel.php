<?php 

class Usuariocostogastosprocecapitalmodel extends Models{

    private $tablausuariocostogastosprocecapital = "usuariocostogastosprocecapital";

    public function crear($idcostogastosprocecapital, $idrentacapital, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuariocostogastosprocecapital.'(idcostogastosprocecapital , idrentacapital, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idcostogastosprocecapital, $idrentacapital, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>