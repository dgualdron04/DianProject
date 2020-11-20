<?php

class Tipoprimacancilleriamodel extends Models{

    private $tablatipoprimacancilleria = "tipoprimacancilleria";

    public function crear($nombre, $descripcion, $ayuda){

        if ($query = $this->db->connect()->prepare('INSERT INTO '.$this->tablatipoprimacancilleria.'(nombre, descripcion, ayuda) VALUES (?,?,?)')) {

            $query->execute([$nombre,$descripcion,$ayuda]);
            return true;

        } else {

            return false;

        }

    }

    public function editar($id){

        $query = $this->db->connect()->prepare('SELECT tpc.idtipoprimacancilleria AS "id", tpc.nombre, tpc.descripcion, tpc.ayuda, "Renta de Trabajo" AS "renta", "Renta Exenta" AS "tiporenta", "Tipo De Prima" AS aspecto FROM '.$this->tablatipoprimacancilleria.' tpc WHERE tpc.idtipoprimacancilleria = ? ;');
        $query->execute([$id]);
        $myquery = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($myquery));

    }

    public function editartipodeprima($nombre, $descripcion, $ayuda, $id){

        if ( $stmt = $this->db->connect()->prepare('UPDATE '.$this->tablatipoprimacancilleria.' SET nombre = ?, descripcion = ?, ayuda = ? WHERE idtipoprimacancilleria = ?')) {
            $stmt->execute([$nombre, $descripcion, $ayuda, $id]);
            
            return true;
        } else {
            
            return false;
        }

    }

    public function eliminar($id)
    {
        if ( $query = $this->db->connect()->prepare('DELETE FROM '.$this->tablatipoprimacancilleria.' WHERE idtipoprimacancilleria = ? ')) {
                
            $query->execute([$id]);
            return true;
            
        } else {

            return false;

        }
    }

}

?>