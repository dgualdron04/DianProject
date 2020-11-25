<?php

class Tipopagoalimenmodel extends Models{

    private $tablatipopagoalimen = "tipopagoalimen";

    public function listar(){

        $query = $this->db->connect()->prepare('SELECT tpa.idtipopagoalimen, tpa.parentesco, tpa.descripcion, tpa.ayuda FROM '.$this->tablatipopagoalimen.' tpa ;');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipopagoalimen.'(parentesco, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT tpa.idtipopagoalimen AS "id", tpa.parentesco as "nombre", tpa.descripcion, tpa.ayuda, "Renta de Trabajo" AS "renta", "Ingresos No Constitutivos" AS "tiporenta", "Tipo Pago de Alimentación" AS aspecto FROM '.$this->tablatipopagoalimen.' tpa WHERE tpa.idtipopagoalimen = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editartipopagodealimentacion($nombre, $descripcion, $ayuda, $id){

        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipopagoalimen.' SET parentesco = ?, descripcion = ?, ayuda = ? WHERE idtipopagoalimen = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipopagoalimen.' WHERE idtipopagoalimen = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}

?>