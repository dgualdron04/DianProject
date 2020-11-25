<?php 


class Usuariorentaliqpasecelaboralmodel extends Models{

    private $tablausuariorentaliqpasecelaboral = "usuariorentaliqpasecelaboral";

    public function crear($idrentaliqpasecelaboral, $idrentanolaboral, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuariorentaliqpasecelaboral.'(idrentaliqpasecelaboral, idrentanolaboral, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idrentaliqpasecelaboral, $idrentanolaboral, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>