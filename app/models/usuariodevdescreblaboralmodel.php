<?php 


class Usuariodevdescreblaboralmodel extends Models{

    private $tablausuariodevdescreblaboral = "usuariodevdescreblaboral";

    public function crear($iddevdescreblaboral, $idrentanolaboral, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuariodevdescreblaboral.'(iddevdescreblaboral, idrentanolaboral, idusuario) VALUES (?,?,?)')) {

            $query->execute([$iddevdescreblaboral, $idrentanolaboral, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>