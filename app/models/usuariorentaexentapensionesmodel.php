<?php 


class Usuariorentaexentapensionesmodel extends Models{

    private $tablausuariorentaexentapensiones = "usuariorentaexentapensiones";

    public function crear($idrentaexentapensiones, $idcedulapensiones, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuariorentaexentapensiones.'(idrentaexentapensiones, idcedulapensiones, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idrentaexentapensiones, $idcedulapensiones, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>