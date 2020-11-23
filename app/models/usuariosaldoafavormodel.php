
<?php 


class Usuariosaldoafavormodel extends Models{

    private $tablausuariosaldoafavor = "usuariosaldoafavor";

    public function crear($idsaldofavor, $idliquidacionprivada, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuariosaldoafavor.'(idsaldofavor, idliquidacionprivada, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idsaldofavor, $idliquidacionprivada, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablausuariosaldoafavor.' WHERE idsaldofavor = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }
}
?>