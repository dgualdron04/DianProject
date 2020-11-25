<?php

class Tipoindemnizacionmodel extends Models{

    private $tablatipoindemnizacion = "tipoindemnizacion";

    public function listar(){

        $query = $this->db->connect()->prepare('SELECT ti.idtipoindemnizacion, ti.nombre, ti.descripcion, ti.ayuda FROM '.$this->tablatipoindemnizacion.' ti ;');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipoindemnizacion.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT ti.idtipoindemnizacion AS "id", ti.nombre, ti.descripcion, ti.ayuda, "Renta de Trabajo" AS "renta", "Renta Exenta" AS "tiporenta", "Tipo De Indemnizacion" AS aspecto FROM '.$this->tablatipoindemnizacion.' ti WHERE ti.idtipoindemnizacion = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editartipodeindemnizacion($nombre, $descripcion, $ayuda, $id){

        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipoindemnizacion.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtipoindemnizacion = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }

    }


    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipoindemnizacion.' WHERE idtipoindemnizacion = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }



}

?>