<?php 


class Ingresonoconsegananciasmodel extends Models{

    private $tablaingresonoconseganancias = "ingresonoconseganancias";

    public function crear($valor){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresonoconseganancias.'(valor) VALUES (?)')) {

            $query->execute([$valor]);

            $idingresonoconseganancias = $connect->lastInsertId();
            
            return $idingresonoconseganancias;
        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT inc.idingresonoconseganancias AS "id", inc.valor AS "valor" FROM '.$this->tablaingresonoconseganancias.' inc WHERE inc.idingresonoconseganancias = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editaringresosnoconse($valor, $id){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablaingresonoconseganancias.' SET valor = ? WHERE idingresonoconseganancias = ?')) {
            $stmt->execute([$valor, $id]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablaingresonoconseganancias.' WHERE idingresonoconseganancias = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }
}
?>