<?php

class Tipobienesmodel extends Models{

    private $tablatipobienes = "tipobien";

    public function listar(){

        $query = $this->db->connect()->prepare('SELECT tb.idtipobien, tb.nombre, tb.descripcion, tb.ayuda FROM '.$this->tablatipobienes.' tb ;');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipobienes.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT tb.idtipobien, tb.nombre, tb.descripcion, tb.ayuda FROM '.$this->tablatipobienes.' tb WHERE tb.idtipobien = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editarbienes($nombre, $descripcion, $ayuda, $id){
        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipobienes.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtipobien = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }
    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipobienes.' WHERE idtipobien = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}





?>