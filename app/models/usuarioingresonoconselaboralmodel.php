<?php 

class Usuarioingresonoconselaboralmodel extends Models{

    private $tablausuarioingresonoconselaboral = "usuarioingresonoconselaboral";

    public function crear($idingresosnoconselaboral, $idrentanolaboral, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuarioingresonoconselaboral.'(idingresosnoconselaboral , idrentanolaboral, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idingresosnoconselaboral, $idrentanolaboral, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>