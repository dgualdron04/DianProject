<?php 


class Anticiporentamodel extends Models{

    private $tablaanticiporenta = "anticiporenta";

    public function crear($valor,$descripcion){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaanticiporenta.'(valor, descripcion) VALUES (?,?)')) {

            $query->execute([$valor,$descripcion]);

            $idanticiporenta = $connect->lastInsertId();
            
            return $idanticiporenta;
        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT ar.idanticiporenta AS "id", ar.valor AS "valor", ar.descripcion FROM '.$this->tablaanticiporenta.' ar WHERE ar.idanticiporenta = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editaranticiporenta($valor, $descripcion, $id){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablaanticiporenta.' SET valor = ?, descripcion = ? WHERE idanticiporenta = ?')) {
            $stmt->execute([$valor, $descripcion, $id]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablaanticiporenta.' WHERE idanticiporenta = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}
?>