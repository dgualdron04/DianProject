
<?php

class Tipoaportesobligatoriospensionesmodel extends Models{

    private $tablatipoaportesobligatoriospensiones = "tipoaportesobligatoriospensiones";

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipoaportesobligatoriospensiones.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT taopen.idtipoaportesobligatoriospensiones AS "id", taopen.nombre, taopen.descripcion, taopen.ayuda, "Ingresos no constitutivos" AS "renta", "Tipo de aporte obligatorio" AS "tiporenta" FROM '.$this->tablatipoaportesobligatoriospensiones.' taopen WHERE taopen.idtipoaportesobligatoriospensiones = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editartipoaporteobligatorio($nombre, $descripcion, $ayuda, $id){

        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipoaportesobligatoriospensiones.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtipoaportesobligatoriospensiones = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipoaportesobligatoriospensiones.' WHERE idtipoaportesobligatoriospensiones = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}

?>