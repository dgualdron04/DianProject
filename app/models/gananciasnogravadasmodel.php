<?php 


class Gananciasnogravadasmodel extends Models{

    private $tablagananciasnogravadas = "gananciasnogravadas";

    public function crear($valor, $tipo){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablagananciasnogravadas.'(valor, idtipogananciasnogravadas) VALUES (?, ?)')) {

            $query->execute([$valor, $tipo]);

            $idgananciasnogravadas = $connect->lastInsertId();
            
            return $idgananciasnogravadas;
        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT gng.idgananciasonogravadas AS "id", gng.valor AS "valor", gng.idtipogananciasnogravadas AS "tipo" FROM '.$this->tablagananciasnogravadas.' gng WHERE gng.idgananciasonogravadas = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editarganancias($valor, $id){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablagananciasnogravadas.' SET valor = ? WHERE idgananciasonogravadas = ?')) {
            $stmt->execute([$valor, $id]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablagananciasnogravadas.' WHERE idgananciasonogravadas = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}
?>