<?php 


class Ingresosganaciasmodel extends Models{

    private $tablaingresosganacias = "ingresosganacias";

    public function crear($valor,$tipo){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresosganacias.'(valor, idtipoingresosganancias) VALUES (?,?)')) {

            $query->execute([$valor,$tipo]);

            $idingresosganacias = $connect->lastInsertId();
            
            return $idingresosganacias;
        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT ig.idingresosganacias AS "id", ig.valor AS "valor", ig.idtipoingresosganancias AS "tipo" FROM '.$this->tablaingresosganacias.' ig WHERE ig.idingresosganacias = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editaringresos($valor, $id){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablaingresosganacias.' SET valor = ? WHERE idingresosganacias = ?')) {
            $stmt->execute([$valor, $id]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablaingresosganacias.' WHERE idingresosganacias = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }
}
?>