<?php 


class Usuariosancionesmodel extends Models{

    private $tablausuariosanciones = "usuariosanciones";

    public function crear($idsanciones, $idliquidacionprivada, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuariosanciones.'(idsanciones, idliquidacionprivada, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idsanciones, $idliquidacionprivada, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablausuariosanciones.' WHERE idsanciones = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }
}
?>