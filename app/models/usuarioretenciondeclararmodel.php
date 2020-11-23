
<?php 


class Usuarioretenciondeclararmodel extends Models{

    private $tablausuarioretenciondeclarar = "usuarioretenciondeclarar";

    public function crear($idretenciondeclarar, $idliquidacionprivada, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuarioretenciondeclarar.'(idretenciondeclarar, idliquidacionprivada, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idretenciondeclarar, $idliquidacionprivada, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablausuarioretenciondeclarar.' WHERE idretenciondeclarar = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }
}
?>