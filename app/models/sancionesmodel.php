<?php 


class Sancionesmodel extends Models{

    private $tablasanciones= "sanciones";

    public function crear($valor,$descripcion){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablasanciones.'(valor, descripcion) VALUES (?,?)')) {

            $query->execute([$valor,$descripcion]);

            $idsanciones = $connect->lastInsertId();
            
            return $idsanciones;
        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT s.idsanciones AS "id", s.valor AS "valor", s.descripcion FROM '.$this->tablasanciones.' s WHERE s.idsanciones = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editarsanciones($valor, $descripcion, $id){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablasanciones.' SET valor = ?, descripcion = ? WHERE idsanciones = ?')) {
            $stmt->execute([$valor, $descripcion, $id]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablasanciones.' WHERE idsanciones = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }
}
?>