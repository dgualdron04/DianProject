<?php

class Tipoaportevoluntariomodel extends Models{

    private $tablatipoaportevoluntario = "tipoaportevoluntario";

    public function listar(){

        $query = $this->db->connect()->prepare('SELECT tav.idtipoaportevoluntario, tav.nombre, tav.descripcion, tav.ayuda FROM '.$this->tablatipoaportevoluntario.' tav ;');
        $query->execute();
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $myquery;

    }

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipoaportevoluntario.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT tav.idtipoaportevoluntario AS "id", tav.nombre, tav.descripcion, tav.ayuda, "Renta de Trabajo" AS "renta", "Ingresos No Constitutivos" AS "tiporenta", "Tipo Aporte Voluntario" AS aspecto FROM '.$this->tablatipoaportevoluntario.' tav WHERE tav.idtipoaportevoluntario = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editartipodeaportevoluntario($nombre, $descripcion, $ayuda, $id){

        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipoaportevoluntario.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtipoaportevoluntario = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipoaportevoluntario.' WHERE idtipoaportevoluntario = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}

?>