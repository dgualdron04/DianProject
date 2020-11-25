<?php

class Tipoingresopensionesmodel extends Models{

    private $tablatipoingresopensiones = "tipoingresospensiones";

    public function listar(){

        $query = $this->db->connect()->prepare('SELECT tip.idtipoingresospensiones, tip.nombre, tip.descripcion, tip.ayuda FROM '.$this->tablatipoingresopensiones.' tip ;');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipoingresopensiones.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT tip.idtipoingresospensiones AS "id", tip.nombre, tip.descripcion, tip.ayuda, "Ingreso Bruto" AS "renta", "Tipo de ingresos de pensiones" AS "tiporenta" FROM '.$this->tablatipoingresopensiones.' tip WHERE tip.idtipoingresospensiones = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editaringresopensiones($nombre, $descripcion, $ayuda, $id){

        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipoingresopensiones.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtipoingresospensiones = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipoingresopensiones.' WHERE idtipoingresospensiones = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}

?>