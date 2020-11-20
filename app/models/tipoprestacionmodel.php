<?php

class Tipoprestacionmodel extends Models{

    private $tablatipoprestacion = "tipoprestacion";

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipoprestacion.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

            $query = $this->db->connect()->prepare('SELECT tp.idtipoprestacion AS "id", tp.nombre, tp.descripcion, tp.ayuda, "Renta de Trabajo" AS "renta", "Ingreso Bruto" AS "tiporenta", "Tipo de Prestación" AS aspecto FROM '.$this->tablatipoprestacion.' tp WHERE tp.idtipoprestacion = ? ;');
            $query->execute([$id]);
            $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
            print_r(json_encode($myquery));

    }

    public function editartipoprestacion($nombre, $descripcion, $ayuda, $id){

        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipoprestacion.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtipoprestacion = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipoprestacion.' WHERE idtipoprestacion = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}





?>