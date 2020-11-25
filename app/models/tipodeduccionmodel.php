<?php

class Tipodeduccionmodel extends Models{

    private $tablatipodeduccion = "tipodeduccion";

    public function listar(){

        $query = $this->db->connect()->prepare('SELECT td.idtipodeduccion, td.nombre, td.descripcion, td.ayuda FROM '.$this->tablatipodeduccion.' td ;');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipodeduccion.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT td.idtipodeduccion AS "id", td.nombre, td.descripcion, td.ayuda, "Renta de Trabajo" AS "renta", "Deducciones" AS "tiporenta", "Tipo de Deducciones" AS aspecto FROM '.$this->tablatipodeduccion.' td WHERE td.idtipodeduccion = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editartipodededucciones($nombre, $descripcion, $ayuda, $id){

        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipodeduccion.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtipodeduccion = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipodeduccion.' WHERE idtipodeduccion = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}

?>