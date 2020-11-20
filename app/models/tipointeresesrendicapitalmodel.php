<?php

class Tipointeresesrendicapitalmodel extends Models{

    private $tablatipointeresesrendicapital = "tipointeresesrendicapital";

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipointeresesrendicapital.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT tir.idtipointeresesrendicapital AS "id", tir.nombre, tir.descripcion, tir.ayuda, "Renta de Capital" AS "renta", "Ingreso Bruto" AS "tiporenta", "Tipo Interes rendimiento" AS aspecto FROM '.$this->tablatipointeresesrendicapital.' tir WHERE tir.idtipointeresesrendicapital = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }
    
    public function editartipointeresrendimiento($nombre, $descripcion, $ayuda, $id){

        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipointeresesrendicapital.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtipointeresesrendicapital = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipointeresesrendicapital.' WHERE idtipointeresesrendicapital = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}

?>