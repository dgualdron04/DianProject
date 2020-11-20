<?php

class Tipootrosingresoscapitalmodel extends Models{

    private $tablatipootrosingresoscapital = "tipootrosingresoscapital";

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipootrosingresoscapital.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT toi.idtipootrosingresoscapital AS "id", toi.nombre, toi.descripcion, toi.ayuda, "Renta de Capital" AS "renta", "Ingreso Bruto" AS "tiporenta", "Tipo Otros Ingresos" AS aspecto FROM '.$this->tablatipootrosingresoscapital.' toi WHERE toi.idtipootrosingresoscapital = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editartipootrosingresos($nombre, $descripcion, $ayuda, $id){

        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipootrosingresoscapital.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtipootrosingresoscapital = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipootrosingresoscapital.' WHERE idtipootrosingresoscapital = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}

?>