<?php 


class Retenciondeclararmodel extends Models{

    private $tablaretenciondeclarar = "retenciondeclarar";

    public function crear($nombre, $valor,$descripcion){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaretenciondeclarar.'(nombre, valor, descripcion) VALUES (?,?,?)')) {

            $query->execute([$nombre, $valor,$descripcion]);

            $idretenciondeclarar = $connect->lastInsertId();
            
            return $idretenciondeclarar;
        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT rd.idretenciondeclarar AS "id", rd.nombre AS "nombre", rd.valor AS "valor", rd.descripcion FROM '.$this->tablaretenciondeclarar.' rd WHERE rd.idretenciondeclarar = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editarretenciondeclarar($nombre, $valor, $descripcion, $id){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablaretenciondeclarar.' SET nombre = ?, valor = ?, descripcion = ? WHERE idretenciondeclarar = ?')) {
            $stmt->execute([$nombre, $valor, $descripcion, $id]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablaretenciondeclarar.' WHERE idretenciondeclarar = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}
?>