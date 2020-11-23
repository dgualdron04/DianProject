<?php 


class Usuariodescuentoimpuextmodel extends Models{

    private $tablausuariodescuentoimpuext = "usuariodescuentoimpuext";

    public function crear($iddescuentoimpuext , $idliquidacionprivada, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuariodescuentoimpuext.'(iddescuentoimpuext , idliquidacionprivada, idusuario) VALUES (?,?,?)')) {

            $query->execute([$iddescuentoimpuext , $idliquidacionprivada, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablausuariodescuentoimpuext.' WHERE iddescuentoimpuext = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }
}
?>