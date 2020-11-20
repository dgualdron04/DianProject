<?php

class Tipoactividadeconomicamodel extends Models{

    private $tablatipoactividadeconomica = "tipoactividadeconomica";


    public function listar(){

        $query = $this->db->connect()->prepare('SELECT tac.idtipoactividad, tac.nombre, tac.descripcion, tac.ayuda FROM '.$this->tablatipoactividadeconomica.' tac ;');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipoactividadeconomica.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT tac.idtipoactividad, tac.nombre, tac.descripcion, tac.ayuda FROM '.$this->tablatipoactividadeconomica.' tac WHERE tac.idtipoactividad = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editaractiviadeconomica($nombre, $descripcion, $ayuda, $id){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipoactividadeconomica.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtipoactividad = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipoactividadeconomica.' WHERE idtipoactividad = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}

?>