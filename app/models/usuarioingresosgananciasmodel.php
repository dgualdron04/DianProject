<?php 


class Usuarioingresosgananciasmodel extends Models{

    private $tablausuarioingresosganancias = "usuarioingresosganancias";

    public function crear($idingresosganacias , $idgananciasocasionales, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuarioingresosganancias.'(idingresosganacias , idgananciasocasionales, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idingresosganacias , $idgananciasocasionales, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablausuarioingresosganancias.' WHERE idingresosganacias = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }
}
?>