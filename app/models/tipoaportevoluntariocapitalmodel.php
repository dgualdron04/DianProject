<?php

class Tipoaportevoluntariocapitalmodel extends Models{

    private $tablatipoaportevoluntariocapital = "tipoaportevoluntariocapital";

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipoaportevoluntariocapital.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT tavc.idtipoaportevoluntariocapital AS "id", tavc.nombre, tavc.descripcion, tavc.ayuda, "Renta de Capital" AS "renta", "Ingreso no Constitutivos" AS "tiporenta", "Tipo de Aporte Voluntario" AS aspecto FROM '.$this->tablatipoaportevoluntariocapital.' tavc WHERE tavc.idtipoaportevoluntariocapital = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editartipodeaportevoluntario($nombre, $descripcion, $ayuda, $id){

        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipoaportevoluntariocapital.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtipoaportevoluntariocapital = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipoaportevoluntariocapital.' WHERE idtipoaportevoluntariocapital = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}

?>