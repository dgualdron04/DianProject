<?php 


class Usuarioanticiporentamodel extends Models{

    private $tablusuarioanticiporenta = "usuarioanticiporenta";

    public function crear($idanticiporenta, $idliquidacionprivada, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablusuarioanticiporenta.'(idanticiporenta, idliquidacionprivada, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idanticiporenta, $idliquidacionprivada, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablusuarioanticiporenta.' WHERE idanticiporenta = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }
}
?>