<?php 

class Usuariogananciasnogravadasmodel extends Models{

    private $tablausuariogananciasnogravadas = "usuariogananciasnogravadas";

    public function crear($idgananciasonogravadas, $idgananciasocasionales, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuariogananciasnogravadas.'(idgananciasonogravadas , idgananciasocasionales, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idgananciasonogravadas, $idgananciasocasionales, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablausuariogananciasnogravadas.' WHERE idgananciasonogravadas = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }
}
?>