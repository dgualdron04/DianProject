<?php 


class Usuarioingresonoconsegananciasocasionalesmodel extends Models{

    private $tablausuarioingresonoconsegananciasocasionales = "usuarioingresonoconsegananciasocasionales";

    public function crear($idingresonoconseganancias, $idgananciasocasionales, $idusuario){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablausuarioingresonoconsegananciasocasionales.'(idingresonoconseganancias , idgananciasocasionales, idusuario) VALUES (?,?,?)')) {

            $query->execute([$idingresonoconseganancias, $idgananciasocasionales, $idusuario]);

            return true;

        } else {

            return false;

        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablausuarioingresonoconsegananciasocasionales.' WHERE idingresonoconseganancias = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }
}
?>