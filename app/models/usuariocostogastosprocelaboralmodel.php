<?php 

class Usuariocostogastosprocelaboralmodel extends Models{

    private $tablausuariocostogastosprocelaboral = "usuariocostogastosprocelaboral";

    public function crear($idcostogastosprocelaboral, $idrentanolaboral, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuariocostogastosprocelaboral.'(idcostogastosprocelaboral , idrentanolaboral, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idcostogastosprocelaboral, $idrentanolaboral, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>