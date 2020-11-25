<?php 


class Usuariosubcedula1amodel extends Models{

    private $tablausuariosubcedula1a = "usuariosubcedula1a";

    public function crear($idsubcedula1a, $idceduladiviparti, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuariosubcedula1a.'(idsubcedula1a, idceduladiviparti, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idsubcedula1a, $idceduladiviparti, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>