<?php

class Tipodireccionseccionalmodel extends Models{

    private $tablatipodireccionseccional = "tipodireccionseccional";

    public function listar(){

        $query = $this->db->connect()->prepare('SELECT tdc.idtipodireccionseccional, tdc.nombre, tdc.descripcion, tdc.ayuda FROM '.$this->tablatipodireccionseccional.' tdc ;');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipodireccionseccional.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT tdc.idtipodireccionseccional, tdc.nombre, tdc.descripcion, tdc.ayuda FROM '.$this->tablatipodireccionseccional.' tdc WHERE tdc.idtipodireccionseccional = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }


    public function editardireccionseccional($nombre, $descripcion, $ayuda, $id){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipodireccionseccional.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtipodireccionseccional = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipodireccionseccional.' WHERE idtipodireccionseccional = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}

?>