<?php

class Tipodeudasmodel extends Models{

    private $tablatipodeudas = "tipodeuda";

    public function listar(){

        $query = $this->db->connect()->prepare('SELECT td.idtipodeuda, td.nombre, td.descripcion, td.ayuda FROM '.$this->tablatipodeudas.' td ;');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipodeudas.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT td.idtipodeuda, td.nombre, td.descripcion, td.ayuda FROM '.$this->tablatipodeudas.' td WHERE td.idtipodeuda = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editardeudas($nombre, $descripcion, $ayuda, $id){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipodeudas.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtipodeuda = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipodeudas.' WHERE idtipodeuda = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}





?>