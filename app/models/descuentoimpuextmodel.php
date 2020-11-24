<?php 


class Descuentoimpuextmodel extends Models{

    private $tabladescuentoimpuext = "descuentoimpuext";

    public function crear($nombre, $valor,$descripcion){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tabladescuentoimpuext.'(nombre, valor, descripcion) VALUES (?,?,?)')) {

            $query->execute([$nombre, $valor,$descripcion]);

            $iddescuentoimpuext = $connect->lastInsertId();
            
            return $iddescuentoimpuext;
        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT die.iddescuentoimpuext AS "id", die.nombre AS "nombre", die.valor AS "valor", die.descripcion FROM '.$this->tabladescuentoimpuext.' die WHERE die.iddescuentoimpuext = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editardescuentoimpuext($nombre, $valor, $descripcion, $id){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tabladescuentoimpuext.' SET nombre = ?, valor = ?, descripcion = ? WHERE iddescuentoimpuext = ?')) {
            $stmt->execute([$nombre, $valor, $descripcion, $id]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tabladescuentoimpuext.' WHERE iddescuentoimpuext = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}
?>