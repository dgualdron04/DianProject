<?php 


class Retenciondeclararmodel extends Models{

    private $tablaretenciondeclarar = "retenciondeclarar";

    public function crear($valor,$descripcion){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaretenciondeclarar.'(valor, descripcion) VALUES (?,?)')) {

            $query->execute([$valor,$descripcion]);

            $idretenciondeclarar = $connect->lastInsertId();
            
            return $idretenciondeclarar;
        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT rd.idretenciondeclarar AS "id", rd.valor AS "valor", rd.descripcion FROM '.$this->tablaretenciondeclarar.' rd WHERE rd.idretenciondeclarar = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editarretenciondeclarar($valor, $descripcion, $id){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablaretenciondeclarar.' SET valor = ?, descripcion = ? WHERE idretenciondeclarar = ?')) {
            $stmt->execute([$valor, $descripcion, $id]);
            
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