<?php 


class Usuariosubcedula2amodel extends Models{

    private $tablausuariosubcedula2a = "usuariosubcedula2a";

    public function crear($idsubcedula2a, $idceduladiviparti, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuariosubcedula2a.'(idsubcedula2a, idceduladiviparti, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idsubcedula2a, $idceduladiviparti, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>