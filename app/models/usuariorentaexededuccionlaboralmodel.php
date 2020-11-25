<?php 


class Usuariorentaexededuccionlaboralmodel extends Models{

    private $tablausuariorentaexededuccionlaboral = "usuariorentaexededuccionlaboral";

    public function crear($idrentaexededuccionlaboral, $idrentanolaboral, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuariorentaexededuccionlaboral.'(idrentaexededuccionlaboral, idrentanolaboral, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idrentaexededuccionlaboral, $idrentanolaboral, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>