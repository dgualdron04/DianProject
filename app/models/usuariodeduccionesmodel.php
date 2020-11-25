<?php 


class Usuariodeduccionesmodel extends Models{

    private $tablausuariodeducciones = "usuariodeducciones";

    public function crear($iddeducciones, $idrentatrabajo, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuariodeducciones.'(iddeducciones, idrentatrabajo, idusuario) VALUES (?,?,?)')) {

            $query->execute([$iddeducciones, $idrentatrabajo, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

}
?>