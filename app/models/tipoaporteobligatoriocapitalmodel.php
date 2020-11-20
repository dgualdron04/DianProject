<?php

class Tipoaporteobligatoriocapitalmodel extends Models{

    private $tablatipoaporteobligatoriocapital = "tipoaporteobligatoriocapital";

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipoaporteobligatoriocapital.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT taoc.idtipoaporteobligatoriocapital AS "id", taoc.nombre, taoc.descripcion, taoc.ayuda, "Renta de Capital" AS "renta", "Ingreso no Constitutivos" AS "tiporenta", "Tipo de Aporte Obligatorio" AS aspecto FROM '.$this->tablatipoaporteobligatoriocapital.' taoc WHERE taoc.idtipoaporteobligatoriocapital = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editartipodeaporteobligatorio($nombre, $descripcion, $ayuda, $id){

        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipoaporteobligatoriocapital.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtipoaporteobligatoriocapital = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipoaporteobligatoriocapital.' WHERE idtipoaporteobligatoriocapital = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}

?>