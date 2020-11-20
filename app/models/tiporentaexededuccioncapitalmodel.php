<?php

class Tiporentaexededuccioncapitalmodel extends Models{

    private $tablatiporentaexededuccioncapital = "tiporentaexededuccioncapital";

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatiporentaexededuccioncapital.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT tredc.idtiporentaexededuccioncapital AS "id", tredc.nombre, tredc.descripcion, tredc.ayuda, "Renta de Capital" AS "renta", "Renta exenta deducción" AS "tiporenta", "Tipo renta exenta deducción" AS aspecto FROM '.$this->tablatiporentaexededuccioncapital.' tredc WHERE tredc.idtiporentaexededuccioncapital = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editartiporentaexentadeduccion($nombre, $descripcion, $ayuda, $id){

        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatiporentaexededuccioncapital.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtiporentaexededuccioncapital = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatiporentaexededuccioncapital.' WHERE idtiporentaexededuccioncapital = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}

?>