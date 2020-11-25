<?php 


class Usuariodiviparti2016model extends Models{

    private $tablausuariodiviparti2016 = "usuariodiviparti2016";

    public function crear($iddiviparti2016, $idceduladiviparti, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuariodiviparti2016.'(iddiviparti2016, idceduladiviparti, idusuario) VALUES (?,?,?)')) {

            $query->execute([$iddiviparti2016, $idceduladiviparti, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>