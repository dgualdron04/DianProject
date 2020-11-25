<?php 


class Usuariorentaexededuccioncapitalmodel extends Models{

    private $tablausuariorentaexededuccioncapital = "usuariorentaexededuccioncapital";

    public function crear($idrentaexededuccioncapital, $idrentacapital, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuariorentaexededuccioncapital.'(idrentaexededuccioncapital, idrentacapital, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idrentaexededuccioncapital, $idrentacapital, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>