<?php 


class Anticiporentamodel extends Models{

    private $tablaanticiporenta = "anticiporenta";

    public function crear($nombre, $valor,$descripcion){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaanticiporenta.'(nombre, valor, descripcion) VALUES (?,?,?)')) {

            $query->execute([$nombre, $valor,$descripcion]);

            $idanticiporenta = $connect->lastInsertId();
            
            return $idanticiporenta;
        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT ar.idanticiporenta AS "id", ar.nombre AS "nombre", ar.valor AS "valor", ar.descripcion FROM '.$this->tablaanticiporenta.' ar WHERE ar.idanticiporenta = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editaranticiporenta($nombre, $valor, $descripcion, $id){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablaanticiporenta.' SET nombre = ?, valor = ?, descripcion = ? WHERE idanticiporenta = ?')) {
            $stmt->execute([$nombre, $valor, $descripcion, $id]);
            
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