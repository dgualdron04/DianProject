<?php 


class Saldofavormodel extends Models{

    private $tablasaldofavor = "saldofavor";

    public function crear($valor,$descripcion){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablasaldofavor.'(valor, descripcion) VALUES (?,?)')) {

            $query->execute([$valor,$descripcion]);

            $idsanciones = $connect->lastInsertId();
            
            return $idsanciones;
        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT sf.idsaldofavor AS "id", sf.valor AS "valor", sf.descripcion FROM '.$this->tablasaldofavor.' sf WHERE sf.idsaldofavor = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editarsaldofavor($valor, $descripcion, $id){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablasaldofavor.' SET valor = ?, descripcion = ? WHERE idsaldofavor = ?')) {
            $stmt->execute([$valor, $descripcion, $id]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablasaldofavor.' WHERE idsaldofavor = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }
}
?>