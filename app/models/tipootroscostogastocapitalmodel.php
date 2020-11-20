<?php

class Tipootroscostogastocapitalmodel extends Models{

    private $tablatipootroscostogastocapital = "tipootroscostogastocapital";

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipootroscostogastocapital.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT tocgc.idtipootroscostogastocapital AS "id", tocgc.nombre, tocgc.descripcion, tocgc.ayuda, "Renta de Capital" AS "renta", "Costos y deducciones procedentes" AS "tiporenta", "Tipo otros costos gastos" AS aspecto FROM '.$this->tablatipootroscostogastocapital.' tocgc WHERE tocgc.idtipootroscostogastocapital = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editartipootroscostosgastos($nombre, $descripcion, $ayuda, $id){

        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipootroscostogastocapital.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtipootroscostogastocapital = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipootroscostogastocapital.' WHERE idtipootroscostogastocapital = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

    



}

?>